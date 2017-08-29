 <?php include('header.php');
	
    	function timeline_goster($data,$url){ ?>
			
			<div class="col-md-9">
				<div class="panel panel-body">
					
					<h2 class="page-header">Timeline / <a href="<?php echo $url; ?>timeline_ekle"><i class="fa fa-plus"></i> Yeni Ekle</a></h2>
						<table class="table table-bordered table-responsive">
							<thead>
								<tr> <td>Tarih</td> <td>Olay</td></tr>
							</thead>
							<tbody><?php
								foreach($data as $value){
									echo "<tr>
									<td>".$value["tarih"]."</td>
									<td><i class='fa fa-".$value["icon"]." fa-lg'></i> &nbsp;".$value["olay"]."</td>
									<td><a href='".$url."timeline_duzenle/".$value["id"]."' class='btn btn-danger'>Düzenle</a> <a href='".$url."timeline_sil/".$value["id"]."' class='btn btn-warning'> Sil</a></td>
									</tr>";
								}	  
							?></tbody>
						</table>

				</div>
			</div>		

    	<?php   include('footer.php'); }  ?>