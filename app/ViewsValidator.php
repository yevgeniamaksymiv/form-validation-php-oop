<?php

namespace App;

class ViewsValidator extends Validator
{
    public function validate($value)
    {
        if (!preg_match("/^[0-9]*$/", (int) $value) || (int) $value < 0) {
            $this->errorTxt = 'Views must be a number and greater than zero';
            $this->isError = true;
        } else {
            $this->input = $value;
            $this->errorTxt = '';
            $this->isError = false;
        }
    }

}