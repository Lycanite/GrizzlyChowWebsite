<?php $template = $_SERVER["DOCUMENT_ROOT"]."/templates/"; ?>
<?php $scripts = $_SERVER["DOCUMENT_ROOT"]."/scripts/"; ?>
<?php include($template.'page_start.php'); ?>
<div class="wrapper">
	
	<?php include($scripts.'getDatabase.php'); ?>
	
	<?php if(!isset($searchType)) { ?>
		<div id="spacer" style="height: 100px;"></div>
		<article style="text-align: center">
			<img src="/images/logo.png" style="padding-bottom: 24px;"/><br/>
			<a href="javascript:void(0);" onclick="findFood();" style="text-decoration: none;"><h3 class="button" style="font-size: 48px; font-family: Taco Salad">Find Me Food!</h3></a>
		</article>
		
	<?php } else {?>
		<article style="text-align: center">
			<a href="javascript:void(0);" onclick="findFood();" style="text-decoration: none;"><h3 class="button" style="font-size: 32px; font-family: Taco Salad">Find Me Something Else!</h3></a>
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
						<h3><?php echo $meal["name"]; ?></h3>
						<h5>By <?php echo $meal["author"]; ?></h5>
						<p><?php echo $meal["description"]; ?></p>
						<h4>Main Ingredients:</h4>
						<ul><?php 
							$mealIngredients = explode(',', $meal["ingredients"]);
							foreach($mealIngredients as $mealIngredient)
								echo '<li>'.$mealIngredient.'</li>';
						?></ul>
					</td>
				</tr>
			</table>
			<script type="text/javascript"><!--
				google_ad_client = "ca-pub-3630477408426704";
				/* Grizzly Chow */
				google_ad_slot = "7312337075";
				google_ad_width = 336;
				google_ad_height = 280;
				//-->
			</script>
			<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</article>
		<div id="spacer" style="height: 192px;"></div>
	<?php } ?>
	
	<?php include($scripts.'mainJS.php'); ?>
	
</div>
<?php include($template.'page_end.php'); ?>