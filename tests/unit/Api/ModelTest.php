<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api;

use Otis22\VetmanagerApi\VetmanagerApiException;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    public function testValidModel(): void
    {
        $this->assertEquals(
            'invoice',
            (
                new Model('invoice')
            )->asString()
        );
    }
    public function testInValidModel(): void
    {
        $this->expectException(VetmanagerApiException::class);
        (
            new Model('fake-unreal-model')
        )->asString();
    }
}
