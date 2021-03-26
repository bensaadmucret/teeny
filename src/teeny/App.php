<?php

namespace teeny;




use teeny\Router\Route;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{
    private $modules = [];
   
    /**
    * @var array string[] $modules Liste des modules à charger
    */
    public function __construct()
    {
       /*foreach ($modules as $module) {
           $this->modules[] =  new $module();
      }*/
    }

    /**
     * Supprime le slash de fin si il excite
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $route = new Route('/blog', function () { return 'hello'; }, ['blog']);
        $Middleware = $route->getCallback();
        $callback = $Middleware->getCallback();
        if (is_string($callback)) {
            $callback = $this->container->get($callback);
        }
        $response = call_user_func_array($callback, [$request]);
    }
}
