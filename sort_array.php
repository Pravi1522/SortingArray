<?php
$array = [88, 24, 34, 88, 59, 5, 1, 145, 2, 12, 1];

function bubbleSortAsc(&$arr) {
    $n = sizeof($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
}

function bubbleSortDesc(&$arr) {
    $n = sizeof($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] < $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
}

function removeDuplicates($arr) {
    $seen = [];
    $uniqueArr = [];
    $duplicates = [];

    for ($i = 0; $i < sizeof($arr); $i++) {
        $found = false;
        for ($j = 0; $j < sizeof($uniqueArr); $j++) {
            if ($arr[$i] == $uniqueArr[$j]) {
                $found = true;
                break;
            }
        }
        if (!$found) {
            $uniqueArr[] = $arr[$i];
        } else {
            $isDuplicate = false;
            for ($k = 0; $k < sizeof($duplicates); $k++) {
                if ($duplicates[$k] == $arr[$i]) {
                    $isDuplicate = true;
                    break;
                }
            }
            if (!$isDuplicate) {
                $duplicates[] = $arr[$i];
            }
        }
    }

    return ['uniqueArr' => $uniqueArr, 'duplicates' => $duplicates];
}

function findUniqueValues($arr) {
    $frequency = [];
    $uniqueValues = [];

    for ($i = 0; $i < sizeof($arr); $i++) {
        $exists = false;
        for ($j = 0; $j < sizeof($frequency); $j++) {
            if ($frequency[$j][0] == $arr[$i]) {
                $frequency[$j][1]++;
                $exists = true;
                break;
            }
        }
        if (!$exists) {
            $frequency[] = [$arr[$i], 1];
        }
    }

    for ($i = 0; $i < sizeof($frequency); $i++) {
        if ($frequency[$i][1] == 1) {
            $uniqueValues[] = $frequency[$i][0];
        }
    }

    return $uniqueValues;
}

$ascendingArray = $array;
bubbleSortAsc($ascendingArray);

$descendingArray = $array;
bubbleSortDesc($descendingArray);

$duplicateResults = removeDuplicates($array);
$uniqueArray = $duplicateResults['uniqueArr'];
$duplicates = $duplicateResults['duplicates'];

$uniqueValues = findUniqueValues($array);

echo "Original Array: " . implode(", ", $array) . "\n";
echo "Ascending Order: " . implode(", ", $ascendingArray) . "\n";
echo "Descending Order: " . implode(", ", $descendingArray) . "\n";
echo "Array without Duplicates: " . implode(", ", $uniqueArray) . "\n";
echo "Removed Duplicates: " . implode(", ", $duplicates) . "\n";
echo "Unique Values: " . implode(", ", $uniqueValues) . "\n";
?>