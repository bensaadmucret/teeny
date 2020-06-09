<?php

namespace teeny;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{

    /**
     * Supprime le slash de fin si il excite
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
        if (!empty($uri)&&$uri[-1] === "/") {
            return (new Response())
                ->withStatus(301)
                ->withHeader('Location', substr($uri, 0, -1));
        }
    
        $response = new Response();
        $response->getBody()->write('Bonjour à tous !');
        return $response;
    }
}
