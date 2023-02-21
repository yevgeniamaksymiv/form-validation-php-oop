<?php

namespace App;

class DateValidator extends Validator
{
    private function checkBiggerThanToday($date)
    {
        $today = date("Y-m-d");
        if ($date < $today) {
            return true;
        }
    }
    public function validate($value)
    {
            $date = explode('-', $value);
            if (!checkdate((int) $date[1], (int) $date[2], (int) $date[0])
                || !$this->checkBiggerThanToday($value)) {
            $this->errorTxt = 'Enter correct date';
            $this->isError = true;

            } else {
                $this->input = $value;
                $this->errorTxt = '';
                $this->isError = false;
            }
        }

}