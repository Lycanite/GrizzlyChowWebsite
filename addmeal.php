<?php $template = $_SERVER["DOCUMENT_ROOT"]."/templates/"; ?>
<?php $scripts = $_SERVER["DOCUMENT_ROOT"]."/scripts/"; ?>
<?php include($template.'page_start.php'); ?>
<div class="wrapper">
	
	<?php include($scripts.'getAddForm.php'); ?>
	
	<article style="text-align: center;">
		
		<table style="display: inline-table; margin-bottom: 32px;">
			<?php
			foreach($addForm as $formKey => $formValue) {
				echo '<tr style="border-top: solid 4px #F90; border-bottom: solid 4px #F90;">';
					
					// Form Text:
					echo '<td style="width: 400px; padding: 16px; text-align: justify; vertical-align: middle;">';
						echo '<h3>'.$formValue["title"].'</h3>';
						echo '<p>'.$formValue["description"].'</p>';
						if($formValue["tip"] != "")
							echo '<div class="box-dark"><p><b>Tip:</b> '.$formValue["tip"].'</p></div>';
					echo '</td>';
					
					// Form Input:
					echo '<td style="width: 400px; padding: 16px; text-align: left; vertical-align: middle;">';
						
						// Textbox:
						if($formValue["type"] == "textbox")
							echo '<input type="text" id="input-'.$formKey.'">';
						
						// Textarea:
						else if($formValue["type"] == "textarea")
							echo '<textarea rows="4" cols="50" id="input-'.$formKey.'"></textarea>';
						
						// Additive:
						else if($formValue["type"] == "additive") {
							echo '<div id="input-'.$formKey.'">';
								echo '<input type="text" id="input-'.$formKey.'-0" value="" onfocus="this.value = this.value;">';
							echo '</div>';
						}
						
						// Image:
						if($formValue["type"] == "image") {
							echo '<input type="text" id="input-'.$formKey.'">';
							echo '<br/><div id="input-'.$formKey.'-image" style="width: 400px; height: 266px; display: inline-block;
								border: solid 2px #222; box-shadow: 2px 2px 4px #999;
								background-size: cover; background-position: center;
								background-image: URL(\'\');"></div>';
						}
						
						// CSV:
						else if($formValue["type"] == "csv") {
							echo '<select id="input-'.$formKey.'">';
								
								// Categories:
								if($formValue["filter"] == "_CATEGORIES_") {
									foreach($category as $optionKey => $optionValue) {
										echo '<option ';
										if($optionKey == "main")
											echo "selected ";
										echo 'value="'.$optionKey.'">'.$optionValue["name"].'</option>';
									}
								}
								
								// Diet:
								else if($formValue["filter"] == "_DIET_") {
									foreach($diet as $optionKey => $optionValue) {
										echo '<option ';
										if($optionKey == "main")
											echo "selected ";
										echo 'value="'.$optionKey.'">'.$optionValue["name"].'</option>';
									}
								}
								
								// Standard CSV:
								else {
									$formValueOptions = explode(',', $formValue["filter"]);
									foreach($formValueOptions as $optionValue)
										echo '<option value="'.$optionValue.'">'.$optionValue.'</option>';
								}
							echo '</select><br/>';
							echo '<p id="description-'.$formKey.'"></p>';
						}
					echo '</td>';
				echo '</tr>';
			}
		?></table><br/>
		
		<a href="javascript:void(0);" onclick="addFood();" style="text-decoration: none;"><h3 class="button" style="font-size: 32px; font-family: Taco Salad">Add My Meal!</h3></a>
		<div id="spacer" style="height: 192px;"></div>
		
	</article>
	
	<?php include($scripts.'addJS.php'); ?>
	
</div>
<?php include($template.'page_end.php'); ?>