<?php

namespace App\Service;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

class ValidateService
{
    public function validateCreateProduct($input): ConstraintViolationListInterface
    {
        $validator = Validation::createValidator();

        $groups = new Assert\GroupSequence(['Default', 'custom']);

        $constraint = new Assert\Collection([
            'name' => [
                new Assert\NotBlank(),
                new Assert\Type(['type' => 'string']),
                new Assert\Length(['min' => 3, 'max' => 30]),
            ],
            'user' => [
                new Assert\NotBlank(),
                new Assert\Type(['type' => 'integer']),
            ],
            'imagePath' => [
                new Assert\NotBlank(),
                new Assert\Type(['type' => 'string']),
                new Assert\Length(['min' => 1, 'max' => 255]),
            ],
            'category' => [
                new Assert\NotBlank(),
                new Assert\Length(['min' => 1, 'max' => 1]),
            ],
            'price' => [
                new Assert\NotBlank(),
                new Assert\Length(['min' => 1, 'max' => 8]),
            ],
            'amount' => [
                new Assert\NotBlank(),
                new Assert\Length(['min' => 1, 'max' => 5]),
            ],
            'description' => [
                new Assert\NotBlank(),
                new Assert\Type(['type' => 'string']),
                new Assert\Length(['min' => 1, 'max' => 5000]),
            ],
        ]);

        return $validator->validate($input, $constraint, $groups);
    }

    public function validateUpdateProduct($input): ConstraintViolationListInterface
    {
        $validator = Validation::createValidator();

        $groups = new Assert\GroupSequence(['Default', 'custom']);

        $constraint = new Assert\Collection([
            'id' => [
                new Assert\NotNull(),
            ],
            'name' => [
                new Assert\NotBlank(),
                new Assert\Type(['type' => 'string']),
                new Assert\Length(['min' => 5, 'max' => 25]),
            ],
            'user' => [
                new Assert\NotNull(),
                new Assert\Type(['type' => 'integer']),
            ],
            'imagePath' => [
                new Assert\Type(['type' => 'string']),
                new Assert\Length(['min' => 1, 'max' => 255]),
            ],
            'category' => [
                new Assert\NotBlank(),
                new Assert\Length(['min' => 1, 'max' => 1]),
            ],
            'price' => [
                new Assert\NotBlank(),
                new Assert\Length(['min' => 1, 'max' => 5]),
            ],
            'amount' => [
                new Assert\NotBlank(),
                new Assert\Length(['min' => 1, 'max' => 5]),
            ],
            'description' => [
                new Assert\NotBlank(),
                new Assert\Type(['type' => 'string']),
                new Assert\Length(['min' => 1, 'max' => 5000]),
            ],
        ]);

        return $validator->validate($input, $constraint, $groups);
    }
}
