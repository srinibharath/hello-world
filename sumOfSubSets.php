<?php
// main script that will drive the code.
// algorithm is:
// at each number i in the set, try to generate all the subsets at i+1.
// generate the power set and see if all the elements of a set sum up to the target

// set that holds the input of postive integers

// hardcoded at present, come back and make this dynamic by taking it as input
var $set = array(23, 5, 4, 7, 2, 11);

// hardcoded at present, come back and make this dynamic by taking it as input
var $target = 20;

var $powerSet = array();

// funciton call to helper function to generate the power set
generateTreeAtI($set, 0);

// iterate through the powerSet to check all sets that sum to the integer T

// the powerSet[0] will have all the (2^n - 1) sets
foreach($powerSet[0] as $subSet) {
    // if array sum of $subSet equals to T, print as a consequtive sequence
    if(array_sum($subSet) == $target){ // not sure if array_sum available, can implemenet though
        echo "<br/>Consequetive sequence found <br/>";
        echo "<pre>";
        print_r($subSet);
        echo "</pre>";
    }
}

/**
 * Recursive helper function to generate the subsets
 */
function generateTreeAtI($set, $i) {
    
    // until you are at the last number of the set, recursively generate the subset at $i + i
    if($i < count($set-1)) {
        generateTreeAtI($set, $i+1);
        addIToAllElementsOfTreeAtIPlusOne($set, $i);
    } else {
        // recursion terminal condition
        $powerSet[$set[$i]] = array($set[$i]);
    }
}

/**
 * Funtion to do: Tree at i, i added to all elements to sub-tree at $i+1
 */
function addIToAllElementsOfTreeAtIPlusOne($set, $i) {
    $result = array();
    // first add the element itself as a single set
    $result = array($set[$i]);
    foreach($powerSet[$i+1] as $subSet) {
        if(is_array($subSet)) {
            $result[] = array_merge(array($set[$i]), $subSet);
        } else {
            // last element in the set, a node, not a tree.
            $result[] = array($subSet);
        }
    }
    $powerSet[$set[$i]] = $result;
}


?>
