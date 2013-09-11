<?php $template = $_SERVER["DOCUMENT_ROOT"]."/templates/"; ?>
<?php $scripts = $_SERVER["DOCUMENT_ROOT"]."/scripts/"; ?>
<?php include($scripts.'checkLogin.php'); ?>
<?php include($template.'page_start.php'); ?>
<div class="wrapper">
	
	<?php if($loginValid) include($scripts.'managePendingDatabase.php'); ?>
	<?php if($loginValid) include($scripts.'getPendingDatabase.php'); ?>
	
	<article style="text-align: center">
		<a href="javascript:void(0);" onclick="refresh();" style="text-decoration: none;"><h4 class="button" style="font-size: 32px; font-family: Taco Salad">Get Oldest Entry</h4></a>
		<br/>
		<table style="display: inline-block; margin-top: 32px;">
			<tr>
				<td style="width: 512px; padding: 0px; text-align: center; vertical-align: middle;">
					<?php echo '<div style="width: 480px; height: 320px; display: inline-block;
					border: solid 2px #222; box-shadow: 2px 2px 4px #999;
					background-size: cover; background-position: center;
					background-image: URL(\''.$meal["image"].'\');"></div>'; ?>
				</td>
				<td style="width: 288px; text-align: left;">
					<h3><?php echo $meal["name"] ?></h3>
					<h5>By <?php echo $meal["author"] ?></h5>
					<h5>Category: <?php echo $meal["category"] ?></h5>
					<h5>Diet: <?php echo $meal["diet"] ?></h5>
					<p><?php echo $meal["description"] ?></p>
					<h4>Main Ingredients:</h4>
					<ul><?php 
						$mealIngredients = explode(',', $meal["ingredients"]);
						foreach($mealIngredients as $mealIngredient)
							echo '<li>'.$mealIngredient.'</li>';
					?></ul>
				</td>
			</tr>
		</table><br/><br/>
		<a href="javascript:void(0);" onclick="acceptFood();" style="text-decoration: none;"><h4 class="button" style="font-size: 32px; font-family: Taco Salad">Accept</h4></a>
		<a href="javascript:void(0);" onclick="denyFood();" style="text-decoration: none;"><h4 class="button" style="font-size: 32px; font-family: Taco Salad">Decline</h4></a>
		<br/><br/><textarea id="input-comments"></textarea>
	</article>
	
	<?php include($scripts.'adminJS.php'); ?>
	
</div>
<?php include($template.'page_end.php'); ?>