<?php    
    function fibonacciSequence($n) {
        $penultimate    = 0;
        $previous       = 1;
        
        echo $penultimate . "\n";
        echo $previous . "\n";
        
        for ($i=1; $i<=$n-2; $i++) {
            $current = $penultimate + $previous;
            $penultimate = $previous;
            $previous = $current;
            echo $current . "\n";
        }
    }
?>
