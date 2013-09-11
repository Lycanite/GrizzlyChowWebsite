<?php
	
	include($scripts.'conversion/php_js_array.php');
	include($scripts.'baseJS.php');
	
	//=========================== Generate Javascript ===========================
	echo '<script src="/scripts/form_validation.js"></script>';
	echo '<script src="/scripts/conversion/js_php_array_packer.js"></script>';
	echo '<script>';
		
		// Arrays:
		echo 'var input = new Array();';
		echo 'input["outcome"] = "none";';
		echo 'input["targetID"] = "'.$meal["id"].'";';
		echo generateArray($login, 'login');
		echo generateArray($meal, 'meal');
		
		
		// Generate Form Input Bindings:
		echo '$("#input-comments").bind("input propertychange", function() { updateInput("comments"); });'."\n";
		echo 'updateInput("comments");'."\n";
		
		
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
		
		
		// Controls:
		echo 'function refresh() {
			var loginString = generateArrayString(login, "|");
			var inputString = generateArrayString(input, "|");
			var mealString = generateArrayString(meal, "|");
			postParams = {
				login: loginString,
				input: inputString,
				meal: mealString
			}
			postURL("/admin.php", postParams);
		}';
		
		echo 'function acceptFood() {
			input["outcome"] = "accept";
			refresh();
		}';
		
		echo 'function denyFood() {
			input["outcome"] = "deny";
			refresh();
		}';
		
	echo '</script>';
	
?>