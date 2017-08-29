<?php
	include 'header.php';

		function ayar_bas($data,$url){ ?>
			
			<div class="col-md-9">
				<div class="panel panel-body">
					<h2 class="page-header">Site Ayarları</h2>
					<form action="<?php echo $url; ?>" method="post">
						<div class="form-group">
						<label class="col-md-3">Title</label>
						<input type="text" class="input-lg" name="title" value="<?php echo $data[0]["title"]; ?>">
					</div>
					<div class="form-group">
						<label class="col-md-3">Description</label>
						<textarea name="description" class="input-lg" cols="50" rows="5"><?php echo $data[0]["description"]; ?></textarea>
					</div>
					<div class="form-group">
						<label class="col-md-3">Keywords</label>
							<textarea name="keywords" class="input-lg" cols="50" rows="5"><?php echo $data[0]["keywords"]; ?></textarea>
					</div>
					<div class="form-group">
						<label class="col-md-3">İsim</label>
						<input type="text" name="name" class="input-lg" value="<?php echo $data[0]["name"]; ?>">
					</div>
					<div class="form-group">
						<label class="col-md-3">Ünvan</label>
						<input type="text" name="unvan" class="input-lg" value="<?php echo $data[0]["unvan"]; ?>">
					</div>
					<input type="submit" name="submit" class="col-md-offset-3 btn btn-lg btn-primary" value="Güncelle">
					</form>
				</div>
			</div>

		<?php include 'footer.php'; } ?>