<?php
namespace Moxy\Controller;

class Error extends \Moxy\Controller {

    public function code404()
    {
        $this->response->code(404);
        $this->response->body('404');
    }
}