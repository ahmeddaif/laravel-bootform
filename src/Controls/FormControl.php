<?php
namespace AGD\BootForm\Controls;

use AGD\BootForm\OptionsTrait;

class FormControl{
    use OptionsTrait;
    protected $model;
    protected $errors;
    protected $helpBlock = '';
    protected $containerOptions = [];
    protected $name;
    protected $value;
    protected $label;
    protected $type;
    protected  $group = [];



    public function setId($id){
        $this->setOption('id', $id);
        return $this;
    }

    public function addClass($class){
        $this->addOption('class', $class);
        return $this;
    }

    public function setOptions($options = []){
        $this->mergeOptions($options);
        return $this;
    }

    public function setValue($value){
        $this->value = $value;
        return $this;
    }

    protected function handleValue(){
        if(!$this->value){
            $this->value = old($this->name, null);
        }
        if($this->model){
            if(!empty($this->model->{$this->name})){
                $this->value = $this->model->{$this->name};
            }
        }
    }

    protected function addFormGroup($input){
        $html = '<div ' . $this->renderOptions($this->containerOptions) .'>';
        if(count($this->group) >0){
            $html .= '<span class="input-group-addon">';
            if($this->group['type'] == 'fonticon'){
                $html .= '<i class="'. $this->group['value'] .'"></i>';
            }else{
                $html .= $this->group['value'];
            }
            $html .= '</span>';
        }
        $html .= $input;
        $html .= $this->helpBlock;
        $html .= '</div>';
        return $html;
    }

    protected function addLabel($input){
        if($this->label){
            return '<label for="'. $this->name . '" >'. $this->label . '</label>'.$input;
        }
        return $input;
    }

    protected function handleErrors(){
        if($this->errors){
            if($this->errors->has($this->name)){
                $this->options['class'] .= 'has-error';
                $this->helpBlock = '<span class="help-block form-error">'. $this->errors->first($this->name) .'</span>';
            }
        }
    }

    protected function addBootClasses(){
        if(empty($this->options['class'])){
            $this->options['class'] = 'form-control';
        }else{
            $this->options['class'] .= ' form-control';
        }

        $containerClass = 'form-group';
        if(count($this->group) >0){
            $containerClass = 'input-group';
        }
        if(empty($this->containerOptions['class'])){
            $this->containerOptions['class'] = $containerClass;
        }else{
            $this->containerOptions['class'] .= ' ' .$containerClass. ' ';
        }
    }


}