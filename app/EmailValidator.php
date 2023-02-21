<?php

namespace App;

class EmailValidator extends Validator
{
    public function validate($value)
    {
        if (empty($value) || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errorTxt = 'Enter correct email';
            $this->isError = true;
        } else {
            $this->input = $value;
            $this->errorTxt = '';
            $this->isError = false;
        }
    }

}