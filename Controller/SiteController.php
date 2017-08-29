<?php 

/**
 * summary
 */

require "Controller.php";
class SiteController extends Controller
{
    /**
     * summary
     */
    public $db,$session;
    public $title,$keywords,$description,$social,$unvan,$isim,$hakkimda,$projeler,$kariyer,$timeline_data;
  	public function __autoload($dosya){
  		if(file_exists($file = $_SERVER["DOCUMENT_ROOT"]."/".parent::$base_url."/View/".$dosya.".php")){
  			require $file;
  		}else if(file_exists($file = $_SERVER["DOCUMENT_ROOT"]."/".parent::$base_url."/Model/".$dosya.".php")){
  			require $file;
  		}else if(file_exists($file = $_SERVER["DOCUMENT_ROOT"]."/".parent::$base_url."/Controller/".$dosya.".php")){
  			require $file;
  		}
  	}
  	 public function __construct()
    {		
    		ob_start();
    		self::__autoload("Session");
     		self::__autoload("AdminModel");
     		$this->db = new AdminModel();
     		$this->session = new Session();
     		$this->title = $this->db->ayar_cek("title");
     		$this->keywords = $this->db->ayar_cek("keywords");
     		$this->description = $this->db->ayar_cek("description");
     		$this->isim = $this->db->ayar_cek("name");
     		$this->unvan = $this->db->ayar_cek("unvan");
     		$this->social = $this->db->social_account();
     		$this->hakkimda = $this->db->sayfa_cek(1);
     		$this->projeler = $this->db->sayfa_cek(2);
     		$this->kariyer = $this->db->sayfa_cek(3);
     		$this->timeline_data = $this->db->timeline();

    }
    public function index(){
    	self::__autoload("index");
    }
    public function admin_login(){
    	if($this->session->get("oturum")){
    		$this->session->set("hata","Admin girişi yapmış durumdasınız.");
    		$this->session->set("tur","info");
    		header("Location:".parent::$site_url);
    	}else{
    		self::__autoload("admin_login");
    	}
    }
    public function admin_post(){
    	$email = parent::temizle($_POST["email"]);
    	$sifre = parent::temizle(md5($_POST["password"]));
    	if(empty($email) || empty($sifre)){
    		   $this->session->set("hata","Kullanici Adı veya Şifre Boş");
    		   $this->session->set("tur","danger");
    		   	self::__autoload("admin_login");
    	}else{
    		if($response = AdminModel::giris_kontrol($email,$sifre)){
    			$this->session->user_login($response[0]["id"]);
    			$this->session->set("hata","Giriş Yapıldı.");
    			$this->session->set("tur","success");
    			header("Location:".parent::$site_url);
    		}else{
    			$this->session->set("hata","Kullanıcı Adı veya Şifre Hatalı.");
    			$this->session->set("tur","danger");
    			self::__autoload("admin_login");
    		}
    	}
    }

    public function logout(){
    	Session::destroy();
    	header("Location:".parent::$site_url);
    }

    public function page_edit($id){
    	$id = parent::temizle($id);
    	if(Session::get("oturum") == false){
    		Session::set("hata","Yöneticiye özel alan!");
    		Session::set("tur","danger");
    		header("Location:".parent::$site_url);
    	}else{
    		$text = $this->db->sayfa_cek($id);
    		if($text == false){
    			self::__autoload("index");
    		}else{
    			self::__autoload("page_edit");
    			
    			sayfa_edit($text["id"],$text["text"],parent::$site_url."page_edit");
    		}
    	}
    }

    public function page_post(){
    	if(Session::get("oturum") == false){
    		Session::set("hata","Yöneticiye özel alan!");
    		Session::set("tur","danger");
    		header("Location:".parent::$site_url);
    	}else{
    	    	$id = parent::temizle($_POST["id"]);
	    	$text = $_POST["page_edit"];
	    		if(empty($id) || empty($text)){
	    			header("Location:".parent::$site_url."page_edit/".$id);
	    		}else{
	    			$sonuc = $this->db->page_update($id,$text);
	    			if($sonuc){ 
	    			$_SESSION["hata"] = "İşlem tamamlandı!";
	    			$_SESSION["tur"] = "success";
	    			}else{
	    				$_SESSION["hata"] = "Hata meydana geldi";
	    				$_SESSION["tur"] = "danger";
	    			} 
	    			header("Location:".parent::$site_url."page_edit/".$id);
	    		}
    	}
    }


    public function genel_ayarlar(){
    	if(Session::get("oturum") == false){
    		Session::set("hata","Yöneticiye özel alan!");
    		Session::set("tur","danger");
    		header("Location:".parent::$site_url);
    	}else{
    		$data = $this->db->ozel_ayarlar();
    			self::__autoload("ozel_ayarlar");
    			ayar_bas($data,parent::$site_url."genel_ayarlar");
    	}
    }

    public function genel_ayarlar_post(){
    	if(Session::get("oturum") == false){
    		Session::set("hata","Yöneticiye özel alan!");
    		Session::set("tur","danger");
    		header("Location:".parent::$site_url);
    	}else{
    		$form_data = [ 
	    	 'title'=>parent::temizle($_POST["title"]),
	    	 'description' => parent::temizle($_POST["description"]),
	    	 'keywords'=>parent::temizle($_POST["keywords"]),
	    	 'name'=>parent::temizle($_POST["name"]),
	    	 'unvan'=>parent::temizle($_POST["unvan"])	
	    	];
    		
    		if(empty($form_data["title"]) || empty($form_data["description"]) || empty($form_data["keywords"]) || empty($form_data["name"]) || empty($form_data["unvan"])){
    			Session::set("hata","Boş Alan!");
    			Session::set('tur',"danger");
    			header("Location:".parent::$site_url."genel_ayarlar");
    		}else{
    			$sonuc = $this->db->ayar_duzenle($form_data["title"],$form_data["description"],$form_data["keywords"],$form_data["name"],$form_data["unvan"]);
    				if($sonuc) {
    			Session::set("hata","Ayarlar Değiştirildi!"); Session::set("tur","success");
    			header("Location:".parent::$site_url); 
    		}else{
    			Session::set("hata","Bir hata oluştu."); Session::set("tur","danger");
    			header("Location:".parent::$site_url."genel_ayarlar");
    		}
    			}
    	}
    }

    	public function sifre_form(){
    	if(Session::get("oturum") == false){
    		Session::set("hata","Yöneticiye özel alan!");
    		Session::set("tur","danger");
    		header("Location:".parent::$site_url);
    	}else{

    		self::__autoload("sifre_form");	
    	}
    
    }

    	public function sifre_post(){
    		$password = parent::temizle($_POST["password"]);
    	if(Session::get("oturum") == false){
    		Session::set("hata","Yöneticiye özel alan!");
    		Session::set("tur","danger");
    		header("Location:".parent::$site_url);
    	}elseif(empty($password)){
    		Session::set("hata","Şifre Boş!");
    		Session::set("tur","danger");
    		header("Location:".parent::$site_url."sifre_degistir");
    	}else{
    		$sonuc = $this->db->sifre_degistir(Session::get("user_id"),$password);
    			if($sonuc){
    				Session::set("hata","Şifreniz değiştirildi."); Session::set("tur","success");
    				header("Location:".parent::$site_url); }else{
    				Session::set("hata","Şifreniz değiştirilemedi."); Session::set("tur","danger");
    				header("Location:".parent::$site_url."sifre_degistir");
    			}
    	}

    	}
    	public function sosyal_hesaplar(){
    	 	 if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}else{
	    		$data = $this->db->sosyal_cek();
	    		self::__autoload("sosyal_hesaplar");
	    		hesap_goster($data,parent::$site_url);
	    	}
    	}

    	public function hesap_form(){
    		if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}else{ 
	    		self::__autoload("hesap_ekle_view");
	    	}
    	}

    	public function hesap_post(){
    		$isim = parent::temizle($_POST["isim"]);
    		$link = parent::temizle($_POST["link"]);
    		if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}else if(empty($isim) || empty($link)){
	    		Session::set("hata","Boş Alan");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url."hesap_ekle");
	    	}else{
	    		$response = $this->db->hesap_ekle($isim,$link);
	    			if($response){
	    				Session::set("hata","Hesap Eklendi");
			    		Session::set("tur","success");
			    		header("Location:".parent::$site_url."sosyal_hesaplar");
	    			}else{
	    				Session::set("hata","Eklenemedi!");
			    		Session::set("tur","danger");
			    		header("Location:".parent::$site_url."hesap_ekle");
	    			}

	    	}	
    	}

    	public function hesap_duzenle_form($id){
    		$id = parent::temizle($id);
    		$veri = $this->db->sosyal_cek($id);
    			if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}if($veri["sayi"] == 0){
	    		Session::set("hata","Sosyal medya hesabı bulunamadı!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}else{
	    		self::__autoload("hesap_duzenle_view");
	    		duzenle_goster($veri,parent::$site_url."hesap_duzenle_post");
	    	}
    	}

    	public function hesap_duzenle_post(){
    		$id = parent::temizle($_POST["id"]);
    		$isim = parent::temizle($_POST["isim"]);
    		$link = parent::temizle($_POST["link"]);
    		$veri = $this->db->sosyal_cek($id);
    		if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}else if(empty($id) || empty($isim) || empty($link) || $veri["sayi"] == 0){
	    		Session::set("hata","Boş alan mevcut!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url."hesap_duzenle/".$id);
	    	}else{

	    		$duzenle = $this->db->hesap_duzenle($id,$isim,$link);
	    			if($duzenle){
	    				Session::set("hata","Sosyal medya hesabı düzenlendi!");
			    		Session::set("tur","success");
			    		header("Location:".parent::$site_url);
	    			}else{
	    				Session::set("hata","Bir hata oluştu!");
			    		Session::set("tur","danger");
			    		header("Location:".parent::$site_url."hesap_duzenle/".$id);
	    			}
	    	}
    	}

    	public function sosyal_hesap_sil($id){
    		$id = parent::temizle($id);
    		$veri = $this->db->sosyal_cek($id);
    		if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}else if(empty($id) || $veri["sayi"] == 0){
	    		Session::set("hata","Silinemedi!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url."sosyal_hesaplar");
	    	}else{

	    		$hesap_sil = $this->db->sosyal_hesap_sil($id);
	    			if($hesap_sil){
	    				Session::set("hata","Belirtilen sosyal medya hesabı silindi.");
	    				Session::set("tur","success");
	    			}else{
	    				Session::set("hata","Sistemde bir hata meydana geldi.");
	    				Session::set("tur","danger");
	    			}
	    			header("Location:".parent::$site_url."sosyal_hesaplar");
    		}
		}

		public function timeline(){
			if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}else{
	    		self::__autoload("timeline");
	    		$data = $this->db->timeline();
	    		timeline_goster($data,parent::$site_url);
	    	}
		}

		public function timeline_ekle(){
			if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}else{
	    		self::__autoload("timeline_ekle");
	    	}
		}

		public function timeline_post(){
			$olay = parent::temizle($_POST["olay"]);
			$tarih = parent::temizle($_POST["tarih"]);
			$icon = parent::temizle($_POST["icon"]);
			$renk = parent::temizle($_POST["renk"]);
			if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}elseif(empty($olay) || empty($tarih) || empty($icon) || empty($renk)){
	    		Session::set("hata","Boş alan! Tüm alanları doldurun");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url."timeline_ekle");
	    	}else{
	    		$ekle = $this->db->timeline_ekle($olay,$tarih,$icon,$renk);
	    			if($ekle){
	    				Session::set("hata","Timeline eklendi!");
			    		Session::set("tur","success");
			    		header("Location:".parent::$site_url."timeline");
	    			}else{
	    				Session::set("hata","Bir hata oluştu!");
			    		Session::set("tur","danger");
			    		header("Location:".parent::$site_url."timeline_ekle");
	    			}
	    	}
		}

		public function timeline_duzenle($id){
			$id = parent::temizle($id);
			$veri = $this->db->timeline($id);
			if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}else if(empty($id) || $veri["sayi"] == 0){
	    		Session::set("hata","Seçim yapılmadı!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url."timeline");
	    	}else{
	    		self::__autoload("timeline_duzenle_view");
	    		timeline_dzn_form($veri,parent::$site_url."timeline_duzenle_post");
	    	}
		}

		public function timeline_duzenle_post(){
			$id = parent::temizle($_POST["id"]);
			$olay = parent::temizle($_POST["olay"]);
			$tarih = parent::temizle($_POST["tarih"]);
			$icon = parent::temizle($_POST["icon"]);
			$renk = parent::temizle($_POST["renk"]);
			$sor = $this->db->timeline($id);
				if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    		}elseif(empty($olay) || empty($tarih) || empty($icon) || empty($renk) || empty($id) || $sor["sayi"] == 0){
	    		Session::set("hata","Tüm alanları doldurmadınız!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url."timeline_duzenle/".$id);
	    		}else{
	    			$duzenle = $this->db->timeline_duzenle($id,$olay,$tarih,$icon,$renk);
	    				if($duzenle){
	    					Session::set("hata","Timeline düzenlendi!");
				    		Session::set("tur","success");
				    		header("Location:".parent::$site_url."timeline");
	    				}else{
	    					Session::set("hata","Sistemde bir hata meydana geldi!");
				    		Session::set("tur","danger");
				    		header("Location:".parent::$site_url."timeline_duzenle/".$id);
	    				}
	    		}
		}

		public function timeline_sil($id){
			$id = parent::temizle($id);
			$sor = $this->db->timeline($id);
			if(Session::get("oturum") == false){
	    		Session::set("hata","Yöneticiye özel alan!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url);
	    	}else if(empty($id) || $sor["sayi"] == 0){
	    		Session::set("hata","Seçim yapmadınız!");
	    		Session::set("tur","danger");
	    		header("Location:".parent::$site_url."timeline");
	    	}else{
	    		$sil = $this->db->timeline_delete($id);
	    			if($sil){
	    				Session::set("hata","Timeline silindi!");
			    		Session::set("tur","success");
			    		header("Location:".parent::$site_url."timeline");
	    			}else{
	    				Session::set("hata","Timeline silinemedi!");
			    		Session::set("tur","danger");
	    				header("Location:".parent::$site_url."timeline");
	    			}
	    	}
		}
}
 ?>

