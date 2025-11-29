<?php

namespace App\Diagnostic\UI\Http\Rest;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\String\Slugger\AsciiSlugger;
use App\Diagnostic\UI\Http\Requests\CreateDiagnosticRequest;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use App\Diagnostic\Application\Handler\CreateDiagnosticHandler;
use App\Diagnostic\Domain\ValueObject\Diagnostic\DiagnosticStatusEnum;
use App\Diagnostic\Application\Command\CreateDiagnostic\CreateDiagnosticCommand;

final class DiagnosticController
{
    public function __construct(
        private CreateDiagnosticHandler $handler,
    ) {
        //
    }
    #[Route('diagnostic', methods: ['POST'])]
    public function create(#[MapRequestPayload] CreateDiagnosticRequest $diagnostic): JsonResponse
    {
        if ($diagnostic->slug === null) {
            $slugger = new AsciiSlugger('ru');
            $diagnostic->slug = $slugger->slug($diagnostic->title)->lower();
        }

        if ($diagnostic->status === null) {
            $status = DiagnosticStatusEnum::DRAFT;
        } else {
            $status = (new \ReflectionEnum(DiagnosticStatusEnum::class))->getConstant($diagnostic->status);
        }

        try {
            $command = new CreateDiagnosticCommand(
                $diagnostic->slug,
                $diagnostic->authorId,
                $status->value,
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

            return new JsonResponse(['status' => 'success', 'entity' => $entityId->getValue()]);
        } catch (\Exception $exception) {
            return new JsonResponse(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }
}
