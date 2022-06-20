<?php
session_start();
if (empty($_SESSION['user'])){
    $user = "login";
    $location = "login";
    $estado = false;
    $rol= 0;
}else{
    
    $user = $_SESSION['user'];
    $location = "#";
    $estado = true; 
    $rol = $_SESSION['rol'];  
    $id = $_SESSION['iduser']; 
}