<?php

/**
	* 
	Ahmet Manga
	*/
	class Session
	{
		
		public function __construct()
		{
			//session_start();
		}

		public static function set($key,$value){
			if(!empty($key) && !empty($value)){
				if(!empty($_SESSION[$key])) unset($_SESSION[$key]);
				$_SESSION[$key] = $value;
				return true;
			}
			return false;
		}

		public static function get($key){
			if(!empty($key) && !empty($_SESSION[$key])){
				return $_SESSION[$key];
			}
			return false;
		}

	    public static function update($key,$new_value){
	    	if(!empty($key) && !empty($new_value) && !empty($_SESSION[$key])){
	    		unset($_SESSION[$key]);
	    		$_SESSION[$key] = $new_value;
	    		return $_SESSION[$key];
	    	}
	    return false;
	}
	    public static function has($key){
	    	if(!empty($key) && !empty($_SESSION[$key])){
	    		return true;
	    	}
	    	return false;
	    }

	    public static function remove($key){
	    	if(!empty($key)){
	    		unset($_SESSION[$key]);
	    		return true;
	    	}
	    	return false;
	    }
	    public static function all(){
	    	return $_SESSION;
	    }
	    public static function user_login($user_id){
	    	if(!empty($user_id)){
	    		$_SESSION["user_id"] = $user_id;
	    		$_SESSION["oturum"] = true;
	    		$_SESSION["time_control"] = time();
	    		return true;
	    	}
	    	return false;
	    }

	    public static function time_control(){
	    	if(!empty($_SESSION["time_control"]) && !empty($_SESSION["user_id"])){
	    		if(time()-$_SESSION["time_control"] > 60*10){
	    			return false;
	    			self::destroy();
	    			self::set("hata","Oturumunuzun süresi doldu.");
	    			self::set("hata","danger");
	    		}else{
	    			self::update("time_control",time());
	    			return true;
	    		}
	    		return false;
	    	}
	    }
	    public static function destroy(){
	    	session_destroy();
	    	return true;
	    }
	}	
?>