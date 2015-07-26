    function FizzBuzz() {
    
        // loop to iterate through +ve integers 1-100
        for($i=1; $i<=100 ; $i++) {

            // mutually exclusive conditions to check for divisibility by 15, 3 and 5 in that order.
            if($i % 15 == 0) {
                echo "FizzBuzz" . "<br/>";
            } elseif($i % 3 == 0) {
                echo "Fizz" . "<br/>";
            } elseif($i % 5 == 0) {
                echo "Buzz" . "<br/>";
            } else {
                echo $i . "<br/>";
            }
        }
    }
