<?php

include("components/includes/nav.php");

?>


<?php 

$url = "https://api.escuelajs.co/api/v1/categories";

$username = $_REQUEST['username'];
echo $username;
$password = $_REQUEST['password'];
echo "<br> ".$password;

$data = array(
    'email' => $username,
    'password' => $password
);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Error al realizar la solicitud: ' . curl_error($ch);
} else {
    $json_response = json_decode($response, true);

    if($json_response && is_array($json_response)){
        echo "<div class=categoryDiv>";
        foreach($json_response as $algo){   
            ?>

                <article class="categoryArt" >
                    <h4> <a href="singleCategory.php?categoryID=<?php echo "$algo[id]"?> "> <?php echo "$algo[id] - $algo[name]" ?> </a> </h4>
                    <img class="categoryImg" src='<?php echo "$algo[image]"?>'>

                </article>

            <?php

            
            
            echo "<br>";
        }
        echo "</div>";
    } else {
        echo "no funciona";
    }

    
}

?>

<?php

include("components/includes/footer.html");

?>