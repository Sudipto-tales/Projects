<?php 
$n  = (int)readline("Enter The Length:");
for($i=0;$i<$n;$i++){
    for($j=0;$j<$i;$j++){
        print(($i + $j) % 2);
    }
}
?>