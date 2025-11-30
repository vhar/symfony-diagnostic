<?php

namespace App\Diagnostic\Infrastructure\EventListener;

use App\Shared\Domain\Response\ApiResponseInterface;
use App\Shared\Domain\Response\ApiSuccessResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class KervelViewEventListener
{
    public function __construct(private SerializerInterface $serializer)
    {
        //
    }

    public function onKernelView(ViewEvent $event): void
    {
        $controllerResult = $event->getControllerResult();

        $response = $this->resolveResponse($controllerResult);

        $jsonResponse = new JsonResponse(
            data: $this->serializer->serialize($response, JsonEncoder::FORMAT),
            status: $response->getResultCode(),
            json: true
        );

        $event->setResponse($jsonResponse);
    }

    private function resolveResponse(mixed $controllerResult): ApiResponseInterface
    {
        if ($controllerResult instanceof ApiResponseInterface) {
            return $controllerResult;
        }

        return new ApiSuccessResponse(
            data: $controllerResult,
            message: null,
            resultCode: Response::HTTP_OK
        );
    }
}
