<?php
	
	include($scripts.'conversion/php_js_array.php');
	include($scripts.'baseJS.php');
	
	//=========================== Generate Javascript ===========================
	//echo '<script src="/scripts/form_validation.js"></script>';
	echo '<script src="/scripts/conversion/js_php_array_packer.js"></script>';
	echo '<script>';
		
		// Main Vars:
		echo 'var searchType = "Random";';
		
		// Generate JS Arrays:
		//echo generateArray($input, 'input');
		
		
		// Find Food:
		echo 'function findFood() {
			//var inputString = generateArrayString(input, "|");
			postParams = {
				search_type: searchType
			}
			postURL("/index.php", postParams);
		}';
		
	echo '</script>';
	
?>