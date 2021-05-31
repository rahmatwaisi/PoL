<?php


namespace RahmatWaisi\PoL\Services;


use Illuminate\Http\Response;
use RahmatWaisi\PoL\Exceptions\PoLException;
use RahmatWaisi\PoL\Traits\GetConfigKey;
use RahmatWaisi\PoL\Traits\HttpClient;

abstract class BaseService
{
    use HttpClient;
    use GetConfigKey;

    /**
     * Send request to server
     *
     * @param array $parameters
     * @return mixed
     */
    abstract public function request(array $parameters);

    /**
     * @param $responseResult
     * @return mixed
     * @todo Implement this method and return fields of response that you want
     *
     */
    abstract public function valuesOf($responseResult): array;

    /**
     * @return string
     * @todo Return the url that you want to send request to it.
     */
    abstract public function url(): string;

    /**
     * returns values of $response that you specify in {@link valuesOf()} method
     *
     * @param $response
     * @param string $exception
     * @return array|mixed
     *
     * @throws  PoLException  with error code = 500
     */
    public function response($response, string $exception)
    {
        if ($response->getStatusCode() == Response::HTTP_OK) {
            if ($response->getBody()) {
                $result = json_decode($response->getBody());
                if ($result->status === "true") {
                    return $this->valuesOf($result);
                }
                throw new $exception($result->errorCode);
            }
        }
        throw new $exception(500);
    }

}
