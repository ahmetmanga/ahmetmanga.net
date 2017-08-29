<?php include ('header.php');
	
	function duzenle_goster($data,$url){ ?>	
	<div class="col-md-9">
		
		<div class="panel panel-body">
			<h2 class="page-header">Sosyal Medya Hesabı Düzenle</h2>
				<form action="<?php echo $url; ?>" method="post">
				<input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
					<div class="form-group">
					<label class="col-md-3">İsim</label>
						<select name="isim" class="input-lg" required>
							<option value="<?php echo $data["isim"]; ?>"><?php echo $data["isim"]; ?></option>
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
						<input type="text" size="60" name="link" class="btn-lg" value="<?php echo $data["link"];?>" required>
				</div>
					<input type="submit" value="Hesap Ekle" class="col-md-offset-3 btn btn-primary btn-lg">
				</form>
		</div>

	</div>

	<?php include ('footer.php'); } ?>