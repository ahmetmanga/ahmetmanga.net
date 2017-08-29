<?php	
	setlocale(LC_ALL,"turkish");
    date_default_timezone_set("Europe/Istanbul"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<!-- Ahmet Manga tarafından hazırlanmıştır. İzinsiz kullanılamaz. -->

	<!-- http://AhmetManga.Net -->
	<!-- http://AhmetManga.Net -->
	<!-- http://AhmetManga.Net -->
	<!-- http://AhmetManga.Net -->
	<link rel="stylesheet" type="text/css" href="<?php echo parent::$site_url;?>css/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo parent::$site_url;?>css/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="<?php echo parent::$site_url;?>css/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo parent::$site_url;?>css/css/timeline.css">
	<link rel="stylesheet" href="<?php echo parent::$site_url;?>css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo parent::$site_url;?>css/css/bootstrap-social.scss" />
	<?php if(Session::get("oturum")){?>
	<script type="text/javascript" src="<?php echo parent::$site_url;?>js/ckeditor/ckeditor.js"></script>
	<?php } ?>
	<script type="text/javascript" src="<?php echo parent::$site_url;?>css/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo parent::$site_url;?>js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="<?php echo parent::$site_url;?>js/page.js"></script>
	<script type="text/javascript" src="<?php echo parent::$site_url;?>css/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="author" content="Ahmet Manga">
	<meta name="keywords" content="<?php echo $this->keywords; ?>">
	<meta name="description" content="<?php echo $this->description; ?>">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo $this->title; ?></title>
</head>
<body>
	<div class="container-fluid background">
	<div class="row margin">
		<?php
		if(Session::get('oturum') == true){ ?>
				<nav class="navbar navbar-inverse">
					<div class="container-fluid">
						<div class="navbar-header">
							<button class="navbar-toggle" data-toggle="collapse" data-target="#admin_page"><div class="icon-bar"></div><div class="icon-bar"></div><div class="icon-bar"></div></button>
						</div>
						<div class="collapse navbar-collapse" id="admin_page">
							<ul class="nav navbar-nav">
							<li><a href="<?php echo parent::$site_url;?>page_edit/1"><i class="fa fa-home"></i> Hakkımda</a></li>
							<li><a href="<?php echo parent::$site_url;?>page_edit/2"><i class="fa fa-graduation-cap"></i> Projeler</a></a></li>
							<li><a href="<?php echo parent::$site_url;?>page_edit/3"><i class="fa fa-newspaper-o"></i> Kariyer</a></a></li>
							<li><a href="<?php echo parent::$site_url;?>genel_ayarlar"><i class="fa fa-cog"></i> Genel Ayarlar</a></a></li>
							<li><a href="<?php echo parent::$site_url;?>sosyal_hesaplar"><i class="fa fa-facebook-f"></i> Sosyal Hesaplar</a></a></li>
							<li><a href="<?php echo parent::$site_url;?>timeline"><i class="fa fa-calendar"></i> Timeline</a></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo parent::$site_url;?>sifre_degistir"><i class="fa fa-user"></i> Şifre Değiştir</a></li>
							<li><a href="<?php echo parent::$site_url;?>cikis"><i class="fa fa-lock"></i> Çıkış Yap</a></li>
						</ul>
						</div>
					</div>		
				</nav>	
			
		<?php }
		?>
		<div class="col-md-3">
		<div class="row">
			<div class="col-md-12  color">
			<img class="img-rounded image" src="http://webpentagon.com/demo/themeforest/wordpress/vcard/wp-content/themes/vcard/includes/images/profile-avatar.png" alt="photo" />
			<h1 class="heading-white"><?php echo $this->isim; ?></h1>
			<h4 class="heading-other"><?php echo $this->unvan; ?></h4>
			<ul class="list-unstyled list-inline">
				<?php 
					foreach($this->social as $value){ ?>
				<li>
				<a target="_blank" href="<?php echo $value["link"]; ?>" class="link_icon <?php echo $value["isim"]; ?>"><i class="fa fa-<?php echo $value["isim"];?> fa-lg"></i></a>
				</li>
					<?php }
				?>
				
			</ul>
		</div>
		<div class="col-md-12 color-bright menu">
		<a class="link menu_link btn" href="<?php if(Session::get("oturum")){ echo parent::$site_url; }else{ echo "#1"; } ?>"><i class="fa fa-home"></i> Hakkımda</a>
		</div>
		<div class="col-md-12 color-bright menu">
		<a class="link menu_link btn" href="#2"><i class="fa fa-graduation-cap"></i> Projeler</a>
		</div>
		<div class="col-md-12 color-bright menu">
		<a class="link menu_link btn" href="#3"><i class="fa fa-newspaper-o"></i> Kariyer</a>
		</div>
		<div class="col-md-12 color-bright menu">
		<a class="link menu_link btn" href="#4"><i class="fa fa-address-book"></i> İletişim</a>
		</div>
		</div>
		
	</div>
	<?php if(!empty($_SESSION["hata"])){
 					?>
 				<div class="col-md-9">
 					<div class="alert alert-<?php echo Session::get("tur"); ?>">
 					<?php echo Session::get("hata"); ?>
 					<a href="#" class="close" data-dismiss="alert">&times;</a>
 				</div>
 				</div>
 				<?php Session::remove("hata"); Session::remove("tur"); }?>