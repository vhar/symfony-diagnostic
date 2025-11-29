<?php

namespace App\Diagnostic\Infrastructure\Maper;


use App\Diagnostic\Domain\ValueObject\Common\Url;
use App\Diagnostic\Domain\ValueObject\Common\Text;
use App\Diagnostic\Domain\ValueObject\Common\Title;
use App\Diagnostic\Domain\ValueObject\Common\Natural;
use App\Diagnostic\Domain\Model\Diagnostic\Diagnostic;
use App\Diagnostic\Domain\ValueObject\Diagnostic\Slug;
use App\Diagnostic\Domain\ValueObject\Common\SortOrder;
use App\Diagnostic\Domain\ValueObject\Diagnostic\Attempts;
use App\Diagnostic\Domain\ValueObject\Diagnostic\AuthorId;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticId;
use App\Diagnostic\Infrastructure\Persistence\Doctrine\DiagnosticEntity;

final class DiagnosticMapper
{
    public static function toEntity(Diagnostic $diagnostic): DiagnosticEntity
    {
        return new DiagnosticEntity(
            $diagnostic->getId()->getValue(),
            $diagnostic->getSlug()->getValue(),
            $diagnostic->getAuthorId()->getValue(),
            $diagnostic->getStatus(),
            $diagnostic->getTitle()->getValue(),
            $diagnostic->getDescription()->getValue(),
            $diagnostic->getImage()->getValue(),
            $diagnostic->getCreatedAt(),
            $diagnostic->getIsPaid(),
            $diagnostic->getAttempts()->getValue(),
            $diagnostic->getChangeAnswer(),
            $diagnostic->getAgeRestriction(),
            $diagnostic->getSortKeys()->getValue(),
            $diagnostic->getShowMaxKeys()->getValue(),
            $diagnostic->getIsOnTime(),
            $diagnostic->getAllottedTime()
        );
    }

    public static function toDomain(DiagnosticEntity $entity): Diagnostic
    {
        return Diagnostic::create(
            new Slug($entity->getSlug()),
            new AuthorId($entity->getAuthorId()),
            $entity->getStatus(),
            new Title($entity->getTitle()),
            new Text($entity->getDescription()),
            new Url($entity->getImage()),
            $entity->getIsPaid(),
            new Attempts($entity->getAttempts()),
            $entity->getIsChangeAnswer(),
            $entity->getAgeRestriction(),
            new SortOrder($entity->getSortKeys()),
            new Natural($entity->getShowMaxKeys()),
            $entity->getIsOnTime(),
            $entity->getAllottedTime(),
            new DiagnosticId($entity->getId())
        );
    }
}
