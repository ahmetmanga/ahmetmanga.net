<?php 


/**
 * summary
 */
class Controller
{
    /**
     * summary
     */
    public static $base_url = "cv_mvc";
    public static $site_url = "http://localhost/cv_mvc/";
    public function __construct()
    {
       
    }
    public static function temizle($veri){
    $veri = trim($veri);
    $temiz_veri = strip_tags(htmlspecialchars($veri));
    $sansurle = array('CREATE','DELETE','SELECT','FROM','LIMIT','TABLE','MYISAM','ORDER','ASC','JOIN','BINARY','WHERE',"'", "\"");
    $editle = array('---','---','---','---','---','---','---','---','---','---','---','---','','');
     return str_replace($sansurle,$editle,$temiz_veri);

    }
}


 ?>