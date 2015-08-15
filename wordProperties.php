<?php

$word = "alphabet"; //google

if (!empty($word)) {
    if(uniqueCharacters($word)) {
        echo "This word '$word' has only unique characters." . "\n";
    } else {
        echo "This word '$word' has atleast one duplicate character." . "\n";
    }
    
    $distinctChars = removeDuplicateCharacters($word);
    echo "Removed duplicate characters from word '$word' & result is '$distinctChars'" . "\n";

    $reverse = reverse($word);
    echo "Reverse of word '$word' is '$reverse'" . "\n";
    
}
else {
    // defensive
    echo "Empty word passed. Not much we can do :) ." . "\n";    
}


function uniqueCharacters($word) {
    if(empty($word)) {
        // defensive
        return false;
    }
    
    // length of the given word
    $wordLength = strlen($word);

    if($wordLength == 1) {
        // special case
        return true;
    }

    // associative array which will maintain mapping of a char and number
    // of times it occurs in the given word. 
    $chars = array();
    for($i=0; $i < $wordLength; $i++) {
        // we can break the first time we get a char that is repeated.
        if(isset($chars[$word{$i}])) {
            // this means the char has already occured in the word.
            return false;
        } else {
            // you can assign anything to denote the char was found in the word.
            // using 1 here leaves scope for extending this to reflect how many
            // times it occurs.
            $chars[$word{$i}] = 1;
        }
    }
    return true;
}

function removeDuplicateCharacters($word) {
    if(empty($word)) {
        // defensive
        return $word;
    }

    // length of the given word
    $wordLength = strlen($word);

    if($wordLength == 1) {
        // special case
        return $word;
    }

    $chars = __buildFrequencyMap($word);

    // PHP associative arrays do maintain the order of insertion.
    // So simply iterate and the unique chars found in the word.
    $result = "";
    foreach($chars as $key => $value) {
        $result .= $key;    
    }
    return $result;
}

function reverse($word) {
    if(empty($word)) {
        // defensive
        return $word;
    }

    // length of the given word
    $wordLength = strlen($word);

    if($wordLength == 1) {
        // special case
        return $word;
    }

    $wordReverse = "";
    for($i=$wordLength-1; $i>=0; $i--) {
        $wordReverse .= $word{$i};    
    }
    return $wordReverse;
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
