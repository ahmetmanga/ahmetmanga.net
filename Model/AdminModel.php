<?php 


/**
 * summary
 */
class AdminModel
{
    /**
     * summary
     */
   		private static $db = null;
   		public function __construct(){
   			if(self::$db == null){
          try{
              self::$db = new PDO("mysql:host=localhost;dbname=cv_db","root","");
              self::$db->exec("SET NAMES utf8");
          }catch(PDOException $e){
              echo $e->getMessage();
           }
         }
   		}

   		public static function giris_kontrol($email,$password){
       $data = self::$db->prepare("SELECT * FROM admin WHERE email=:mail AND password=:pw");
       $data->execute(['mail'=>$email,'pw'=>$password]);
        if($data->rowCount() == 1) return $data->fetchAll(); else return false;
   		}
      public static function ayar_cek($ayar){
        $data = self::$db->prepare("SELECT * FROM ayarlar WHERE id=1");
        $data->execute();
        $data->bindColumn($ayar,$degisken);
        $data->fetch(PDO::FETCH_BOUND);
        return $degisken;
      }

      public function social_account(){
        $data = self::$db->prepare("SELECT * FROM social");
        $data->execute();
        return $data->fetchAll();
      }
      public function sayfa_cek($id){
        $data = self::$db->prepare("SELECT * FROM sayfalar WHERE id=:index");
        $data->execute(['index'=>$id]);
        $data->bindColumn("text",$text);
        $data->bindColumn("id",$id);
        $data->fetch(PDO::FETCH_BOUND);
        $result["text"] = $text;
        $result["id"] = $id;
        if($data->rowCount() == 0) return false; else return $result;
      }

      public function page_update($id,$text){
        $data = self::$db->prepare("UPDATE `sayfalar` SET `text` =:txt WHERE `sayfalar`.`id` =:index;");
        $islem = $data->execute(['txt'=>$text,'index'=>$id]);
        return $islem;
      }

      public function ozel_ayarlar(){
        $data = self::$db->prepare("SELECT * FROM ayarlar WHERE id=1");
        $data->execute();
        return $data->fetchAll();
      }

      public function ayar_duzenle($title,$description,$keywords,$name,$unvan){
        $data = self::$db->prepare("UPDATE `ayarlar` SET `title` = :title, `description` = :description, `keywords` = :keywords, `name` = :name, `unvan` = :unvan WHERE `ayarlar`.`id` = 1");
        $sonuc = $data->execute(['title'=>$title,'description'=>$description,'keywords'=>$keywords,'name'=>$name,'unvan'=>$unvan]);
        return $sonuc;
      }

      public function sifre_degistir($id,$sifre){
          $data = self::$db->prepare("UPDATE `admin` SET `password` = MD5(:sifre) WHERE `admin`.`id` = :id");
          $response = $data->execute(['sifre'=>$sifre, 'id'=>$id]);
          return $response;
      }

      public function sosyal_cek($id = 0){
        if(empty($id) || $id == 0){
            $data = self::$db->prepare("SELECT * FROM social");
            $data->execute();
            return $data->fetchAll();
        }else{
          $data = self::$db->prepare("SELECT * FROM social WHERE id=:id");
          $data->execute(['id'=>$id]);
          $data->bindColumn("id",$gonder["id"]);
          $data->bindColumn("isim",$gonder["isim"]);
          $data->bindColumn("link",$gonder["link"]);
          $gonder["sayi"] = $data->rowCount();
          $data->fetch(PDO::FETCH_BOUND);
          return $gonder;
        }
      }

      public function hesap_ekle($isim,$link){
          $data = self::$db->prepare("INSERT INTO `social` (`id`, `isim`, `link`) VALUES (NULL, :isim,:link)");
          $sonuc = $data->execute(['isim'=>$isim, 'link'=>$link]);
          return $sonuc;
      }

      public function hesap_duzenle($id,$isim,$link){
        $data = self::$db->prepare("UPDATE `social` SET `isim` = :isim, `link` = :link WHERE `social`.`id` = :id");
        $resp = $data->execute(['isim'=>$isim, 'link'=>$link,'id'=>$id]);
        return $resp;
      }

      public function sosyal_hesap_sil($id){
        $data = self::$db->prepare("DELETE FROM social WHERE id=:id");
        $response = $data->execute(['id'=>$id]);
        return $response;
      }

      public function timeline($id = 0){
        if($id == 0 || empty($id)){
          $data = self::$db->prepare("SELECT * FROM timeline ORDER BY tarih DESC");
          $data->execute();
          return $data->fetchAll();
        }else{
          $data = self::$db->prepare("SELECT * FROM timeline WHERE id=:id");
          $data->execute(['id'=>$id]);
          $data->bindColumn("olay",$veri["olay"]);
          $data->bindColumn("tarih",$veri["tarih"]);
          $data->bindColumn("icon",$veri["icon"]);
          $data->bindColumn("renk",$veri["renk"]);
          $data->bindColumn("id",$veri["id"]);
          $veri["sayi"] = $data->rowCount();
          $data->fetch(PDO::FETCH_BOUND);
          return $veri;
        }
      }

      public function timeline_ekle($olay,$tarih,$icon,$renk){
        $data = self::$db->prepare("INSERT INTO `timeline` (`id`, `olay`, `tarih`, `icon`, `renk`) VALUES (NULL, :olay,:tarih,:icon,:renk)");
        $sonuc = $data->execute(['olay'=>$olay,'tarih'=>$tarih,'icon'=>$icon,'renk'=>$renk]);
        return $sonuc;
      }

      public function timeline_duzenle($id,$olay,$tarih,$icon,$renk){
          $data = self::$db->prepare("UPDATE `timeline` SET `olay` = :olay, `tarih` = :tarih, `icon` = :icon, `renk` = :renk WHERE `timeline`.`id` = :id");
          $sonuc = $data->execute(['olay'=>$olay,'tarih'=>$tarih,'icon'=>$icon,'renk'=>$renk,'id'=>$id]);
            return $sonuc;
      }

      public function timeline_delete($id){
           $data = self::$db->prepare("DELETE FROM timeline WHERE id=:id");
           $data->execute(['id'=>$id]);
           return $data;
      }
}

 ?>