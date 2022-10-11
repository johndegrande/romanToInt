<?php 
class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $result = 0;
		
	//Convert string into an array of single characters, force uppercase for uniformity
        $numerals = str_split(strtoupper($s));
		
	//Calculate value based on characters and positioning
	foreach($numerals AS $key => $val) {
		switch ($val) {
			case 'I': 
				//I = 1, I can be placed before V (5) and X (10) to make 4 and 9
				if (isset($numerals[$key + 1]) AND ($numerals[$key + 1] == 'V' OR $numerals[$key + 1] == 'X')) {
					$result -= 1;
				} else {
					$result += 1;
				}
				break;
			case 'V': 
				//V = 5
				$result += 5;
				break;
			case 'X': 
				//X = 10, X can be placed before L (50) and C (100) to make 40 and 90
				if (isset($numerals[$key + 1]) AND ($numerals[$key + 1] == 'L' OR $numerals[$key + 1] == 'C')) {
					$result -= 10;
				} else {
					$result += 10;
				}
				break;
			case 'L': 
				//L = 50
				$result += 50;
				break;
			case 'C':
				//C = 100, C can be placed before D (500) and M (1000) to make 400 and 900
				if (isset($numerals[$key + 1]) AND ($numerals[$key + 1] == 'D' OR $numerals[$key + 1] == 'M')) {
					$result -= 100;
				} else {
					$result += 100;
				}
				break;
			case 'D': 
				//D = 500
				$result += 500;
				break;
			case 'M': 
				//M = 1000
				$result += 1000;
				break;
		}
	}

	return $result;
    }
}
?>
