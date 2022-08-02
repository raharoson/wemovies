<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WeMovieController extends WebTestCase
{
    public function testCreate()
    {
        //$this->assertEquals(42, 42);
        $client = static::createClient();

    }
}