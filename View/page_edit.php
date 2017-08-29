<?php include("header.php");
	
function sayfa_edit($id,$text,$url){ ?>
<div class="col-md-9">

		<form action="<?php echo $url; ?>" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<textarea name="page_edit" id="page_edit"><?php echo $text; ?></textarea>
		<script>
            CKEDITOR.replace( 'page_edit' );
        </script>
        	<hr>
        	<input type="submit" class="btn btn-lg btn-primary" value="Güncelle">
		</form>
	</div>

<?php include ("footer.php");  } ?>