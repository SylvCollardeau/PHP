<?php

namespace Http;

class Request {

    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    private $parameters = array();

    public function __construct(array $query = array(), array $request = array()) {

        if (!empty($query)) {
            foreach ($query as $value) {
                array_push($parameters, $value);
            }
        }

        if (!empty($parameters)) {
            foreach ($parameters as $value) {
                array_push($parameters, $value);
            }
        }
    }

    public function getMethod() {
        
        $method = $_SERVER['REQUEST_METHOD'];
		
		if (self::POST === $method) {
			return $this->getParameter('_method', $method);
		}
		
        return isset($method) ? $method : self::GET;
    }

    public function getUri() {

        $uri = $_SERVER['REQUEST_URI'];

        if ($pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        return isset($uri) ? $uri : '/';
    }

    public function getParameter($name, $default = null) {
        return $_POST[$name];
    }

    public static function createFromGlobals() {

        $query = array();
        $parameters = array();

        foreach ($_GET as $key => $value) {
            array_push($query, [$key => $value]);
        }

        foreach ($_POST as $key => $value) {
            array_push($parameters, [$key => $value]);
        }

        return new self($query, $parameters);
    }

}
