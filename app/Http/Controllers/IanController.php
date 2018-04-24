<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 28/11/2017
 * Time: 21:54
 */

namespace App\Http\Controllers;


class IanController extends Controller
{
    public static function longestmatching($string_1, $string_2)
    {
        $string_1_length = strlen($string_1);
        $string_2_length = strlen($string_2);
        $return = '';

        if ($string_1_length === 0 || $string_2_length === 0) {
            // Geen matches
            return $return;
        }

        // Initialize the CSL array to assume there are no similarities
        $longest_common_subsequence = array_fill(0, $string_1_length, array_fill(0, $string_2_length, 0));

        $largest_size = 0;

        for ($i = 0; $i < $string_1_length; $i++) {
            for ($j = 0; $j < $string_2_length; $j++) {
                // zoek combinatie characters
                if ($string_1[$i] === $string_2[$j]) {
                    // zelfde in bijde strings
                    if ($i === 0 || $j === 0) {
                        // 1e char dus 1 char lang
                        $longest_common_subsequence[$i][$j] = 1;
                    } else {
                        // 1 character groter dan de vorige
                        $longest_common_subsequence[$i][$j] = $longest_common_subsequence[$i - 1][$j - 1] + 1;
                    }

                    if ($longest_common_subsequence[$i][$j] > $largest_size) {
                        // voorlopig de langste
                        $largest_size = $longest_common_subsequence[$i][$j];
                        // vorige resultaten verwijderen
                        $return = '';
                        // terug naar vorige functie, voorlopig de langste
                    }

                    if ($longest_common_subsequence[$i][$j] === $largest_size) {
                        // onthou de langste string
                        $return = substr($string_1, $i - $largest_size + 1, $largest_size);
                    }
                }
            }
        }

        // return matches
        return response()->json(array("value" => $return), 200);
    }

    public static function morse($request)
    {
        $bit = $request['value'];

        $morse = "";
        $bitTemp = $bit;

        $sequentie = $bitTemp;
        $lowest = 0;
        $highest = 0;
        $count = 0;
        while ($sequentie > 0) {
            if (substr($sequentie, 0, 1) == "1") {
                $count += 1;
                $sequentie = substr($sequentie, 1, strlen(($sequentie)));
            } else {
                break;
            }
        }

        $lowest = $count + 1;

        for ($i = 0; $i < 142; $i++) {
            $first6 = substr($bitTemp, 0, 6);
            $first2 = substr($bitTemp, 0, 2);
            if ($first6 == (str_repeat("111", $lowest))) {
                $morse .= "-";
                $bitTemp = substr($bitTemp, 6, strlen($bitTemp));
            } elseif ($first6 == (str_repeat("000", $lowest))) {
                $morse .= " ";
                $bitTemp = substr($bitTemp, 6, strlen($bitTemp));
            } elseif ($first2 == (str_repeat("1", $lowest))) {
                $morse .= ".";
                $bitTemp = substr($bitTemp, 2, strlen($bitTemp));
            } elseif ($first2 == (str_repeat("0", $lowest))) {
                $bitTemp = substr($bitTemp, 2, strlen($bitTemp));
            }

        }

        $lettertomorse = array(
            "a" => ".-",
            "b" => "-...",
            "c" => "-.-.",
            "d" => "-..",
            "e" => ".",
            "f" => "..-.",
            "g" => "--.",
            "h" => "....",
            "i" => "..",
            "j" => ".---",
            "k" => ".-.",
            "l" => ".-..",
            "m" => "--",
            "n" => "-.",
            "o" => "---",
            "p" => ".--.",
            "q" => "--.-",
            "r" => ".-.",
            "s" => "...",
            "t" => "-",
            "u" => "..-",
            "v" => "...-",
            "w" => ".--",
            "x" => "-..-",
            "y" => "-.--",
            "z" => "--..",
            "1" => ".----",
            "2" => "..---",
            "3" => "...--",
            "4" => "....-",
            "5" => ".....",
            "6" => "-....",
            "7" => "--...",
            "8" => "---..",
            "9" => "----.",
            "0" => "-----",
            " " => "   ",
            "." => ".-.-.-",
            "," => "--..--",
            "EOM" => ".-.-."
        );

        $morsetoletter = array();
        reset($lettertomorse);
        foreach ($lettertomorse as $letter => $code) {
            $morsetoletter[$code] = $letter;
        }

        return response()->json(array("value" => IanController::morse_decode($morse, $morsetoletter)), 200);
    }

    public static function morse_decode($string, $arr)
    {
        $morsetoletter = $arr;

        $line = "";
        $letters = explode(" ", $string);
        foreach ($letters as $letter) {
            if (empty($letter))
                $line .= " ";
            if (empty($morsetoletter[$letter]))
                continue;

            $line .= $morsetoletter[$letter];
        }

        var_dump($line);
        return $line;
    }

    public static function gameoflife($request)
    {
        $array = $request['value'];
        $amount = $request['key'];

        for ($k = 0; $k < $amount; $k++) {
            for ($i = 0; $i < count($array); $i++) {

                $getal = $array[$i];
                if ($i + 1 < sizeof($array)) {
                    $getal2 = $array[$i + 1];

                    if ($getal == 2 && $getal2 == 1) {
                        $array[$i + 1] = 0;
                    }

                    if ($getal == 1 && $getal2 == 2) {
                        $array[$i] = 0;
                    }
                }

                if ($i + 2 < sizeof($array)) {
                    $getal3 = $array[$i + 2];

                    if ($getal == 0 && $getal2 == 1 && $getal3 == 1) {
                        $array[$i] = 1;
                    }

                    if ($getal == 1 && $getal2 == 1 && $getal3 == 0) {
                        $array[$i + 2] = 1;
                    }

                    if ($getal == 0 && $getal2 = 2 && $getal3 == 0) {
                        $array[$i + 1] = 0;
                    }
                }
            }
        }

        return response()->json(array("value" => $array), 200);
    }
}