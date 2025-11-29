<?php

namespace App\Diagnostic\Domain\Model\Diagnostic;

use App\Diagnostic\Domain\ValueObject\Common\Url;
use App\Diagnostic\Domain\ValueObject\Common\Text;
use App\Diagnostic\Domain\ValueObject\Common\Natural;
use App\Diagnostic\Domain\ValueObject\Shared\AnswerId;
use App\Diagnostic\Domain\ValueObject\Shared\QuestionId;


final class Answer
{
    private AnswerId $id;
    private QuestionId $questionId;
    private Natural $number;
    private Text $answer;
    private Natural $scoreMultiplier;
    private ?Url $image;
    private ?Url $video;

    /**
     * @param AnswerId $id
     * @param QuestionId $questionId
     * @param Natural $number
     * @param Text $answer
     * @param Natural $scoreMultiplier
     * @param Url|null $image
     * @param Url|null $video
     */
    private function __construct(
        AnswerId $id,
        QuestionId $questionId,
        Natural $number,
        Text $answer,
        Natural $scoreMultiplier,
        ?Url $image,
        ?Url $video
    ) {
        $this->id = $id;
        $this->questionId = $questionId;
        $this->number = $number;
        $this->answer = $answer;
        $this->scoreMultiplier = $scoreMultiplier;
        $this->image = $image;
        $this->video = $video;
    }

    /**
     * @param AnswerId $id
     * @param QuestionId $questionId
     * @param Natural $number
     * @param Text $answer
     * @param Natural $scoreMultiplier
     * @param Url|null $image
     * @param Url|null $video
     * @return self
     */
    public static function create(
        AnswerId $id,
        QuestionId $questionId,
        Natural $number,
        Text $answer,
        Natural $scoreMultiplier,
        ?Url $image = null,
        ?Url $video = null
    ): self {
        return new self(
            $id,
            $questionId,
            $number,
            $answer,
            $scoreMultiplier,
            $image,
            $video
        );
    }

    public function getId(): AnswerId
    {
        return $this->id;
    }

    public function getQuestionId(): QuestionId
    {
        return $this->questionId;
    }

    public function getNumber(): Natural
    {
        return $this->number;
    }

    public function getAnswer(): Text
    {
        return $this->answer;
    }

    public function getScoreMultiplier(): Natural
    {
        return $this->scoreMultiplier;
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
