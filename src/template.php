<?php
namespace Moxy;

class Template {

    protected $layout;

    public function __construct()
    {

    }

    public function setLayout($name)
    {
        $this->layout = $name;
    }

    public function setTemplate($name)
    {
        $this->template = $name;
    }

    public function getTemplateFile()
    {
        return $this->template;
    }

    public function render()
    {
        $templateFile = $this->getTemplateFile();

        if(!file_exists($templateFile)) {
            throw new MoxyException('Missing template file: ' . $templateFile);
        }

        ob_start();
        require $templateFile;

        $content = ob_get_clean();
    }
}