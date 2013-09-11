<!--[if lt IE 9]><div id="main"><![endif]-->
<section id="main">
	<div style="position: absolute; display: block; bottom: 0px; left: 0px; width: 100%; height: 256px;
		background-image: url('/images/background.png'); background-repeat: repeat-x;"></div>
		
<script>
	$(function fixMainHeight() {
		var mainHeight = screen.height - $("#header").height() - 149;
		$("#main").css("min-height", mainHeight);
	})
</script>