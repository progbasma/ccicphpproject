<?php

$date1 = strtotime("+3 weeks -3days +2hours +30mins +30secs");
$date2 = strtotime("next friday +1hours +30mins +30secs");


// Formulate the Difference between two dates
$diff = abs($date2 - $date1);

echo $diff;


?>