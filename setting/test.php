<?php
	//echo openssl_decrypt(base64_decode("WHlyZDY0QW4="), "AES-256-CTR", "27:9h:9w:4m:77:88", 0, "0123456789abcdef");
	echo base64_encode(openssl_encrypt("admin", "AES-256-CTR", "GhratnaXbS", 0, "0123456789abcdef"));
?>