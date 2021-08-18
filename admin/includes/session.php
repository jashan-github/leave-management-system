<?php
session_start();
if(!isset($_SESSION["alogin"])){
    header("Location: /index.php");
}