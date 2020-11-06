<?php

namespace App\Exceptions;

use Throwable;

class ValidationException extends \Exception
{
    protected $code = 422;
    private array $fieldMessages;

    /**
     * $key of array validation field name
     * $value of array validation error message
     *
     * @param array $fieldMessages
     * @param string $message
     */
    public function __construct(array $fieldMessages, string $message = '')
    {
        $this->fieldMessages = $fieldMessages;

        parent::__construct($message, $this->code);
    }

    public function getValidationErrors(): array
    {
        return $this->fieldMessages;
    }
}
