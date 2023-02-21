<?php

namespace App;

class AnnotationValidator extends Validator
{
    public function validate($value)
    {
        if (mb_strlen($value) > 500) {
            $this->errorTxt = 'The number of character must be less than 500';
            $this->isError = true;
        } else {
            $this->input = $value;
            $this->errorTxt = '';
            $this->isError = false;
        }
    }

}