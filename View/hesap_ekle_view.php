<?php include ('header.php'); ?>
	
	<div class="col-md-9">
		
		<div class="panel panel-body">
			<h2 class="page-header">Hesap Ekle</h2>
				<form action="<?php echo parent::$site_url; ?>hesap_post" method="post">
					<div class="form-group">
					<label class="col-md-3">İsim</label>
						<select name="isim" class="input-lg" required>
							<option value="facebook">Facebook</option>
							<option value="twitter">Twitter</option>
							<option value="linkedin">Linkedin</option>
							<option value="github">Github</option>
							<option value="envelope">Mail</option>
							<option value="stack-overflow">Stack OverFlow</option>
							<option value="phone">Telefon</option>
							<option value="whatsapp">WhatsApp</option>
							<option value="youtube">Youtube</option>
							<option value="google-plus">Google +</option>
							
						</select>
				</div>
				<div class="form-group">
					<label class="col-md-3">link</label>
						<input type="text" name="link" class="btn-lg" required>
				</div>
					<input type="submit" value="Hesap Ekle" class="col-md-offset-3 btn btn-primary btn-lg">
				</form>
		</div>

	</div>

<?php include ('footer.php'); ?>