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
     * @param $route
     * @return ResponseInterface
     */
    public function run(ServerRequestInterface $request, $route ): ResponseInterface
    {

        $callback = $route->getCallback();
        if (is_string($callback)) {
            $callback = $this->container->get($callback);
        }
        $response = call_user_func_array($callback, [$request]);
        return  $response;
    }
}
