<?php

$wordPairs[] = array("cat", "act");             // happy path
$wordPairs[] = array("cat", "apt");             // not so happy path
$wordPairs[] = array("cat", "pact");            // not so happy path
$wordPairs[] = array("cat", "tact");            // not so happy path
$wordPairs[] = array("31121984", "12311984");   // happy path

foreach($wordPairs as $words) {
    if(isAnagram($words[0], $words[1])) {
        echo "$words[0], $words[1] are anagrams. \n";
    } else {
        echo "$words[0], $words[1] are not anagrams. \n";
    }
}

function isAnagram($word1, $word2) {
    if(empty($word1) || empty($word1) || (strlen($word1) != strlen($word2))) {
        // check for empty strings or if
        // one of the words atleast has one or more chars more than the other 
        return false;
    } else {
        $charFreqMapWord1 = __buildFrequencyMap($word1);
        print_r($charFreqMapWord1);
        $charFreqMapWord2 = __buildFrequencyMap($word2);
        print_r($charFreqMapWord2);
        foreach($charFreqMapWord1 as $char => $count) {
            if(isset($charFreqMapWord2[$char]) && $charFreqMapWord2[$char] == $count) {
                continue;
            } else {
                return false;
            }
        }
        return true;
    }
}

function __buildFrequencyMap($word = "") {
    $chars = array();
    if(empty($word)) {
        return $chars;
    }
    $wordLength = strlen($word);
    // associative array which will maintain mapping of a char and number
    // of times it occurs in the given word. 
    for($i=0; $i < $wordLength; $i++) {
        if(isset($chars[$word{$i}])) {
            $chars[$word{$i}] = $chars[$word{$i}]++;
        } else {
            $chars[$word{$i}] = 1;
        }
    }
    return $chars;
}

?>
