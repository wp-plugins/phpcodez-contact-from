<?php
	class PHPCodezContactFormSetting {
		var $default_settings = Array(
					'phpcodez_contact_success' => 'Message Has Been Sent Successfully',
					'phpcodez_contact_error_name' => 'Name Required',
					'phpcodez_contact_error_email' => 'Email Required',
					'phpcodez_contact_invalid_email' => 'Invalid Email',
					'phpcodez_contact_error_comment' => 'Comment Required',
					'phpcodez_contact_error_subject' => 'Subject Required',
					'phpcodez_contact_error_phone' => 'Phone Number Required',
					'phpcodez_contact_name' => '1',
					'phpcodez_contact_phone' => '1',
					'phpcodez_contact_subject' => '1',
					'phpcodez_contact_label_name' => 'Enter The Name',
					'phpcodez_contact_label_email' => 'Enter The Email',
					'phpcodez_contact_label_phone' => 'Enter The Phone Number',
					'phpcodez_contact_label_subject' => 'Enter The Subject',
					'phpcodez_contact_label_comment' => 'Enter The Comment',
					'phpcodez_contact_label_send' => 'Send',
				);
	
		var $options;
	
		function PHPCodezContactFormSetting() {
			if (!is_array(get_option('PHPCodezContactFrom'))) {
				$this->default_settings['phpcodez_contact_email']=get_settings('admin_email');
				add_option('PHPCodezContactFrom', $this->default_settings);
			}	
			$this->options = get_option('PHPCodezContactFrom');
		}
	
		function PHPCodezContactFormSettingLoad() {
			
			if (isset($_POST['cp_save'])) {
				
				$this->options["phpcodez_contact_email"] 		= $_POST['phpcodez_contact_email'];
				$this->options["phpcodez_contact_success"] 		= $_POST['phpcodez_contact_success'];
				
				$this->options["phpcodez_contact_error_name"] 	= $_POST['phpcodez_contact_error_name'];
				$this->options["phpcodez_contact_error_email"] 	= $_POST['phpcodez_contact_error_email'];
				$this->options["phpcodez_contact_invalid_email"]= $_POST['phpcodez_contact_invalid_email'];
				$this->options["phpcodez_contact_error_comment"]= $_POST['phpcodez_contact_error_comment'];
				$this->options["phpcodez_contact_error_subject"]= $_POST['phpcodez_contact_error_subject'];
				$this->options["phpcodez_contact_error_phone"]	= $_POST['phpcodez_contact_error_phone'];
				
				$this->options["phpcodez_contact_name"] 		= $_POST['phpcodez_contact_name'];
				$this->options["phpcodez_contact_phone"]		= $_POST['phpcodez_contact_phone'];
				$this->options["phpcodez_contact_subject"]		= $_POST['phpcodez_contact_subject'];
				
				$this->options["phpcodez_contact_label_name"] 	= $_POST['phpcodez_contact_label_name'];
				$this->options["phpcodez_contact_label_email"]	= $_POST['phpcodez_contact_label_email'];
				$this->options["phpcodez_contact_label_phone"]	= $_POST['phpcodez_contact_label_phone'];
				$this->options["phpcodez_contact_label_subject"]= $_POST['phpcodez_contact_label_subject'];
				$this->options["phpcodez_contact_label_comment"]= $_POST['phpcodez_contact_label_comment'];
				$this->options["phpcodez_contact_label_send"]	= $_POST['phpcodez_contact_label_send'];
				
				update_option('PHPCodezContactFrom', $this->options);
			?>	
			<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204); width:500px; "><p>Settings <strong>saved</strong>.</p></div>
			<?php } ?>
			<div id="optionsForm">
				<style>
					.phpcodez_text{ width:500px;}
				</style>
			
				<form action="" method="post" id="themeform">
					<div style="padding:1x 20px 0px 20px"><h1>PHPCodez Contact Form Settings</h1></div>
						<table>
						<tr>
							<td>To E-mail Address </td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_email"  type="text" value="<?php echo $this->options["phpcodez_contact_email"] ?>" />								<em>Email address to which the mails to be sent. ex. info@phpcodez.com</em>
							</td>	
						</tr>
						<tr>
							<td>Success Message </td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_success"  type="text" value="<?php echo $this->options["phpcodez_contact_success"] ?>" />							<em>ex. Message Has Been Sent Successfully</em>
							</td>	
						</tr>
					</table>	
					
					
					<div style="padding:1x 20px 0px 20px"><h1> Sets Form Fields And Its Labels  </h1></div>
					<table>
						<tr>
							<td width="122">Name</td>
							<td width="840">
								<input class="phpcodez_text" name="phpcodez_contact_label_name"  type="text" value="<?php echo $this->options["phpcodez_contact_label_name"] ?>" /><em>ex. Enter The Name</em>
								<input name="phpcodez_contact_name"  type="checkbox" value="1"  <?php if($this->options["phpcodez_contact_name"]) echo 'checked="checked"'; ?> />
						  </td>	
						</tr>
						<tr>
							<td>Email</td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_label_email"  type="text" value="<?php echo $this->options["phpcodez_contact_label_email"] ?>" /><em>ex.  Enter The Email</em>
							</td>	
						</tr>
						
						<tr>
							<td>Phonel</td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_label_phone"  type="text" value="<?php echo $this->options["phpcodez_contact_label_phone"] ?>" /><em>ex. Enter The Phone Number</em>
								<input name="phpcodez_contact_phone"  type="checkbox" value="1"  <?php if($this->options["phpcodez_contact_phone"]) echo 'checked="checked"'; ?> />
							</td>	
						</tr>
						<tr>
							<td>Suject</td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_label_subject"  type="text" value="<?php echo $this->options["phpcodez_contact_label_subject"] ?>" /><em>ex.  Enter The Subject</em>
								<input name="phpcodez_contact_subject"  type="checkbox" value="1"  <?php if($this->options["phpcodez_contact_subject"]) echo 'checked="checked"'; ?> />
							</td>	
						</tr>
						<tr>
							<td>Comment</td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_label_comment"  type="text" value="<?php echo $this->options["phpcodez_contact_label_comment"] ?>" /><em>ex.  Enter The Comment</em>
							</td>	
						</tr>
						<tr>
							<td>Comment</td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_label_send"  type="text" value="<?php echo $this->options["phpcodez_contact_label_send"] ?>" /><em>ex.  Send</em>
								
							</td>	
						</tr>
					</table>	
					
					<div style="padding:1x 20px 0px 20px"><h1>Field Error Messages </h1></div>
					<table>
						<tr>
							<td>When name is null</td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_error_name"  type="text" value="<?php echo $this->options["phpcodez_contact_error_name"] ?>" /><em>ex. Name Required</em>
							</td>	
						</tr>
						<tr>
							<td>When email is null </td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_error_email"  type="text" value="<?php echo $this->options["phpcodez_contact_error_email"] ?>" /><em>ex. Email Required</em>
							</td>	
						</tr>
						<tr>
							<td>When email is invalid </td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_invalid_email"  type="text" value="<?php echo $this->options["phpcodez_contact_invalid_email"] ?>" /><em>ex. Email is invalid</em>
							</td>	
						</tr>
						<tr>
							<td>When phone is null</td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_error_phone"  type="text" value="<?php echo $this->options["phpcodez_contact_error_phone"] ?>" /><em>ex.Phone Number Required</em>
							</td>	
						</tr>
						<tr>
							<td>When subject is null</td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_error_subject"  type="text" value="<?php echo $this->options["phpcodez_contact_error_subject"] ?>" /><em>ex. Subject Required</em>
							</td>	
						</tr>
						<tr>
							<td>When comment is null</td>
							<td>
								<input class="phpcodez_text" name="phpcodez_contact_error_comment"  type="text" value="<?php echo $this->options["phpcodez_contact_error_comment"] ?>" /><em>ex. Comment Required</em>
							</td>	
						</tr>
					</table>	
					
					<div style="float:left;padding-top:15px;">
						Are you done? Then<input type="submit" value="Save Changes &raquo;" name="cp_save" class="dochanges" />
					</div>
				</form>	
			</div>
		<?php
		}
	}
	$cpanel = new PHPCodezContactFormSetting();
	$cpanel->PHPCodezContactFormSettingLoad();
?>