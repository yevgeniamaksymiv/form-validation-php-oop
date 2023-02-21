<?php

namespace App;

class ContentValidator extends Validator
{
    public function validate($value)
    {
        if (mb_strlen($value) > 30000) {
            $this->errorTxt = 'The number of character must be less than 30000';
            $this->isError = true;
        } else {
            $this->input = $value;
            $this->errorTxt = '';
            $this->isError = false;
        }
    }

}