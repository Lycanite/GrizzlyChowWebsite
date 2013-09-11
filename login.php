<?php $template = $_SERVER["DOCUMENT_ROOT"]."/templates/"; ?>
<?php $scripts = $_SERVER["DOCUMENT_ROOT"]."/scripts/"; ?>
<?php include($template.'page_start.php'); ?>
<div class="wrapper">
	
	<article style="text-align: center;">
		<?php if(isset($_POST["login"])) {
			echo "<h3>This area is reserved for bears only!</h3>";
			echo "<p>Your login attempt failed, please try again!</p>";
		} ?>
		<h3>Bears must authenticate themselves in order to access the secret Food Database!</h3><br/>
		<table style="display: inline-table; margin-bottom: 32px;">
			<tr style="border-top: solid 4px #F90; border-bottom: solid 4px #F90;">
				<td style="width: 400px; padding: 16px; text-align: right; vertical-align: middle;">
					<h3>Username:</h3>
				</td>
				<td style="width: 400px; padding: 16px; text-align: left; vertical-align: middle;">
					<input type="text" id="input-username"/>
				</td>
			</tr>
			<tr style="border-top: solid 4px #F90; border-bottom: solid 4px #F90;">
				<td style="width: 400px; padding: 16px; text-align: right; vertical-align: middle;">
					<h3>Password:</h3>
				</td>
				<td style="width: 400px; padding: 16px; text-align: left; vertical-align: middle;">
					<input type="password" id="input-password"/>
				</td>
			</tr>
		</table><br/>
		
		<a href="javascript:void(0);" onclick="addFood();" style="text-decoration: none;"><h3 class="button" style="font-size: 32px; font-family: Taco Salad">Login</h1></a>
	</article>
	
	<?php include($scripts.'loginJS.php'); ?>
	
</div>
<?php include($template.'page_end.php'); ?>