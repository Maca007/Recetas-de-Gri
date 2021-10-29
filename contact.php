<?php

if($_POST) {
    $introducir_nombre = "";
    $introducir_email = "";
    $introducir_telefono = "";
    $introducir_asunto = "";
    $text_area = "";
    
    if(isset($_POST['introducir_nombre'])) {
      $introducir_nombre = filter_var($_POST['introducir_nombre'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['introducir_email'])) {
    	$introducir_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['introducir_email']);
    	$introducir_email = filter_var($introducir_email, FILTER_VALIDATE_EMAIL);
    }
    
    /* if(isset($_POST['introducir_telefono'])) {
    	$introducir_telefono= filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    } */
    
    if(isset($_POST['introducir_asunto'])) {
    	$introducir_asunto = filter_var($_POST['introducir_asunto'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['text_area'])) {
    	$text_area = htmlspecialchars($_POST['text_area']);
    }
    
    else {
    	$recipient = "gonzalesmacarena93@gmail.com";
    }
    
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $introducir_email . "\r\n";
    
    if(mail($recipient, $email_title, $introducir_nombre, $headers)) {
    	echo "<p>Gracias por contactarte, $introducir_nombre. Te contestaré lo más pronto posible.</p>";
    } else {
    	echo '<p>Upss, error</p>';
    }
    
} else {
    echo '<p>Algo ha ido mal</p>';
}

?>