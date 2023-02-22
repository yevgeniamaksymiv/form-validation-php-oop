<?php

namespace App;

class CategoryValidator extends Validator
{
    public function validate($value)
    {
        if (isset($value) && in_array((int) $value, [1, 2, 3])) {
            $this->errorTxt = '';
            $this->isError = false;
        } else {
            $this->errorTxt = 'Choose category';
            $this->isError = true;
        }
    }

}