<?php

namespace Gemorroj\Test8bitBundle\Exception;

class Test8bitException extends \Exception
{
    private $errorCode;

    /**
     * Test8bitException constructor.
     * @param string $message
     * @param string $errorCode
     */
    public function __construct($message, $errorCode)
    {
        parent::__construct($message);
        $this->setErrorCode($errorCode);
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param string $errorCode
     * @return Test8bitException
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }
}
