<style>
	.phpcodez-text{ width:300px; border:1px solid #cccccc}
	.phpcodez-textarea{ width:300px; border:1px solid #cccccc; height:100px;}
	.phpcodez-overall { width:98%}
	.phpcodez-left{ width:200px; clear:none; float:left}
	.phpcodez-right{ width:400px; clear:none; float:left}
</style>
<?php
	extract($_POST);
	
	$this->options = get_option('PHPCodezContactFrom');
	
	if(isset($_POST['send'])){
		
		if(preg_replace("/^\s*$/","",$contact_name)=="" and $this->options['phpcodez_contact_name'])
			$errorList[]=$this->options['phpcodez_contact_error_name'];
		
		if(preg_replace("/^\s*$/","",$contact_email)=="" )
			$errorList[]=$this->options['phpcodez_contact_error_email'];
		elseif(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $contact_email))
			$errorList[]=$this->options['phpcodez_contact_invalid_email'];
		
		if(preg_replace("/^\s*$/","",$contact_phone)=="" and $this->options['phpcodez_contact_phone'])
			$errorList[]=$this->options['phpcodez_contact_error_phone'];
		
		if(preg_replace("/^\s*$/","",$contact_subject)=="" and $this->options['phpcodez_contact_subject'])
			$errorList[]=$this->options['phpcodez_contact_error_subject'];
		
		if(preg_replace("/^\s*$/","",$contact_comment)=="" )
			$errorList[]=$this->options['phpcodez_contact_error_comment'];
			
		if(count($errorList)==0){

			$toAddres 	= $this->options['phpcodez_contact_email'];
			$subject 	= "Contact from - ".get_bloginfo('url');
			$headers    = "MIME-Version: 1.0\n";
			$headers   .= "Content-type: text/html; charset=iso-8859-1\n";
			$headers   .= "From: ".$contact_email."\n";
			$headers   .= "Return-Path: ".$toAddres."\n";
			$headers   .= "Return-Receipt-To: ".$toAddres."\n";
			$mailMessage  = '<table width="687" >';
			$mailMessage .= '<tr><td width="161">Hi Admin</td><td width="7"></td><td width="561"></td></tr>';
			$mailMessage .= '<tr><td width="161"></td><td width="7"></td><td width="561"></td></tr>';
			
			if($this->options['phpcodez_contact_name'])
				$mailMessage .= '<tr><td width="161">Name</td><td width="7"></td><td width="561">'.$contact_name.'</td></tr>';
			
			if($this->options['phpcodez_contact_phone'])
				$mailMessage .= '<tr><td width="161">Phone NUmber</td><td width="7"></td><td width="561">'.$contact_phone.'</td></tr>';
			
			if($this->options['phpcodez_contact_subject'])
				$mailMessage .= '<tr><td width="161">Subject</td><td width="7"></td><td width="561">'.$contact_subject.'</td></tr>';
	
			$mailMessage .= '<tr><td width="161">Comment</td><td width="7"></td><td width="561">'.nl2br($contact_comment).'</td></tr>';
			
			echo $mailMessage .= '<table>';

			@mail($toAddres,$subject, $mailMessage, $headers);
			$success=5; 
		} 	
	}	

?>
<form method="post" action="">
	<div class="phpcodez-overall">
		
		<?php if(count($errorList)){ ?>
			<div style="color:#FF0000; margin-top:5; margin-bottom:5px;"><?php foreach($errorList as $value) echo $value." , "; ?></div>
		<?php } ?>	
		
		<?php if($success){ ?>
			<div style="color: #006633; margin-top:5; margin-bottom:10px; font-weight:bold"><?php echo $this->options['phpcodez_contact_success']; ?></div>
		<?php } ?>	
		
		<?php if($this->options['phpcodez_contact_name']) { ?>
			<div class="phpcodez-left"><?php echo $this->options['phpcodez_contact_label_name']; ?></div>
			<div class="phpcodez-right"><input type="text" name="contact_name" value="<?php echo $contact_name  ?>" class="phpcodez-text" /></div>
		<?php } ?>	
		
		<div class="phpcodez-left"><?php echo $this->options['phpcodez_contact_label_email']; ?></div>
		<div class="phpcodez-right"><input type="text" name="contact_email" value="<?php echo $contact_email  ?>" class="phpcodez-text" /></div>
		
		<?php if($this->options['phpcodez_contact_phone']) { ?>
			<div class="phpcodez-left"><?php echo $this->options['phpcodez_contact_label_phone']; ?></div>
			<div class="phpcodez-right"><input type="text" name="contact_phone" value="<?php echo $contact_phone  ?>" class="phpcodez-text" /></div>
		<?php } ?>
		
		<?php if($this->options['phpcodez_contact_subject']) { ?>
			<div class="phpcodez-left"><?php echo $this->options['phpcodez_contact_label_subject']; ?></div>
			<div class="phpcodez-right"><input type="text" name="contact_subject" value="<?php echo $contact_subject  ?>" class="phpcodez-text" /></div>
		<?php } ?>	
		
		<div class="phpcodez-left"><?php echo $this->options['phpcodez_contact_label_comment']; ?></div>
		<div class="phpcodez-right"><textarea type="text" name="contact_comment" class="phpcodez-textarea" ><?php echo nl2br($contact_comment)  ?></textarea></div>
		
		<div class="phpcodez-left">&nbsp;</div>
		<div class="phpcodez-right" align="center"><input type="submit" name="send" value=" <?php echo $this->options['phpcodez_contact_label_send']; ?> " /></div>
		
	</div>
	
</form>

