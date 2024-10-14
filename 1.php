<?php

function removeDuplicate(array &$arr): int {
    $k = 2;

    for ($i = 2; $i < count($arr); $i++) {
        if ($arr[$i] !== $arr[$k - 2]) {
            $arr[$k++] = $arr[$i];
        }
    }

    return $k;
}

$arr = [1, 1, 1, 2, 2, 3];
$k = removeDuplicate($arr);

echo $k . "\n";
echo implode(" ", array_slice($arr, 0, $k)) . "\n";
?>
