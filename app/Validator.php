<?php

namespace App;

abstract class Validator implements iValidator
{
    public string $errorTxt;
    public bool $isError;
    public string $input;

}