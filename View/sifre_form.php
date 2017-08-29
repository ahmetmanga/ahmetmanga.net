<?php include ('header.php'); ?>

	<div class="col-md-9">
		<div class="panel panel-body">
			<h2 class="page-header">Şifre Değiştir</h2>
			<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
				<div class="form-group">
					<label class="col-md-3">Yeni Şifreniz : </label>
					<input type="password" class="input-lg" name="password">
				</div>
				   <input type="submit" name="submit" class="btn btn-lg btn-primary col-md-offset-3">
			</form>
		</div>
	</div>

<?php include ('footer.php'); ?>