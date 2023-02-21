<?php

namespace App;

class TitleValidator extends Validator
{
    public function validate($value)
    {
        if (empty($value) || mb_strlen($value) < 3 || mb_strlen($value) > 255) {
            $this->errorTxt = 'Enter correct title';
            $this->isError = true;
        } else {
            $this->input = $value;
            $this->errorTxt = '';
            $this->isError = false;
        }
    }

}