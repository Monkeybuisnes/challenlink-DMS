# Challenge 02

Have the function `noIterate(strArr)` take the array of strings stored in strArr,
which will contain only two strings, the first parameter being the string N and the second parameter 
being a string K of some characters, and your goal is to determine the smallest substring of N that contains
all the characters in K. For example: if strArr is `["aaabaaddae", "aed"]` then the smallest substring 
of N that contains the characters `a, e, and d` is `"dae"` located at the end of the string.
So for this example your program should return the string `"dae"`.

Another example: if strArr is `["aabdccdbcacd", "aad"]` then the smallest substring of N that contains 
all of the characters in K is `"aabd"` which is located at the beginning of the string. 
Both parameters will be strings ranging in length from 1 to 50 characters and all of K's characters will 
exist somewhere in the string N. Both strings will only contains lowercase alphabetic characters.

## Examples

```bash
Input: array("ahffaksfajeeubsne", "jefaa")
Output: aksfaje

Input: array("aaffhkksemckelloe", "fhea")
Output: affhkkse
```

## Resolution

How it works:

Character frequency counting: Count how many times each character appears in K using array_count_values()
Sliding window technique:

Expand the right pointer to include more characters
Contract the left pointer when we have a valid window


Window validation: Track when our current window contains all required characters with correct frequencies
Optimization: When we find a valid window, try to shrink it from the left to find the minimum size
Result tracking: Keep track of the smallest valid window found

Test with the examples:

Input: ["ahffaksfajeeubsne", "jefaa"]

K = "jefaa" needs: j=1, e=1, f=1, a=2
Output: "aksfaje" (contains all required characters)


Input: ["aaffhkksemckelloe", "fhea"]

K = "fhea" needs: f=1, h=1, e=1, a=1
Output: "affhkkse" (smallest substring containing f, h, e, a)



Time Complexity: O(|N| + |K|) where |N| and |K| are the lengths of strings N and K
Space Complexity: O(|K|) for storing character frequencies
This sliding window approach efficiently finds the minimum window substring in linear time.