<?php

namespace App\Diagnostic\Infrastructure\EventListener;

use App\Shared\Domain\Response\ApiErrorResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use App\Shared\Domain\Exception\ApiExceptionInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class KervelExceptionEventListener
{
    public function __construct(private SerializerInterface $serializer)
    {
        //
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        $errorResponse = $this->resolveResponse($exception);

        $jsonResponse = new JsonResponse(
            data: $this->serializer->serialize($errorResponse, JsonEncoder::FORMAT),
            status: $errorResponse->resultCode,
            json: true
        );

        $event->setResponse($jsonResponse);
    }

    private function resolveResponse(\Throwable $exception): ApiErrorResponse
    {
        return new ApiErrorResponse(
            $exception->getMessage(),
            $this->resolveExceptionCode($exception)
        );
    }

    private function resolveExceptionCode(\Throwable $exception): int
    {
        if ($exception instanceof ApiExceptionInterface || $exception instanceof HttpExceptionInterface) {
            return $exception->getStatusCode();
        }

        $statusCode = $exception->getCode();

        if ($statusCode < Response::HTTP_CONTINUE || $statusCode > Response::HTTP_NETWORK_AUTHENTICATION_REQUIRED) {
            return Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return $statusCode;
    }
}
