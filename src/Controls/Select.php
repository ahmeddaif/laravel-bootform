<?php
namespace AGD\BootForm\Controls;

class Select extends FormControl {

    protected $items;
    protected $multiple = false;

    public function __construct($model, $name, $label = null)
    {
        $this->model = $model;
        $this->name = $name;
        $this->label = $label;
        $this->items = [];
    }

    public function setItems($items){
        if(is_array($items)){
            $this->items = $items;
            return $this;
        }
        throw new \Exception('items must be an array');
    }

    public function multiple($multiple = true){
        $this->multiple = $multiple;
        return $this;
    }

    public function placeholder($value = ''){
        $this->items = array_reverse($this->items, true);
        $this->items[''] = $value;
        $this->items = array_reverse($this->items, true);
        return $this;
    }

    protected function handleControl(){
        $this->addBootClasses();
        $this->handleErrors();
        $this->handleValue();
        $input = '<select name="'.$this->name.'" value="' . $this->value. '" '. $this->renderOptions($this->options);
        if($this->multiple){
            $input .= ' multiple';
        }
        $input .= ' >';
        foreach ($this->items as $key=>$item) {
            $input .= '<option value="' . $key . '">' . $item . '</option>';
        }
        $input .= '</select>';
        $input = $this->addLabel($input);
        return $this->addFormGroup($input);
    }


    public function __toString()
    {
        return (string)$this->handleControl();
    }
}