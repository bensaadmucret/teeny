<?php
namespace test\teeny;

use teeny\App;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\ServerRequest;

class AppTest extends TestCase{
    public function testRedirectTrailingSlash(){

        $app = new App();
        $request = new ServerRequest('GET', '/test/');
        $response =  $app->run($request);
        $this->assertContains('/test', $response->getHeader('Location'));
        $this->assertEquals(301, $response->getStatusCode());
    }
}  
