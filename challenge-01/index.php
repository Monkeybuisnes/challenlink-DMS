<?php

function findPoint($strArr)
{
    // Parse the two comma-separated strings into arrays
    $arr1 = array_map('trim', explode(',', $strArr[0]));
    $arr2 = array_map('trim', explode(',', $strArr[1]));
    
    // Convert to integers for proper comparison
    $arr1 = array_map('intval', $arr1);
    $arr2 = array_map('intval', $arr2);
    
    // Find intersection using array_intersect
    $intersection = array_intersect($arr1, $arr2);
    
    // If no intersection found, return "false"
    if (empty($intersection)) {
        return "false";
    }
    
    // Sort the result and return as comma-separated string
    sort($intersection);
    return implode(',', $intersection);
}

// keep this function call here
echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']);
