<?php

    $url = "https://api.escuelajs.co/api/v1/auth/login/";

    $username = $_REQUEST['username'];
    echo $username;
    $password = $_REQUEST['password'];
    echo "<br> ".$password;

    $data = array(
        'email' => $username,
        'password' => $password
    );

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if(curl_errno($ch)) {
        echo 'Error al realizar la solicitud: ' . curl_error($ch);
    } else {
        $json_response = json_decode($response, true);

        if($json_response && is_array($json_response)){
            session_start();
            $_SESSION['token'] = $json_response['access_token'];
            header('location: index.php');
        } else {
            echo "no funciona";
            //header('location: index.php');
        }

        
    }