<?php
namespace Moxy;

class Controller {

    public function __construct($request,$response) {
        $this->request = $request;
        $this->response = $response;
    }

}