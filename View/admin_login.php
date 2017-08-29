<?php include 'header.php'; ?>
 
  <div class="col-md-9">
  	<div class="panel panel-body">
  	   <h2 class="page-header">Admin Girişi</h2>
  		<form action="<?php echo parent::$site_url;?>admin_login" method="post">
  			<div class="form-group">
  				<label class="col-md-3">E-Mail Adresi</label>
  				<div class="input-group">
  					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  					<input type="email" name="email" placeholder="E-Mail Adresi" class="form-control input-lg" required=""
          >
  				</div>
  				<hr>
  			</div>
  <div class="form-group">
  	<label class="col-md-3">Şifreniz</label>
  	<div class="input-group">
  		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  		<input type="password" name="password" placeholder="Şifreniz" class="form-control input-lg" required=""
          >
  	</div>
  	<hr>
  </div>
    
  <div class="col-md-9 col-md-offset-3"><input type="submit" name="giris" id="giris" value="Giriş Yap" class="btn btn-primary btn-lg" style="width: 100%;"></div>

  		</form>
  	</div>
  </div>

<?php include 'footer.php'; ?>