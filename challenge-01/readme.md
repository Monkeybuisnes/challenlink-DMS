# Challenge 01

Have the function `findPoint( $strArr )` read the array of strings stored in  `strArr` which will contain 2
 elements: the first element will represent a list of comma-separated numbers sorted in ascending order,
the second element will represent a second list of comma-separated numbers (also sorted).
Your goal is to return a comma-separated string containing the numbers that occur in elements 
of  `strArr`  in sorted order. If there is no intersection, return the string  `false`.


## Examples

```bash
Input: array("1, 3, 4, 7, 13", "1, 2, 4, 13, 15") 
Output: 1,4,13

Input: array("1, 3, 9, 10, 17, 18", "1, 4, 9, 10")
Output: 1,9,10
```
## Resolution
How it works:

Parse strings: Use explode(',', $string) to split each string into arrays, then trim() to remove any extra spaces
Convert to integers: Use array_map('intval', $array) to ensure proper numeric comparison
Find intersection: array_intersect() efficiently finds common elements between the two arrays
Handle empty case: Return "false" as a string if no common elements exist
Format output: Sort the intersection and join with commas using implode()

Test with the examples:

Input: ['1, 3, 4, 7, 13', '1, 2, 4, 13, 15'] → Output: 1,4,13
Input: ['1, 3, 9, 10, 17, 18', '1, 4, 9, 10'] → Output: 1,9,10

Time Complexity: O(n + m) where n and m are the lengths of the two arrays
Space Complexity: O(min(n, m)) for storing the intersection
The solution is efficient and handles edge cases properly, including when there's no intersection between the arrays.