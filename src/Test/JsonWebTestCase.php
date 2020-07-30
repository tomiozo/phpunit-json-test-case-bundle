<?php
declare(strict_types=1);

namespace MT85\PHPUnitJsonTestCaseBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class JsonWebTestCase extends WebTestCase
{
    protected static function createJsonClient(array $options = [], array $server = [])
    {
        $server = array_merge(
            $server,
            [
                'HTTP_ACCEPT' => 'application/json',
                'CONTENT_TYPE' => 'application/json',
            ]
        );
        return self::createClient($options, $server);
    }
}
