<?php
session_start();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <style>
        .categoryArt{
            border: 1px solid white;
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            flex-wrap: wrap;
            width: 35%;
            margin: 25px;
            padding: 25px;
        }
        .categoryImg{
            width: 25%;
            height: 25%;
        }
        .categoryDiv{
            display: flex;
            flex-wrap: wrap;
        }
        .productDiv{
            border: 1px solid white;
        }
        .adminForm{
            border: 1px solid white;
            margin: 30px;
            padding: 30px;
        } 
    </style>
</head>
<body>
    <h2>Practica 2524</h2>
    <nav>
        <a href="index.php"> INICIO </a> - 
        <a href="categories.php"> CATEGORIAS </a>
        <?php 
        if(isset($_SESSION['token'])){
            echo " - <a href=adminOptions.php> OPCIONES DESARROLLADOR </a> - ";
            echo "<a href=logout.proc.php> LOGOUT </a>";
        }
        ?>
    </nav>
    <?php
        if(isset($_SESSION['token'])){
            echo "Estas logeado como admin y tal";
        }
        
    ?>
