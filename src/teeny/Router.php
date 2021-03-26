<?php
namespace teeny;

use Mezzio\Router\FastRouteRouter;
use Psr\Http\Message\ServerRequestInterface;
use teeny\Router\Route;
use Mezzio\Router\Route as Mezzio;
use teeny\Router\MiddlewareApp;

/**
 * Class Router
 * @package teeny
 */
/**
 * Class Router
 * @package Framework
 * Register and match Route
 */
class Router
{
    private $router;

    public function __construct()
    {
        $this->router = new FastRouteRouter();
        
    }

    /**
     * @param string $path
     * @param string|callable $callable
     * @param string $name
     */
    public function get(string $path, $callable, string $name)

    {
       
        $this->router->addRoute(new Mezzio($path, new MiddlewareApp($callable), ['GET'], $name));
    }

    /**
     * @param ServerRequestInterface $request
     * @return Route|null
     */
    public function match(ServerRequestInterface $request): ?Route
    {
        $result = $this->router->match($request);
        if ($result-> isSuccess()) {
            return new Route(
                $result->getMatchedRouteName(),
                $result->getMatchedRoute()->getMiddleware()->getCallback(),
                $result->getMatchedParams()
            );
        }
        return null;
    }

    /**
     * @param string $name
     * @param array $params
     * @return null|string
     */
    public function generateUri(string $name, array $params): ?string
    {
        return $this->router->generateUri($name, $params);
    }
}