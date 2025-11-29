<?php

namespace App\Diagnostic\Application\Handler;

use App\Diagnostic\Domain\Model\Diagnostic\Diagnostic;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticId;
use App\Diagnostic\Domain\Repository\DiagnosticRepositoryInterface;
use App\Diagnostic\Application\Command\CreateDiagnostic\CreateDiagnosticCommand;


class CreateDiagnosticHandler
{
    public function __construct(
        private DiagnosticRepositoryInterface $diagnostics,
    ) {}

    /**
     * @param CreateDiagnosticCommand $command
     * @return DiagnosticId
     */
    public function handle(CreateDiagnosticCommand $command): DiagnosticId
    {
        $diagnostic =  Diagnostic::create(
            $command->slug,
            $command->authorId,
            $command->status,
            $command->title,
            $command->description,
            $command->image,
            $command->isPaid,
            $command->attempts,
            $command->changeAnswer,
            $command->ageRestriction,
            $command->sortKeys,
            $command->showMaxKeys,
            $command->isOnTime,
            $command->allottedTime,
        );

        $this->diagnostics->save($diagnostic);

        return $diagnostic->getId();
    }
}
