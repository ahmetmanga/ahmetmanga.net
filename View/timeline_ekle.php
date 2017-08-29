<?php include ('header.php'); ?>
	
	<div class="col-md-9">
		
		<div class="panel panel-body">
			<h2 class="page-header">Timeline Ekle</h2>
				<form action="<?php echo parent::$site_url; ?>timeline_post" method="post">
					<div class="form-group">
					<label class="col-md-3">Olay</label>
						<input type="text" name="olay" class="btn-lg" size="60" required>
					</div>
					<div class="form-group">
					<label class="col-md-3">Tarih</label>
						<input type="date" name="tarih" class="btn-lg" required>
					</div>
					<div class="form-group">
					<label class="col-md-3">Icon</label>
						<input type="text" name="icon" class="btn-lg" required>
					</div>
					<div class="form-group">
					<label class="col-md-3">Renk</label>
						<select name="renk" class="input-lg" required>
							<option value="primary">Primary</option>
							<option value="info">İnfo</option>
							<option value="danger">Danger</option>
							<option value="warning">Warning</option>
							
						</select>
				</div>
				
					<input type="submit" value="Timeline Ekle" class="col-md-offset-3 btn btn-primary btn-lg">
				</form>
		</div>

	</div>

<?php include ('footer.php'); ?>