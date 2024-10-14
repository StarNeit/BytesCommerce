<?php

function reverseArray(array &$arr, int $start, int $end): void {
    while ($start < $end) {
        [$arr[$start], $arr[$end]] = [$arr[$end], $arr[$start]];
        $start++;
        $end--;
    }
}

function rotateArray(array &$nums, int $k): void {
    $n = count($nums);
    $k = $k % $n;
    
    reverseArray($nums, 0, $n - 1);
    reverseArray($nums, 0, $k - 1);
    reverseArray($nums, $k, $n - 1);
}


$nums = [1, 2, 3, 4, 5, 6, 7];
$k = 5;

rotateArray($nums, $k);
echo implode(", ", $nums) . "\n";
?>
