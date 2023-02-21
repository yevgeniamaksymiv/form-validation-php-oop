<?php

namespace App;

class PublishValidator extends Validator
{
    public function validate($value)
    {
        if (empty($value)) {
            $this->errorTxt = 'Check Yes or No';
            $this->isError = true;
        } else {
            $this->errorTxt = '';
            $this->isError = false;

        }
    }

}