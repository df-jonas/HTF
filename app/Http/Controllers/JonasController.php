<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 30/11/2017
 * Time: 9:12
 */

namespace App\Http\Controllers;


use App\Caesar;

class JonasController
{
    public static function caesar($request)
    {
        $cip = new Caesar();
        return response()->json(array("value" => $cip->decrypt($request['input'], $request['offset'])));
    }

    public static function digits($request)
    {
        $digits = $request['value'];

        if (
            strpos($digits, "111") !== false ||
            strpos($digits, "222") !== false ||
            strpos($digits, "333") !== false ||
            strpos($digits, "444") !== false ||
            strpos($digits, "555") !== false ||
            strpos($digits, "666") !== false ||
            strpos($digits, "777") !== false ||
            strpos($digits, "888") !== false ||
            strpos($digits, "999") !== false
        ) {
            return response()->json(array("value" => true), 200);
        }
        return response()->json(array("value" => false), 200);
    }

    public static function morse($request)
    {
        $morse = "";
        $resolved = "";
        $morsebinary = $request['value'];

        while (strlen() != 0) {
            if (substr($morsebinary, 0, 4) == "1100") {
                $morsebinary = substr($morsebinary, 4);
                $morse .= ".";
            }
            if (substr($morsebinary, 0, 4) == "0000") {
                $morsebinary = substr($morsebinary, 4);
                $morse .= " ";
            }
            if (substr($morsebinary, 0, 4) == "1100") {
                $morsebinary = substr($morsebinary, 4);
            }
            if (substr($morsebinary, 0, 4) == "1100") {
                $morsebinary = substr($morsebinary, 4);
            }
            if (substr($morsebinary, 0, 4) == "1100") {
                $morsebinary = substr($morsebinary, 4);
            }
        }
    }

    public static function strands($request)
    {
        $longest = "";

        $a = $request->strandA;
        $b = $request->strandB;

        if (strlen($a) > strlen($b)) {
            $max = $a;
            $min = $b;
        } else {
            $max = $b;
            $min = $a;
        }

        for ($i = 0; $i < strlen($min); $i++) {
            $val = substr($min, 0, $i);

            for ($i = 1; $i < strlen($val); $i++) {

                $try = substr($val, 0, $i);

                if (strpos($max, $try) !== false) {
                    if (strlen($longest) >= strlen($try)) {
                        $longest = $try;
                    }
                }
            }
        }

        return response()->json(array("value" => $longest));

    }

    public static function palindrome($request)
    {
        $found = false;

        $try = $request['value'];

        while (!$found) {

            $number = $try;

            if ($number == strrev($number)) {
                $found = true;
            } else {
                $try = $try + 1;
            }
        }

        return response()->json(array("value" => $try));
    }
}