<?php

namespace App\Diagnostic\UI\Http\Api\CreateDiagnostic\v1\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\Serializer\SerializerInterface;
use App\Shared\Domain\Exception\ApiVaidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

final readonly class CreateDiagnosticValueResolver implements ValueResolverInterface
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator
    ) {
        //
    }
    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $argumentType = $argument->getType();

        if (CreateDiagnosticDto::class !== $argumentType) {
            throw new BadRequestHttpException('Wrong request type');
        }

        $deserializedDto = $this->serializer->deserialize($request->getContent(), CreateDiagnosticDto::class, 'json');

        $violationsList = $this->validator->validate($deserializedDto);

        if ($violationsList->count() > 0) {
            $violations = [];

            foreach ($violationsList as $violation) {
                $violations[$violation->getPropertyPath()] = $violation->getPropertyPath() . ': ' . $violation->getMessage();
            }

            throw new ApiVaidationException($violations);
        }

        if ($deserializedDto->slug === null) {
            $slugger = new AsciiSlugger('ru');
            $deserializedDto->slug = $slugger->slug($deserializedDto->title)->lower();
        }

        if ($deserializedDto->status === null) {
            $deserializedDto->status = "DRAFT";
        }

        return [$deserializedDto];
    }
}
