
 <?php
 	// $Kunci = "27:9h:9w:4m:77:88";
 	// $ModeEnkripsi = "AES-256-CTR";
 	// $KunciChar = "0123456789abcdef";
 	function simple_encrypt($text){
    	return base64_encode(openssl_encrypt($text, "AES-256-CTR", "GhratnaXbS", 0, "0123456789abcdef"));
    }

    function simple_decrypt($text){  
    	return openssl_decrypt(base64_decode($text), "AES-256-CTR", "GhratnaXbS", 0, "0123456789abcdef");
    }
 ?>