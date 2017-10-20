<?php
namespace AGD\BootForm\Controls;

class File extends FormControl {

    public function __construct($name, $label = null)
    {
        $this->name = $name;
        $this->label = $label;
    }

    protected function handleControl(){
        $this->addBootClasses();
        $this->handleErrors();
        $input = '<input type="file" name="'.$this->name.'"  '. $this->renderOptions($this->options) . ' >';
        $input = $this->addLabel($input);
        return $this->addFormGroup($input);
    }


    public function __toString()
    {
        return (string)$this->handleControl();
    }
}