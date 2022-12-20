<?php
header("Content-type: application/json");
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
$who=$_GET['who'];
session_start();
if($who=="admin"){
    if(empty($_SESSION["token"])){
        header("location:http://localhost:63342/bwp-501-bsmk3/admin%20register.html");
    }
    else{
    try {
        if (isset($pdo)) {
            $con = $pdo->prepare("SELECT offers_id, offers_name, message, minutes, internet, money_value,offer_code FROM besmk.offers ");
            $con->execute();
            $offers = $con->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($offers));
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
        }
}
else{
        try {
            if (isset($pdo)) {
                $con = $pdo->prepare("SELECT offers_name, message, minutes, internet, money_value,offer_code FROM besmk.offers ");
                $con->execute();
                $offers = $con->fetchAll(PDO::FETCH_ASSOC);
                print_r(json_encode($offers));
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
    }
}