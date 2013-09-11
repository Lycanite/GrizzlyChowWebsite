<?php

	function unpackJSArray($stringInput, $delimiter) {
		$delimiterStage = 0;
		$arrayOutput = readStringToArray($stringInput, $delimiter, $delimiterStage);
		return $arrayOutput;
	}
	
	function readStringToArray($stringInput, $delimiter, $delimiterStage) {
		$outputArray = array();
		$testArray = explode(getDelimiter($delimiter, $delimiterStage), $stringInput);
		foreach($testArray as $testArrayKey => $testArrayValue) {
			$entrySplit = explode($delimiter, $testArrayValue);
			$entryName = $entrySplit[0];
			$entryData = substr($testArrayValue, strlen($entryName) + 1);
			if($entryName != "" && $entryData !="") {
				if(strpos($entryData, getDelimiter($delimiter, $delimiterStage + 1)) === false) {
					$outputArray[$entryName] = $entryData;
				}
				else {
					$outputArray[$entryName] = readStringToArray($entryData, $delimiter, $delimiterStage + 1);
				}
			}
		}
		return $outputArray;
	}
	
	function getDelimiter($delimiter, $delimiterStage) {
		return $delimiter . "SPLIT" . $delimiterStage . $delimiter;
	}

?>