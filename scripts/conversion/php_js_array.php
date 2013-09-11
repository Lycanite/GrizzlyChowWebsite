<?php

	function generateArray($arrayInput, $arrayName) {
		$arrayOutput = 'var '.$arrayName;
		$arrayOutput .= convertArrayValueArray($arrayName, $arrayInput);
		return $arrayOutput;
	}
	
	function convertArrayKeyValue($arrayStage, $arrayInputKey, $arrayInputValue) {
		if(is_int($arrayInputValue) || is_float($arrayInputValue))
			return $arrayStage.convertArrayValueInt($arrayInputValue);
		if(is_string($arrayInputValue))
			return $arrayStage.convertArrayValueString($arrayInputValue);
		if(is_array($arrayInputValue))
			return $arrayStage.convertArrayValueArray($arrayStage, $arrayInputValue);
	}
	
	function convertArrayValueInt($arrayInputValue) {
		return ' = '.$arrayInputValue.';';
	}
	
	function convertArrayValueString($arrayInputValue) {
		$arrayInputValue = preg_replace("/[\r\n]/", '\\n', $arrayInputValue);
		return ' = "'.$arrayInputValue.'";';
	}
	
	function convertArrayValueArray($arrayName, $arrayInput) {
		$arrayOutput = ' = new Array();'."\n";
		foreach($arrayInput as $arrayInputKey => $arrayInputValue) {
			$arrayStage = $arrayName.'["'.$arrayInputKey.'"]';
			$arrayOutput .= convertArrayKeyValue($arrayStage, $arrayInputKey, $arrayInputValue)."\n";
		}
		return $arrayOutput;
	}

?>