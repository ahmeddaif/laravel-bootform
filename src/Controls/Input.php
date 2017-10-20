<?php
namespace AGD\BootForm\Controls;

class Input extends FormControl {

    public function __construct($model, $type, $name, $label = null)
    {
        $this->model = $model;
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
    }

    public function placeholder($val){
        $this->setOption('placeholder', $val);
        return $this;
    }

    public function group($value, $groupType = 'fonticon'){
        $this->group['type'] = $groupType;
        $this->group['value'] = $value;
        return $this;
    }

    protected function handleControl(){
        $this->addBootClasses();
        $this->handleErrors();
        $this->handleValue();
        $input = '<input type="'.$this->type.'" name="'.$this->name.'" value="' .$this->value. '" '. $this->renderOptions($this->options) . ' >';
        $input = $this->addLabel($input);
        return $this->addFormGroup($input);
    }

    protected function handleGroup($input){
        $html = '<div ' . $this->renderOptions($this->containerOptions) .'>';
        $html .= $input;
        $html .= $this->helpBlock;
        $html .= '</div>';
        return $html;
    }


    public function __toString()
    {
        return (string)$this->handleControl();
    }
}