<?php
namespace AGD\BootForm;

use AGD\BootForm\Controls\Checkbox;
use AGD\BootForm\Controls\File;
use AGD\BootForm\Controls\Input;
use AGD\BootForm\Controls\Radio;
use AGD\BootForm\Controls\Select;
use AGD\BootForm\Controls\Textarea;

class BootForm{
    use OptionsTrait;
    protected $model;
    protected $html;
    protected $control;

    /**
     * open form
     * @param string $action
     * @param string $method
     * @param bool $multipart
     * @return $this
     */
    public function open($action = '', $method = 'post', $multipart = false){
        $this->html = '<form ';
        if($action){
            $this->html .= 'action="' . $action . '" ';
        }
        $this->html .= 'method="' . $method . '" ';

        if($multipart){
            $this->html .= 'enctype="multipart/form-data" ';
        }

        return $this;
    }

    /**
     * assign data model form
     * @param $model
     * @return $this
     */
    public function setModel($model){
        $this->model = $model;
        return $this;
    }

    /**
     * set form id
     * @param $id
     * @return $this
     */
    public function setId($id){
        $this->setOption('id', $id);
        return $this;
    }

    /**
     * add a class to form tag
     * @param $class
     * @return $this
     */
    public function addClass($class){
        $this->addOption('class', $class);
        return $this;
    }

    /**
     * add form options (attrs)
     * @param array $options
     * @return $this
     */
    public function setOptions($options = []){
        $this->mergeOptions($options);
        return $this;
    }

    /**
     * close the form
     * @return string
     */
    public function close(){
        return '</form>';
    }

    /**
     * text box
     * @param $name
     * @param $label
     * @return Input
     */
    public function text($name, $label = null){
        return new Input($this->model, 'text', $name, $label);
    }

    /**
     * number input
     * @param $name
     * @param null $label
     * @return Input
     */
    public function number($name, $label = null){
        return new Input($this->model, 'number', $name, $label);
    }

    /**
     * text area input
     * @param $name
     * @param $label
     * @return Textarea
     */
    public function textarea($name, $label = null){
        return new Textarea($this->model, $name, $label);
    }

    /**
     * select box
     * @param $name
     * @param $label
     * @return Select
     */
    public function select($name, $label = null){
        return new Select($this->model, $name, $label);
    }

    /**
     * file input
     * @param $name
     * @param $label
     * @return File
     */
    public function file($name, $label = null){
        return new File($name, $label);
    }

    /**
     * checkbox
     * @param $name
     * @param null $label
     * @return Checkbox
     */
    public function checkbox($name, $label = null){
        return new Checkbox($this->model, $name, $label);
    }

    /**
     * radio button
     * @param $name
     * @param null $label
     * @return Radio
     */
    public function radio($name, $label = null){
        return new Radio($this->model, $name, $label);
    }

    /**
     * render the html to return it
     * @return string
     */
    protected function render(){
        $this->html .= $this->renderOptions($this->options);
        $this->html .= '>';
        return $this->html;
    }

    public function __toString()
    {
        return (string)$this->render();
    }


}