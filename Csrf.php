<?php 

class  Csrf
{

	private function RandomToken($length = 8){
		if (function_exists('random_bytes')) {
			return bin2hex(random_bytes($length));
		}
		if (function_exists('mcrypt_create_iv')) {
			return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));
		} 
		if (function_exists('openssl_random_pseudo_bytes')) {
			return bin2hex(openssl_random_pseudo_bytes($length));
		}
	}


	public static function generate($length=8){
		if(isset($_SESSION['Csrf'])&& !empty($_SESSION['Csrf'])){
			return $_SESSION['Csrf'];
		}
		return Csrf::RandomToken($length);
	}

	

	public static function check($testvalue) {
		if(! isset($_SESSION['Csrf']) || $_SESSION['Csrf']!=$testvalue){
			return false; 
		}	
		else {
			return true; 
		}
	}


}