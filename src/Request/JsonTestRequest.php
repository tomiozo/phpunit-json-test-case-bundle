<?php
declare(strict_types=1);

namespace MT85\PHPUnitJsonTestCaseBundle\Request;

use Symfony\Component\HttpFoundation\Request;

class JsonTestRequest extends Request
{
    public function __construct(
        array $query = [],
        array $request = [],
        array $attributes = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        $content = null
    ) {
        $server = array_merge(
            $server,
            [
                'HTTP_ACCEPT' => 'application/json',
                'CONTENT_TYPE' => 'application/json',
            ]
        );
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }

    /**
     * @param false|resource|string|null $content
     */
    public function setJsonContent($content): void
    {
        $this->content = $content;
    }

    public function setContent(array $content): void
    {
        $this->content = json_encode($content);
    }

    public function setRouteParams(array $attributes): void
    {
        foreach ($attributes as $key => $value) {
            $this->setRouteParam($key, $value);
        }
    }

    public function setRouteParam(string $key, $value): void
    {
        $existingRouteParams = $this->attributes->get('_route_params', []);
        $newRouteParams = array_merge($existingRouteParams, [$key => $value]);
        $this->attributes->set('_route_params', $newRouteParams);
        $this->setAttribute($key, $value);
    }

    public function setAttribute(string $key, $value): void
    {
        $this->attributes->set($key, $value);
    }

    public function setHeaders(array $headers): void
    {
        foreach ($headers as $key => $value) {
            $this->setHeader($key, $value);
        }
    }

    public function setHeader(string $key, $value): void
    {
        $this->headers->set($key, $value);
    }

    public function setQueryParams(array $queryParams): void
    {
        foreach ($queryParams as $key => $value) {
            $this->setQueryParam($key, $value);
        }
    }

    public function setQueryParam(string $key, $value): void
    {
        $this->query->set($key, $value);
    }
}
