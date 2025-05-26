<?php

function noIterate($strArr)
{
    $n = $strArr[0]; // Main string
    $k = $strArr[1]; // Characters to find
    
    // Count frequency of characters in K
    $kFreq = array_count_values(str_split($k));
    $required = count($kFreq); // Number of unique characters in K
    
    $left = 0;
    $formed = 0; // Number of unique chars in current window with desired frequency
    $windowCounts = [];
    
    // Result: [window length, left, right]
    $ans = [PHP_INT_MAX, 0, 0];
    
    // Sliding window approach
    for ($right = 0; $right < strlen($n); $right++) {
        $char = $n[$right];
        
        // Add character to window
        $windowCounts[$char] = ($windowCounts[$char] ?? 0) + 1;
        
        // Check if this character's frequency matches the desired frequency
        if (isset($kFreq[$char]) && $windowCounts[$char] == $kFreq[$char]) {
            $formed++;
        }
        
        // Try to contract the window from left
        while ($left <= $right && $formed == $required) {
            $char = $n[$left];
            
            // Save the smallest window
            if ($right - $left + 1 < $ans[0]) {
                $ans[0] = $right - $left + 1;
                $ans[1] = $left;
                $ans[2] = $right;
            }
            
            // Remove character from left of window
            $windowCounts[$char]--;
            if (isset($kFreq[$char]) && $windowCounts[$char] < $kFreq[$char]) {
                $formed--;
            }
            
            $left++;
        }
    }
    
    // Return the minimum window substring
    return $ans[0] == PHP_INT_MAX ? "" : substr($n, $ans[1], $ans[0]);
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]);