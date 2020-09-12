<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Request;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Otis22\VetmanagerApi\Api\HTTP\Body;
use Otis22\VetmanagerApi\Api\HTTP\Headers;
use Otis22\VetmanagerApi\Url;
use Psr\Http\Message\ResponseInterface;
use Otis22\VetmanagerApi\Api\Request;

final class Delete implements Request
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Url
     */
    private $url;
    /**
     * @var Headers
     */
    private $headers;

    /**
     * Put constructor.
     * @param ClientInterface $httpClient
     * @param Url $url
     * @param Headers $headers
     */
    public function __construct(ClientInterface $httpClient, Url $url, Headers $headers)
    {
        $this->httpClient = $httpClient;
        $this->url = $url;
        $this->headers = $headers;
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function response(): ResponseInterface
    {
        return $this->httpClient->request(
            "DELETE",
            $this->url->asString(),
            [
                'headers' => $this->headers->asAssoc()
            ]
        );
    }
}
