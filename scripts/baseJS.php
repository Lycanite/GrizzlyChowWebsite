<script>
	// Logging:
	function println(logMessage) {
	    if(navigator.appName == "Netscape") {
	    	console.log(logMessage);
	    }
	    else {
	    	console.log = function() {};
	    }
	}	
	
	// Preload Images:
	function preloadImage(imageURL) {
	    var img = new Image();
	    img.src = imageURL;
	}		
	// Get Object Array Size:
	function arraySize(obj) {
		var size = 0, key;
		for(key in obj) {
			if (obj.hasOwnProperty(key)) size++;
		}
		return size;
	};		
	// Post:
	function postURL(path, postParams, method) {
		method = method || "post";
		var form = document.createElement("form");
		form.setAttribute("method", method);
		form.setAttribute("action", path);
		
		for(var postKey in postParams) {
			if(postParams.hasOwnProperty(postKey)) {
				var hiddenField = document.createElement("input");
				hiddenField.setAttribute("type", "hidden");
				hiddenField.setAttribute("name", postKey);
				hiddenField.setAttribute("value", postParams[postKey]);
				form.appendChild(hiddenField);
			}
		}
		
		document.body.appendChild(form);
		form.submit();
	}
</script>
