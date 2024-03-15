<?php

namespace App\Middleware;

use Leaf\Router;

class RouteInspector
{
    /**
     * Get all defined routes with their methods, properties, etc.
     *
     * @return array
     */
    public static function getAllRoutes(): array
    {
        $allRoutes = [];

        $reflectionClass = new \ReflectionClass(Router::class);
        $properties = $reflectionClass->getStaticProperties();
 
        foreach ($properties['routes'] as $method => $routes) {
            foreach ($routes as $route) {
                $allRoutes[] = [
                    'method' => $method,
                    'pattern' => $route['pattern'],
                    'handler' => $route['handler'],
                    'name' => $route['name'] ?? null
                ];
            }
        }

        return $allRoutes;
    }
}