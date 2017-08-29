<?php include 'header.php'; ?>
		<div class="col-md-9 sayfa" id="1">
			<div class="panel panel-body shadow">
				<h2 class="page-header">Hakkımda</h2>

				    <?php echo $this->hakkimda["text"]; ?>

				 <hr />
				 <!-- progress bar -->
				 <div class="col-md-3 col-sm-6">
            <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">PHP</div>
            </div>
        </div>
          <div class="col-md-3 col-sm-6">
            <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">JS</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">HTML/CSS</div>
            </div>
        </div>
         <div class="col-md-3 col-sm-6">
            <div class="progress pink">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">C#</div>
            </div>
        </div>
					
                <!-- progress bar -->
            </div>
        </div>
		<div class="col-md-9 sayfa" id="2">
			<div class="panel panel-body shadow">
			<h2 class="page-header">Projeler</h2>
				<?php echo $this->projeler["text"]; ?>
			</div>
		</div>
		<div class="col-md-9 sayfa" id="3">
			<div class="panel panel-body shadow">
			<h2 class="page-header">Kariyer</h2>
				<?php echo $this->kariyer["text"]; ?>
			</div>
		</div>
		<div class="col-md-9 sayfa" id="4">
			<div class="panel panel-body shadow">
			<h2 class="page-header">İletişim</h2>
                <div class="alert alert-info">
                    Sosyal medya hesaplarım ve kişisel bilgilerim aşağıdadır. İstediğiniz şekilde iletişim kurabilirsiniz.
                </div>
				<ul class="list-unstyled" style="margin-left: 2%;">
                    <?php 
                    foreach($this->social as $value){ ?>
                <li>
                <a target="_blank" href="<?php echo $value["link"]; ?>" class="link_icon <?php echo $value["isim"]; ?>"><i class="fa fa-<?php echo $value["isim"];?> fa-lg"></i> &nbsp;<?php echo $value["link"]; ?></a>
                </li>
                <hr>
                    <?php }
                ?>            
                </ul>
			</div>
		</div>		

	<?php include 'footer.php'; ?>
