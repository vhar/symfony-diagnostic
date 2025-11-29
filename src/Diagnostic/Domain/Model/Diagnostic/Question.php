<?php

namespace App\Diagnostic\Domain\Model\Diagnostic;

use App\Diagnostic\Domain\ValueObject\Common\Url;
use App\Diagnostic\Domain\ValueObject\Common\Text;
use App\Diagnostic\Domain\ValueObject\Common\Natural;
use App\Diagnostic\Domain\ValueObject\Shared\QuestionId;
use App\Diagnostic\Domain\ValueObject\Shared\DiagnosticId;
use App\Diagnostic\Domain\ValueObject\Diagnostic\AnswerTypeEnum;



final class Question
{
    private QuestionId $id;
    private DiagnosticId $diagnosticId;
    private AnswerTypeEnum $answerType;
    private Natural $number;
    private Text $question;
    private ?Url $image;
    private ?Url $video;

    /**
     * @param QuestionId $id
     * @param DiagnosticId $diagnosticId
     * @param AnswerTypeEnum $answerType
     * @param Natural $number
     * @param Text $question
     * @param Url|null $image
     * @param Url|null $video
     */
    private function __construct(
        QuestionId $id,
        DiagnosticId $diagnosticId,
        AnswerTypeEnum $answerType,
        Natural $number,
        Text $question,
        ?Url $image = null,
        ?Url $video = null
    ) {
        $this->id = $id;
        $this->diagnosticId = $diagnosticId;
        $this->answerType = $answerType;
        $this->number = $number;
        $this->question = $question;
        $this->image = $image;
        $this->video = $video;
    }

    /**
     * @param QuestionId $id
     * @param DiagnosticId $diagnosticId
     * @param AnswerTypeEnum $answerType
     * @param Natural $number
     * @param Text $question
     * @param Url|null $image
     * @param Url|null $video
     * @return self
     */
    public static function create(
        QuestionId $id,
        DiagnosticId $diagnosticId,
        AnswerTypeEnum $answerType,
        Natural $number,
        Text $question,
        ?Url $image = null,
        ?Url $video = null
    ): self {
        return new self(
            $id,
            $diagnosticId,
            $answerType,
            $number,
            $question,
            $image,
            $video
        );
    }

    public function getId(): QuestionId
    {
        return $this->id;
    }

    public function getDiagnosticId(): DiagnosticId
    {
        return $this->diagnosticId;
    }

    public function getAnswerType(): AnswerTypeEnum
    {
        return $this->answerType;
    }

    public function getNumber(): Natural
    {
        return $this->number;
    }

    public function getQuestion(): Text
    {
        return $this->question;
    }

    public function getImage(): ?Url
    {
        return $this->image;
    }

    public function getVideo(): ?Url
    {
        return $this->video;
    }
}
