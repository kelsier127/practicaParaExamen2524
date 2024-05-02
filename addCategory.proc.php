<?php

$name = $_REQUEST['name'];
$image = $_REQUEST['img'];

session_start();
if(isset($_SESSION['token'])){

        $url = "https://api.escuelajs.co/api/v1/categories";

        $data = array(
            'name' => $name,
            'image' => $image
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
                header("location: adminOptions.php?created=true");
            } else {
                header('location: index.php');
            }
        }
    
        curl_close($ch);

    }else{
        header("location:index.php");
    }