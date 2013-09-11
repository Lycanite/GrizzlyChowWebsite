<?php
	
	include($scripts.'conversion/php_js_array.php');
	include($scripts.'baseJS.php');
	
	//=========================== Generate Javascript ===========================
	echo '<script src="/scripts/form_validation.js"></script>';
	echo '<script src="/scripts/conversion/js_php_array_packer.js"></script>';
	echo '<script>';
		
		// Main Vars:
		echo 'var searchType = "Random";'."\n";
		echo 'var canSubmit = false;'."\n";
		
		
		// Arrays:
		echo 'input = new Array();';
		
		
		// Generate Form Input Bindings:
		echo '$("#input-username").bind("input propertychange", function() { updateInput("username"); });'."\n";
		echo '$("#input-password").bind("input propertychange", function() { updateInput("password"); });'."\n";
		echo 'updateInput("username");'."\n";
		echo 'updateInput("password");'."\n";
		
		
		// Update Inputs:
		echo 'function updateInput(inputKey) {
			input[inputKey] = $("#input-" + inputKey).val();
			updateSubmit();
		}';
		
		
		// Update Submit:
		echo 'function updateSubmit() {
			canSubmit = true;
			for(inputValue in input) {
				if(input[inputValue] == "")
					canSubmit = false;
				if(!canSubmit)
					break;
			}
			if(canSubmit) {
				$("#submit-button").removeClass("disabled");
			}
			else {
				$("#submit-button").addClass("disabled");
			}
		}';
		
		
		// Find Food:
		echo 'function addFood() {
			if(canSubmit) {
				var inputString = generateArrayString(input, "|");
				postParams = {
					login: inputString
				}
				postURL("/admin.php", postParams);
			}
			else {
				alert("Please enter both a username and password.");
			}
		}';
		
	echo '</script>';
	
?>