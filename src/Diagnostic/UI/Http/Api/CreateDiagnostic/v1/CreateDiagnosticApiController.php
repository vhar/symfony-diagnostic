<?php

namespace App\Diagnostic\UI\Http\Api\CreateDiagnostic\v1;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Shared\Domain\Response\ApiSuccessResponse;
use App\Shared\Domain\Response\ApiResponseInterface;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use App\Diagnostic\Application\Handler\CreateDiagnosticHandler;
use App\Diagnostic\UI\Http\Api\CreateDiagnostic\v1\Request\CreateDiagnosticDto;
use App\Diagnostic\Application\Command\CreateDiagnostic\CreateDiagnosticCommand;
use App\Diagnostic\UI\Http\Api\CreateDiagnostic\v1\Request\CreateDiagnosticValueResolver;

final class CreateDiagnosticApiController
{
    public function __construct(
        private CreateDiagnosticHandler $handler,
    ) {
        //
    }
    #[Route(path: '/v1/diagnostic', name: 'api_create_diagnostic.v1', methods: ['POST'])]
    public function __invoke(#[MapRequestPayload(resolver: CreateDiagnosticValueResolver::class)] CreateDiagnosticDto $diagnostic): ApiResponseInterface
    {
        $command = new CreateDiagnosticCommand(
            $diagnostic->slug,
            $diagnostic->authorId,
            $diagnostic->status,
            $diagnostic->title,
            $diagnostic->description,
            $diagnostic->image,
            $diagnostic->isPaid ?? false,
            $diagnostic->attempts ?? -1,
            $diagnostic->changeAnswer ?? false,
            $diagnostic->ageRestriction ?? 0,
            $diagnostic->sortKeys ?? 'ASC',
            $diagnostic->showMaxKeys ?? 0,
            $diagnostic->isOnTime ?? false,
            $diagnostic->allottedTime
        );

        $entityId = $this->handler->handle($command);

        return new ApiSuccessResponse(
            data: $entityId->getValue(),
            message: null,
            resultCode: Response::HTTP_OK
        );
    }
}
