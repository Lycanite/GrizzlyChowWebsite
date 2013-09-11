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
		
		// Generate JS Arrays:
		echo generateArray($addForm, 'input');
		echo generateArray($category, 'category');
		echo generateArray($diet, 'diet');
		
		
		// Generate Form Input Bindings:
		foreach($addForm as $inputKey => $inputValue) {
			if($inputValue["type"] == "additive") {
				echo '$("#input-'.$inputKey.'-0").bind("input propertychange", function() { updateAdditiveInput("'.$inputKey.'", 0); });'."\n";
				echo 'updateAdditiveInput("'.$inputKey.'");'."\n";
			}
			else if($inputValue["type"] == "csv") {
				// IMPORTANT: CSV Inputs must have an array generated above!
				echo '$("#input-'.$inputKey.'").change("input propertychange", function() { updateSelectInput("'.$inputKey.'", '.$inputKey.'); });'."\n";
				echo 'updateSelectInput("'.$inputKey.'", '.$inputKey.');'."\n";
			}
			else {
				echo '$("#input-'.$inputKey.'").bind("input propertychange", function() { updateInput("'.$inputKey.'"); });'."\n";
				echo 'updateInput("'.$inputKey.'");'."\n";
			}
		}
		
		
		// Update Inputs:
		echo 'function updateInput(inputKey) {
			var inputKeyArray = inputKey.split("-");
			inputValue = $("#input-" + inputKey).val();
			
			inputKey = inputKeyArray[0];
			inputFilter = input[inputKey]["filter"];
			
			var inputValid = true;
			var inputBoxClass = "valid";
			
			if(inputFilter == "confirm") {
				if(inputValue != $("#input-" + inputKey.substring(0, inputKey.length - 7)).val())
					inputValid = false;
				inputFilter = input[inputKey.substring(0, inputKey.length - 7)]["filter"];
			}
			if(!FilterTest(inputValue, inputFilter)) {
				inputValid = false;
			}
			if(inputValue != "" || input[inputKey]["importance"] == "required") {
				if(!inputValid)
					if(inputFilter != "email")
						inputBoxClass = "invalid";
					else
						inputBoxClass = "";
			}
			else {
				inputValid = false;
				inputBoxClass = "";
			}
			
			if(inputBoxClass == "valid")
				$("#input-" + inputKey).addClass("valid");
			else
				$("#input-" + inputKey).removeClass("valid");
			if(inputBoxClass == "invalid")
				$("#input-" + inputKey).addClass("invalid");
			else
				$("#input-" + inputKey).removeClass("invalid");
			
			if(inputValid) {
				if(inputKeyArray.length <= 1)
					input[inputKey]["value"] = inputValue;
				else {
					if(input[inputKey]["value"] == undefined || !input[inputKey]["value"] instanceof Array)
						input[inputKey]["value"] = Array();
					input[inputKey]["value"][inputKeyArray[1]] = inputValue;
				}
			}
			else {
				input[inputKey]["value"] = "";
			}
			
			updateSubmit();
			updateImage(inputKey);
		}';
		
		
		// Update Image Input:
		echo 'function updateImage(inputKey) {
			if(input[inputKey]["type"] == "image") {
				$("#input-image-" + inputKey).css("background-image", "url(\'" + $("#input-" + inputKey).val() + "\')");
			}
		}';
		
		
		// Update Select Input:
		echo 'function updateSelectInput(inputKey, inputArray) {
			var inputValue = $("#input-" + inputKey).find(":selected").val();
			input[inputKey]["value"] = inputValue;
			$("#description-" + inputKey).text(inputArray[inputValue]["description"]);
		}';
		
		
		// Update Additive Input:
		echo 'function updateAdditiveInput(inputKey, inputIndex) {
			// Count Inputs:
			var inputCount = 0;
			var testInput = "";
			while(testInput != undefined) {
				testInput = $("#input-" + inputKey + "-" + inputCount).val();
				if(testInput != undefined)
					inputCount++;
			}
			
			// Update Inputs:
			var newInput = "";
			for(var i = 0; i < inputCount; i++) {
				if($("#input-" + inputKey + "-" + i).val() != "")
					newInput += $("#input-" + inputKey + "-" + i).val().replace (/,/g, "") + ",";
			}
			input[inputKey]["value"] = newInput.substring(0, newInput.length - 1);
			updateSubmit();
			
			// Redraw Inputs:
			inputHTML = "";
			inputValues = input[inputKey]["value"].split(",");
			inputCount = 0;
			for(var i = 0; i < inputValues.length; i++) {
				inputHTML += "<input type=\'text\' id=\'input-" + inputKey + "-" + i + "\' value=\'" + inputValues[i] + "\' onfocus=\'this.value = this.value;\'>";
				inputCount++;
				if(i + 1 >= inputValues.length && inputValues[i] != "") {
					inputHTML += "<input type=\'text\' id=\'input-" + inputKey + "-" + (i + 1) + "\' value=\'\' onfocus=\'this.value = this.value;\'>";
					inputCount++;
				}
			}
			currentFocus = document.activeElement.id;
			$("#input-" + inputKey).html(inputHTML);
			$("#" + currentFocus).focus();//.val($("#" + currentFocus).val());
			
			// Rebind Inputs:
			for(var i = 0; i < inputCount; i++) {
				$("#input-" + inputKey + "-" + i).bind("input propertychange", function() { updateAdditiveInput(inputKey, i); });
			}
		}';
		
		
		// Update Submit:
		echo 'function updateSubmit() {
			canSubmit = true;
			for(inputValue in input) {
				if(input[inputValue]["value"] == "") {
					canSubmit = false;
				}
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
					input: inputString
				}
				postURL("/mealadded.php", postParams);
			}
			else {
				alert("Oops! Something isn\'t filled out right, check all the text boxes and make sure they\'re green!");
			}
		}';
		
	echo '</script>';
	
?>