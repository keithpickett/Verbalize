<?php
/**
 * Date: 5/24/17
 * Time: 1:12 PM
 */

include "identichar.class.php";
require __DIR__ . '/vendor/autoload.php';

use Picknology\verbalize\IDENTICHAR;
use ZxcvbnPhp\Zxcvbn;

$zxcvbn = new Zxcvbn();
//var_dump($zxcvbn);
//die();
$parser = new IDENTICHAR();

require('./apipasswd.php');
//require('./thirdplibs/wordnik/wordnik/Swagger.php');

//$myAPIKey = 'YOUR KEY GOES HERE';
$myAPIKey = $passwds['wordnik'];

require_once('./thirdplibs/wordnik-php/Wordnik.php');
$wordnik = Wordnik::instance($myAPIKey);

$definitions = $wordnik->getDefinitions('cat');
//var_dump($definitions);
$randomWordObj = $wordnik->getRandomWord();

//var_dump($randomWordObj);


//$randomWord = "NoahMoney's-worth";
$randomWord = $randomWordObj->word;
$randWord = preg_replace("/\'|\"/", "", $randomWord);


//die();
//$client = new APIClient($myAPIKey, 'http://api.wordnik.com/v4');
//var_dump($client);

//$wordApi = new WordApi($client);
//$example = $wordApi->getTopExample('irony');
//$myword = $wordApi->getWord();
//print $example->text;
//var_dump($myword);


$file="names.csv";
$csv= file_get_contents($file);
$array = array_map("str_getcsv", explode("\n", $csv));
$json = json_encode($array);
//print_r($json);
//echo "\n\nXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX\n";
$cntArr = count($array);
$randLow = rand(0,$cntArr);
$randHi = rand($randLow,$cntArr);
$theRandNum = rand($randLow,$randHi);
/*
echo "cntArr: " .$cntArr."\n";
echo "randLow: " .$randLow."\n";
echo "randHi: " .$randHi."\n";
echo "theRandNum: " .$theRandNum."\n";
*/

//var_dump($array);
//var_dump($array[$theRandNum]);
$numRandNames = count($array[$theRandNum]);
$rnum = rand(0,($numRandNames-1));
/*
echo "rnum: " .$rnum."\n";
echo "numRandNames: " .$numRandNames."\n";
echo "name: " .ucfirst($array[$theRandNum][$rnum])."\n";
*/
$propName = ucfirst($array[$theRandNum][$rnum]);
$randWord = ucfirst($randWord);

//echo "randWord: " .$randWord."\n";

$fulllRandWord = $propName.$randWord;

//echo "fullrandWord: " .$fulllRandWord."\n";



//var_dump($leet);
$maxleets = 3;
$leetstr = $parser->turnToLeet($fulllRandWord,$maxleets);
echo "password: " .$leetstr."\n";

$strength = $zxcvbn->passwordStrength($leetstr);
echo "Password Strength: " .$strength['score']."\n";

$vstr = $parser->parseString($leetstr);
echo "vstr: " .$vstr."\n";
//echo <<< ENDDUMP
//  # Strength Score:::
//  0 # too guessable: risky password. (guesses < 10^3)
//  1 # very guessable: protection from throttled online attacks. (guesses < 10^6)
//  2 # somewhat guessable: protection from unthrottled online attacks. (guesses < 10^8)
//  3 # safely unguessable: moderate protection from offline slow-hash scenario. (guesses < 10^10)
//  4 # very unguessable: strong protection from offline slow-hash scenario. (guesses >= 10^10)
//ENDDUMP;




