<?php

include "identichar.class.php";

use Picknology\verbalize\IDENTICHAR;

$parser = new IDENTICHAR();

//var_dump($parser);
/*
$azRange = range('A', 'Z');
foreach ($azRange as $letter)
{
    print("$letter\n");
    echo strtolower($letter)."\n";
}
*/


$string = "ejJOk039#)!~|";

//
////$str = "String to loop through"
//$strlen = strlen( $string );
//echo "length: " .$strlen."\n";
//for( $i = 0; $i <= $strlen; $i++ ) {
//    if($i != $strlen) {
//
//    $char = substr( $string, $i, 1 );
//    // $char contains the current character, so do your processing here
//    //echo "char: " .$char."\t";
//    echo "testing: " .$i.". char: ".$char."\n";
//    if (ctype_alpha($char)) {
//        echo " is alpha | ";
//        if (ctype_upper($char)) {
//            echo " is uppercase\n";
//            $prstr = "Upper-".$char;
//
//        } else {
//            echo " is lowercase\n";
//            $prstr = "Lower-".$char;
//
//        }
//
//    } elseif (ctype_digit($char)) {
//        echo " is numeric \n";
//        $prstr = "Number-".$char;
//
//    } else {
//        echo " is special \n";
//        $prstr = $chars[$char];
//
//    }
//    }
//    echo "verbal string: " .$prstr."\n";
//    $verbalstr[] =  $prstr;
//}

$vstr = $parser->parseString($string);

//var_dump($parser::$chars);
//var_dump($chars);
//echo "chars ~: ".$chars['~']."\n";
//echo "String: ";
//$cntvstr = count($verbalstr);
//$x=0;
//$kp="";
//foreach ($verbalstr as $vstr) {
//
//    //echo $vstr;
//    if($cntvstr != $x) {
//        $kp .= $vstr;
//        $kp .= ", ";
//        $x++;
//    }
//}
//echo "kp: " .$kp."\n";
echo "vstr: " .$vstr."\n";

