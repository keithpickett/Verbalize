<?php

namespace Picknology\verbalize;

include "chars.php";


/**
 * Class IDENTICHAR
 * @package Picknology\verbalize
 */
class IDENTICHAR {
/*
    function __construct() {
        //print "In BaseClass constructor\n";
    }
*/


    /**
     * Generates a human-readable pronunciation of $string.
     *
     * Walks through each character in %string, determines if uppercase, lowercase, number, or special character.
     *
     * Returns a comma-separated string of verbalized $string.
     *
     * @param $string
     * @return string
     */
    public function parseString($string) {
        global $chars;

        $lenstr = strlen( $string );
        for( $i = 0; $i <= $lenstr; $i++ ) {
            if($i != $lenstr) {

                $char = substr( $string, $i, 1 );
                //echo "testing: " .$i.". char: ".$char."\n";
                if (ctype_alpha($char)) {
                   // echo " is alpha | ";
                    if (ctype_upper($char)) {
                    //    echo " is uppercase\n";
                        $prstr = "Upper-".$char;
                    } else {
                     //   echo " is lowercase\n";
                        $prstr = "Lower-".$char;
                    }

                } elseif (ctype_digit($char)) {
                   // echo " is numeric \n";
                    $prstr = "Number-".$char;
                } else {
                   // echo " is special \n";
                    $prstr = $chars[$char];
                }
            }
            $verbalstr[] =  $prstr;
        }
        $cntvstr = count($verbalstr);
        $x=0;
        $sep="";
        foreach ($verbalstr as $vstr) {

            if($cntvstr != $x) {
                $sep .= $vstr;
                $sep .= ", ";
                $x++;
            }
        }
        return $sep;
    }

    /**
     * Converts $string to leet-inclusive string.
     *
     * Walks through each character in $string and randomly substitutes an alternate special character or number if it qualifies as
     * a substitutable character.
     *
     * Returns a string up leet-like mixed characters representing original string.
     * @param $string
     * @param $maxleets
     * @return string
     */
    public function turnToLeet($string, $maxleets) {

        global $leet;
        $newLeetString = "";

        $spaceRanges = array();
        $lenstr = strlen( $string );
        //echo "lenstr: " .$lenstr."\n";
        $cntleet = 0;
        $minleets = 1;
        $spaceRanges = $this->getRandomPlaces($minleets,$lenstr, $maxleets);
        //echo "space:Ranges:\n";
        //var_dump($spaceRanges);
        for( $i = 0; $i <= $lenstr; $i++ ) {
            if ($i != $lenstr) {
                $char = substr($string, $i, 1);
                //echo "testing: " .$i.". char: ".$char."\n";
                if(in_array($i,$spaceRanges)) {
                //if($cntleet == $maxleets) {
                    $leetChar = $this->getLeetChar(strtoupper($char),$cntleet);
                    //echo "leetChar: " .$leetChar."\n";
                    $newLeetString .= $leetChar;

                } else {
                    $newLeetString .= $char;
                }

        }
        }

        return $newLeetString;

    }

    /**
     * Checks if $char is in the $leet database (local array).  If it exists, it chooses a leet equivalent
     * character and returns it.
     *
     * Searches $leet array for $char.
     *
     * Returns $char if not in $leet or new $leet equivalent if it does exist.
     * @param $char
     * @param $cleet
     * @return mixed
     */
    public function getLeetChar($char, &$cleet) {

        global $leet;

        //echo "1. leet-char: " .print_r($leet[$char],TRUE)."\n";
        if(!empty($leet[$char])) {

            $tmpCnt = count($leet[$char]);
            //echo "tmpCnt: " .$tmpCnt."\n";
            $uppernum = ($tmpCnt-1);
            $tmpRand = rand(0,$uppernum);
            $cleet++;
            //echo "Using leet char: " .$leet[$char][$tmpRand];
            return $leet[$char][$tmpRand];

        } else return $char;

    }

/*
 *  Found at https://stackoverflow.com/questions/5612656/generating-unique-random-numbers-within-a-range-php
 *
 */
    /**
     * @param $min
     * @param $max
     * @param $quantity
     * @return array
     */
    public function getRandomPlaces($min, $max, $quantity) {

        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);

        //Wrapped function:
//function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
//    $numbers = range($min, $max);
//    shuffle($numbers);
//    return array_slice($numbers, 0, $quantity);
//}
////Example:
//
//print_r( UniqueRandomNumbersWithinRange(0,25,5) );

    }


}
?>
