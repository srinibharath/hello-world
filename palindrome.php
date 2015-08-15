<?php

$words = array("malayalam", "adda", "earth", "mars", "", null, 'a', "9009"); 

foreach($words as $word) {
    if(isPalindrome($word)) {
        echo "$word is a palindrome \n";
    } else {
        echo "$word is not a palindrome \n";
    }
}

/**
 * Funtion to check whether a word is a palindrome, inline.
 */
function isPalindrome($word) {
    if(empty($word)) {
        //defensive
        return false;
    }
    for($i=0, $j = strlen($word)-1; $i<strlen($word) && $j>0; $i++, $j--){
        if($i >= $j) {
            // a palindrome of even or odd length
            return true;
        } elseif($word{$i} != $word{$j}) {
            return false;
        }
    }
}

?>
