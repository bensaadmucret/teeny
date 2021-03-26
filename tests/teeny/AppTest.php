<?php
namespace tests;

use teeny\App;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\ServerRequest;

class AppTest extends TestCase{
   
    /**
     * Redirection sans le slash
     *
     * @return void
     */
    public function test_Redirect_Trailing_Slash(){

        $app = new App();
        $request = new ServerRequest('GET', '/test/', );
        $response =  $app->run($request);
        var_dump($response);
        $this->assertContains('/test', $response->getHeader('Location'));
        $this->assertEquals(301, $response->getStatusCode());
    }
}  
