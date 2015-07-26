<?php

// main script that will drive the code.
// algorithm is:
// at each number i in the set, try to generate all the subsets at i+1.
// generate the power set and see if all the elements of a set sum up to the target

// set that holds the input of postive integers
// hardcoded at present, come back and make this dynamic by taking it as input
$set = array(23, 5, 4, 7, 2, 11);
// $set = array(23, 5, 4);

// target sum thats sets should add upto
// hardcoded at present, come back and make this dynamic by taking it as input
$target = 20;

$powerSet = array();

/**
 * Recursive helper function to generate the subsets
 */
function generateTreeAtI($set, $i) {

    global $powerSet;
    
    // until you are at the last number of the set, recursively generate the subset at $i + i
    if($i < count($set)-1) {
        generateTreeAtI($set, $i+1);
        addIToAllElementsOfTreeAtIPlusOne($set, $i);
    } else {
        // recursion terminal condition
        $powerSet[$set[$i]] = array(array($set[$i]));
    }
}


/**
 * Funtion to do: Tree at i, i added to all elements to sub-tree at $i+1
 */
function addIToAllElementsOfTreeAtIPlusOne($set, $i) {

    // generated elements of for set at i to be added to the powerset
    global $powerSet;

    // result array to collect all subSets at i formed by adding i to all elements of subSet at i+1
    $result = array();

    // remember to add the singleton set i also
    $result[] = array($set[$i]);

    // loop through each subSet at i+1 and add i to them
    foreach($powerSet[$set[$i+1]] as $subSet) {
        if(is_array($subSet)) {
            // add i to subSet and add the resultant set to the result array
            $result[] = array_merge(array($set[$i]), $subSet);
        } else {
            // last subSet in the set, a node, not a tree; add to the result array
            $result[] = array($set[$i], $subSet);
        }
    }

    // add all subSets for i to the powerSet at position $powerSet[i]
    $powerSet[$set[$i]] = array_merge($powerSet[$set[$i+1]], $result);
}

// function call to helper function to generate the power set
generateTreeAtI($set, 0);

// print_r($powerSet[$set[0]]);
// echo "\n";

// iterate through the powerSet to check all sets that sum to the integer T
// the powerSet[0] will have all the (2^n - 1) sets
foreach($powerSet[$set[0]] as $subSet) {

    // if array sum of $subSet equals to T, print as a consequtive sequence
    if(array_sum($subSet) == $target){ // not sure if array_sum available, can implemenet though
        echo "Subset that adds upto the given target T = $target found: \n";
        print_r($subSet);
    }
}

?>
