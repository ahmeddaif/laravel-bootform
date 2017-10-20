<?php
namespace AGD\BootForm;

trait OptionsTrait{
    protected $options = [];

    protected function mergeOptions($options = []){
        foreach ($options as $key => $option){
            if($key == 'class'){
                $this->addOption($key, $option);
            }else{
                $this->setOption($key, $option);
            }
        }
    }

    protected function addOption($key, $value){
        if(empty($this->options[$key])){
            $this->options[$key] = $value;
        }else{
            $this->options[$key] .= ' '. $value;
        }
    }

    protected function setOption($key, $value){
        $this->options[$key] = $value;
    }

    protected function renderOptions($options){
        $html = '';
        foreach ($options as $key=>$option){
            //if($option){
                $html .= $key. '="' . $option . '" ';
            //}
        }
        return $html;
    }

}