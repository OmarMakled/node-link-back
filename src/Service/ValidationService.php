<?php

/**
 * This file is part of node link app.
 *
 * @author Omar Makled <omar.makled@gmail.com>
 */

namespace App\Service;

use App\Exception\ValidationException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidationService
{
    /**
     * ValidatorInterface instance.
     *
     * @var \Symfony\Component\Validator\Validator\ValidatorInterface
     */
    public $validator;

    /**
     * List of errors.
     *
     * @var []
     */

    public $errors = [];

    /**
     * Constructor.
     *
     * @param \Symfony\Component\Validator\Validator\ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Validate an inputs.
     *
     * @param array $inputs
     * @param \Symfony\Component\Validator\Constraint $constraints
     * @return void||\App\Exception\ValidationException
     */
    public function validate(array $inputs, Constraint $constraints)
    {
        $this->errors = $this->validator->validate($inputs, $constraints);

        if ($this->hasError()) {
            throw new ValidationException(json_encode($this->getError()));
        }
    }
    /**
     * Determine whether has error.
     *
     * @return bool
     */
    private function hasError()
    {
        return (count($this->errors) > 0);
    }
    /**
     * Get errors.
     *
     * @return array
     */
    private function getError()
    {
        $messages = [];
        foreach ($this->errors as $violation) {
            $messages[$violation->getPropertyPath()][] = $violation->getMessage();
        }

        return $messages;
    }
}
