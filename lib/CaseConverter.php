<?php

namespace PagarMe\Sdk;

trait CaseConverter
{
    use CaseConverter;

    private function snakeToUpperCamel($sentence)
    {
        return preg_replace_callback("/(?:^|_)([a-zA-Z])/", function ($word) {
            return strtoupper($word[1]);
        }, $sentence);
    }

    private function snakeToLowerCamel($sentence)
    {
        return lcfirst($this->snakeToUpperCamel($sentence));
    }
}
