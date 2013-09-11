
function generateArrayString(inputArray, delimiter) {
	var outputArrayString = "";
	var delimiterStage = 0;
	outputArrayString += convertArrayKeyValue(inputArray, delimiter, delimiterStage);
	return outputArrayString;
}

function convertArrayKeyValue(inputArray, delimiter, delimiterStage) {
	var outputArrayString = "";
	if(arraySize(inputArray) > 0) {
		for(inputArrayKey in inputArray) {
			var inputArrayValue = inputArray[inputArrayKey];
			if(inputArrayValue != null && inputArrayValue != undefined) {
				if(inputArrayValue instanceof Array) {
					outputArrayString += addDelimiter(delimiter, delimiterStage);
					outputArrayString += inputArrayKey + delimiter + convertArrayKeyValue(inputArray[inputArrayKey], delimiter, delimiterStage + 1);
				}
				else {
					outputArrayString += addDelimiter(delimiter, delimiterStage);
					inputValue = String(inputArray[inputArrayKey]).replace(RegExp("\\b[" + delimiter + "]", "g"), " ");
					outputArrayString += inputArrayKey + delimiter + inputValue;
				}
			}
		}
	}
	else {
		//println("Tried to convert an empty array to string.");
	}
	return outputArrayString;
}

function addDelimiter(delimiter, delimiterStage) {
	return delimiter + "SPLIT" + delimiterStage + delimiter;
}