<?php
/**
 * Created by PhpStorm.
 * User: mzb
 * Date: 11/06/2020
 * Time: 00:41
 */

namespace teeny\Router;



use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class MiddlewareApp
 * @package src\teeny\Router
 */
class MiddlewareApp implements MiddlewareInterface
{

    /**
     * @var string|callable
     */
    private $callback;

    /**
     * MiddlewareApp constructor.
     * @param string|callable $callback
     */
    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface|null $handler
     * @return ResponseInterface
     */
    /**
     * Proxies to the middleware composed during instantiation.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        return $this->middleware->process($request, $handler);
    }

    /**
     * @return string|callable
     */
    public function getCallback()
    {
        return $this->callback;
    }
}