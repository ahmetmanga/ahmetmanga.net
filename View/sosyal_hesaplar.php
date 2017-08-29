<?php include('header.php');
	
    	function hesap_goster($data,$url){ ?>
			
			<div class="col-md-9">
				<div class="panel panel-body">
					
					<h2 class="page-header">Sosyal Hesaplar / <a href="<?php echo $url; ?>hesap_ekle"><i class="fa fa-plus"></i> Hesap Ekle</a></h2>
						<table class="table table-bordered table-responsive">
							<thead>
								<tr> <td>İd</td> <td>İsim</td> <td>Link</td></tr>
							</thead>
							<tbody><?php
								foreach($data as $value){
									echo "<tr>
									<td>".$value["id"]."</td>
									<td><i class='fa fa-".$value["isim"]." fa-lg'></i> &nbsp;".$value["isim"]."</td>
									<td><a target='_blank' href='".$value["link"]."'>".$value["link"]."</a></td>
									<td><a href='".$url."hesap_duzenle/".$value["id"]."' class='btn btn-danger'>Düzenle</a> <a href='".$url."hesap_sil/".$value["id"]."' class='btn btn-warning'> Sil</a></td>
									</tr>";
								}	  
							?></tbody>
						</table>

				</div>
			</div>		

    	<?php    include('footer.php');  } ?>