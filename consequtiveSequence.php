<?php    
    function consequtiveSequence($list = array(), $target = 0) {
        $list = array(1, 3, 5, 23, 2);
        $target = 7;
        // $target = 8;

        // $list = array(23, 5, 4, 7, 2, 11);
        // $target = 20;

        // sequence start and end pointers
        $sequenceStart = $sequenceEnd =  0;

        // variable to store the sum of a sequence that starts at $sequenceStart
        $sum = 0;

        // loop to iterate through the list
        for($i=0; ($i<count($list) || $sequenceStart<count($list)) ; $i++) {

            // check if the sequence sums upto the target
            
            // what if just removing (subtracting) the first element from current sequence
            // and you just got the sequence even before adding next element
            // check if the sequence sums upto the target
            if($sum == $target) {
                $sequenceEnd = $i;
                echo "true";
                return true;         
            }

            // sum only until you reach end of the list
            if($i<count($list)) {
                $sum = $sum + $list[$i];
            }

            // check if the sequence sums upto less than the target
            if ($sum < $target) {
                // if loop variant has already reached end, simply quit.
                // no subsequence could have a sum that will be >= target in such case if
                // total sum is lesser than target.
                if($i >= count($list)) {
                   break;
                }
                if($sequenceStart < count($list)) {
                    continue;
                }
            }

            // check if the sequence sums to greater than the target,
            // and move start pointer to start a new sequence and subtract
            // previous sequenceStart number from sum 
            else {
                $sum = $sum - $list[$sequenceStart];
                $sequenceStart = $sequenceStart + 1;
            }
        }

        echo "false";
        return false;
        
    }
?>
