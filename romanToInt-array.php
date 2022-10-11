class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
		$result = 0;
		
		//Array map of Roman Numeral characters and their values
		$roman = array(
			'I'		=> 1,
			'V'		=> 5,
			'X'		=> 10,
			'L'		=> 50,
			'C'		=> 100,
			'D'		=> 500,
			'M'		=> 1000
		);
		
		//Convert string into an array of single character, force uppercase for uniformity
        $numerals = str_split(strtoupper($s));
		
		//Calculate value based on characters and positioning
		foreach($numerals AS $key => $val) {
			if (isset($roman[$val])) {
				//I can be placed before V (5) and X (10) to make 4 and 9 OR X can be placed before L (50) and C (100) to make 40 and 90, C can be placed before D (500) and M (1000) to make 400 and 900.
				if (
                    isset($numerals[$key + 1])
					AND ($val == 'I' AND ($numerals[$key + 1] == 'V' OR $numerals[$key + 1] == 'X'))
					OR ($val == 'X' AND ($numerals[$key + 1] == 'L' OR $numerals[$key + 1] == 'C'))
					OR ($val == 'C' AND ($numerals[$key + 1] == 'D' OR $numerals[$key + 1] == 'M'))
				) {
					$result -= $roman[$val];
				} else {
					$result += $roman[$val];
				}
			}
		}
		
		return $result;
    }
}