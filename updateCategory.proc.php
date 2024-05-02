<?php
$id = $_REQUEST['id'];

echo $id;

$name = $_REQUEST['name'];

session_start();
if(isset($_SESSION['token'])){

        $url = "https://api.escuelajs.co/api/v1/categories/$id";

        $data = array(
            'name' => $name
        );

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        if(curl_errno($ch)) {
            echo 'Error al realizar la solicitud: ' . curl_error($ch);
        } else {
            $json_response = json_decode($response, true);
            if($json_response && is_array($json_response)){
                header("location: adminOptions.php?updated=true");
            } else {
                header('location: index.php');
            }
        }
    
        curl_close($ch);

    }else{
        header("location:index.php");
    }