<?php

namespace Tests\Feature;


use Tests\TestCase;

class HomeTest extends TestCase
{

    public function testHomePageIsWorkingCorrectly()
    {
        $response = $this->get('/');

        $response->assertSeeText('Hello World');
        $response->assertSeeText('This is Shawon from Bangladesh');
    }
    public function testContactPageIsWorkingCorrectly()
    {
        $response = $this->get('/contact');

        $response->assertSeeText('Contact Page');
    }


}
