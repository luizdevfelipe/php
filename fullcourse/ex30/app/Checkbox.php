<?php 
    namespace app;
    class CheckBox extends Boolean{
        public function render(): string
    {
        return <<<HTML
<input type='checkbox' name="{$this->name}"/>
HTML;
    }
    }

?>