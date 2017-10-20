<?php
namespace AGD\BootForm\Controls;

class Textarea extends FormControl {

    public function __construct($model, $name, $label = null)
    {
        $this->model = $model;
        $this->name = $name;
        $this->label = $label;
    }

    public function placeholder($val){
        $this->setOption('placeholder', $val);
        return $this;
    }

    protected function handleControl(){
        $this->addBootClasses();
        $this->handleErrors();
        $this->handleValue();
        $input = '<textarea name="'.$this->name.'" ' . $this->renderOptions($this->options) . ' >'. $this->value . '</textarea>';
        $input = $this->addLabel($input);
        return $this->addFormGroup($input);
    }



    public function __toString()
    {
        return (string)$this->handleControl();
    }
}