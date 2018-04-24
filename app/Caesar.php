<?php

namespace App;

class Caesar
{
    public function decrypt($ciphertext, $key)
    {
        return $this->run($ciphertext, -$key);
    }

    protected function run($string, $key)
    {
        return implode('', array_map(function ($char) use ($key) {
            return $this->shift($char, $key);
        }, str_split($string)));
    }

    protected function shift($char, $shift)
    {
        $shift = $shift % 25;
        $ascii = ord($char);
        $shifted = $ascii + $shift;
        if ($ascii >= 65 && $ascii <= 90) {
            return chr($this->upper($shifted));
        }
        if ($ascii >= 97 && $ascii <= 122) {
            return chr($this->lower($shifted));
        }
        return chr($ascii);
    }

    protected function upper($ascii)
    {
        if ($ascii < 65) {
            $ascii = 91 - (65 - $ascii);
        }
        if ($ascii > 90) {
            $ascii = ($ascii - 90) + 64;
        }
        return $ascii;
    }

    protected function lower($ascii)
    {
        if ($ascii < 97) {
            $ascii = 123 - (97 - $ascii);
        }
        if ($ascii > 122) {
            $ascii = ($ascii - 122) + 96;
        }
        return $ascii;
    }
}