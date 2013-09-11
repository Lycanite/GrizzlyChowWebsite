<?php $template = $_SERVER["DOCUMENT_ROOT"]."/templates/"; ?>
<?php $scripts = $_SERVER["DOCUMENT_ROOT"]."/scripts/"; ?>
<?php include($scripts.'addToPending.php'); ?>
<?php include($template.'page_start.php'); ?>
<div class="wrapper">
	
	<article style="text-align: center">
		<h2>Thank You For Your Contribution!</h2>
		<p>Your meal will now be judged by the grizzlies!</p><br/>
		<img src="/images/grizzlyMod.png" style="padding-bottom: 24px;"/><br/>
		<a href="/index.php" style="text-decoration: none;"><h3 class="button" style="font-size: 48px; font-family: Taco Salad">Back To The Food!</h1></a>
	</article>
	
</div>
<?php include($template.'page_end.php'); ?>