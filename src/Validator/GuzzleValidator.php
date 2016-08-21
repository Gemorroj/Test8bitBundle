<?php

namespace Gemorroj\Test8bitBundle\Validator;

use Gemorroj\Test8bitBundle\Exception\Test8bitException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class GuzzleValidator
{
    /**
     * @param ResponseInterface $response
     */
    public function httpResponseValidate(ResponseInterface $response)
    {
        if (Response::HTTP_OK !== $response->getStatusCode()) {
            throw new HttpException(
                $response->getStatusCode(),
                $response->getReasonPhrase()
            );
        }
    }

    /**
     * можно использовать json-schema (http://json-schema.org/) для точного определения соответствия водящго json ожидаемой структуре
     * но, в данному случае (тестовое задание), решено "забить"
     *
     * @param \stdClass $jsonObject
     * @throws Test8bitException|\RuntimeException
     */
    public function jsonObjectValidate(\stdClass $jsonObject)
    {
        if (!property_exists($jsonObject, 'data')) {
            throw new \RuntimeException('Incorrect json. "data" not defined.');
        }
        if (!property_exists($jsonObject, 'success')) {
            throw new \RuntimeException('Incorrect json. "success" not defined.');
        }

        if (false === $jsonObject->success) {
            throw new Test8bitException($jsonObject->message, $jsonObject->code);
        }
    }
}
