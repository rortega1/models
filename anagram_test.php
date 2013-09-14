<?php
	
	/**
	 * Sums value of word characters
	 * 
	 * @param string $word the word that is being valued
	 * @return int $word_value the summed value of all characters from word
	 */
	
	
	function check_word_val($word)
	{
		// Declare alpha characters in an array with numeric keys.  Using explode to place them in array.
		$alpha = "a,b,c,d,e,f,g,h,,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z";
		$split_alpha = explode(',',$alpha);
		
		// Shift each array value up one key to start at 1 and remove the key of 0 from array.
		array_unshift($split_alpha, "");
		unset($split_alpha[0]);
		
		// Instantiate an initial value for the multiplier.  Must start with one because anything multiplied by 0 will return 0.
		$word_value = 1;
		
		// Loop through each character of the word passed into function.
		for($i=0;$i<strlen($word);$i++)
		{
		
			// Use array_search to get the numeric key for the matching value... also make characters are converted to lowercase or will break.
			$key_value = array_search(strtolower($word[$i]), $split_alpha);
			
			// If key value is found, multiply by the previous word_value.  If not, return and run the next word.
			if($key_value)
			{
				$word_value *= $key_value ;
			}
			else
			{
				return;
			}
		}
		
		// Once a word is complete, return the total word value
		return $word_value;
	}
	
	
	/**
	 * Tests the list of words compared to anagram
	 * 
	 * @param string $anagram the anagram that is being checked
	 * @param array $word_list list of words or dictionary of words
	 * @return array $result the array of matching words to the anagram
	 */
		
	function test_word_list($anagram, $word_list)
	{
	
		// Instantiate a result array to store matches
		$result = array();
		
		// Iterate through each word in the list or dictionary
		foreach($word_list as $word)
		{
		
			// If the value of the word in the list matches the anagram value, they are a match.  Store the match in result array.
			if(check_word_val($word) % check_word_val($anagram) == 0)
			{
				$result[] = $word;
			}
		}
		return $result;
	}
	
	 /* Below is for testing purposes.  You could make this into a class by making a constructor that receive the following values
	  * dynamically and performs the operations above.
	 */
	$anagram = "kebafrsta";
	$word_list = array("firStplace", "staBle", "trebel", "breaKfast", "strafe", "brat", "trash");
	
	print_r(test_word_list($anagram, $word_list));
	
	
	
	