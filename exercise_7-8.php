<?php

class Form {

    private $stringAttrs;
    private $open;
    private $input;
    private $password;
    private $textarea;
    private $submit;
    private $allow_attrs = ['action', 'method', 'type', 'name', 'value', 'id', 'class', 'disabled', 'placeholder', 'cols', 'rows'];

    public function open($data) {

        $this->open = "<form " . $this->makeString($data) . ">";
        return $this->open;

    }

    public function input($data) {

        $this->input = "\n<input " . $this->makeString($data) . ">";
        return $this->input;

    }

    public function password($data) {
        $this->password = "\n<input type=\"password\" " . $this->makeString($data) . ">";
        return $this->password;
    }

    public function textarea($data) {

        $value = isset($data['value']) ? $data['value'] : null; // Боже, что я делаю :-(
        if (isset($value)) unset($data['value']);

        $this->textarea = "\n<textarea " . $this->makeString($data) . ">" . ($value) . "</textarea>";
        return $this->textarea;

    }

    public function submit($data) {

        $this->submit = "\n<input type=\"submit\" " . $this->makeString($data) . ">";
        return $this->submit;
        
    }

    public function close() {

        return "\n</form>";

    }

    protected function makeString($data) {
        $this->stringAttrs = '';
        
        if (is_array($data) and $data) {
            foreach ($data as $attribute => $value) {
                if (in_array($attribute, $this->allow_attrs)) {
                    $this->stringAttrs .= $attribute . ($attribute <> "disabled" ? "=\"${value}\"" : null) . " ";
                }
            }

            $this->stringAttrs = rtrim($this->stringAttrs, " ");
        }

        return $this->stringAttrs;

    }

}

class SmartForm extends Form {
    
    protected function makeString($data) {
        if (!empty($_REQUEST['name'])) {
            $data['value'] = $_REQUEST['name'];
        }
        return parent::makeString($data);
    }

    public function textarea($data) {
        if (!empty($_REQUEST[$data['name']])) {
            $value = $_REQUEST[$data['name']];
            if (isset($value)) unset($data['value']);
        }
        return "<textarea " . parent::makeString($data) . ">" . $value . "</textarea>";
    }

}

$form = new SmartForm;

echo $form->open(['action' => '?submit', 'method' => 'POST']);
echo $form->input(['type' => 'text', 'placeholder' => 'Ваше имя', 'name' => 'name']);
echo $form->password(['placeholder' => 'Ваш пароль', 'name' => 'pass']);
echo $form->submit(['value' => 'Отправить']);
echo $form->close();

