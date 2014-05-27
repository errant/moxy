<?php
namespace Moxy;

class Template {

    protected $layout;
    protected $data = array();

    public function __construct()
    {

    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function setTemplate($name)
    {
        $this->template = $name;
    }

    public function setData($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function getTemplateFile()
    {
        return $this->template;
    }

    public function render()
    {
        $templateFile = $this->getTemplateFile();

        if(!file_exists('templates/' .  $templateFile . '.phtml')) {
            throw new MoxyException('Missing template file: ' . $templateFile . '.phtml');
        }

        extract($this->data);

        ob_start();
        require 'templates/' .  $templateFile . '.phtml';

        $content = ob_get_clean();
        if($this->layout) {
           ob_start();
          require 'layouts/' .  $this->layout . '.phtml';

          $content = ob_get_clean(); 
        }
        return $content;
    }
}