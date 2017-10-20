<?php
namespace AGD\BootForm\Controls;

class Radio extends FormControl {

    protected $checked = false;

    public function __construct($model, $name, $label = null)
    {
        $this->model = $model;
        $this->name = $name;
        $this->label = $label;
    }

    public function val($value)
    {
        $this->value = $value;
        return $this;
    }

    public function checked($checked = true){
        $this->checked = $checked;
        return $this;
    }

    protected function handleControl(){
        $this->addBootClasses();
        $this->handleErrors();
        $this->handleValue();
        $input = '<input type="radio" name="'.$this->name.'" value="' .$this->value. '" '. $this->renderOptions($this->options);
        if($this->checked){
            $input .= ' checked';
        }
        $input .=' >';
        $input = $this->addLabel($input);
        return $this->addFormGroup($input);
    }

    protected function handleValue()
    {
        $this->value = null;
        if($this->model){
            if(!empty($this->model->{$this->name})){
                $this->checked = $this->model->{$this->name};
            }
        }
    }

    protected function addBootClasses(){
        if(empty($this->containerOptions['class'])){
            $this->containerOptions['class'] = 'radio';
        }else{
            $this->containerOptions['class'] .= ' radio ';
        }
    }

    protected function addLabel($input)
    {
        if($this->label){
            return '<label>' . $input .' '. $this->label . '</label>';
        }
        return $input;
    }


    public function __toString()
    {
        return (string)$this->handleControl();
    }
}