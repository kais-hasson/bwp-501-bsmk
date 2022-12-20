<?php

header("Content-type: application/json");
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
require_once "C:\Users\hp\bwp-501-bsmk3\php\humans.php";
require_once "C:\Users\hp\bwp-501-bsmk3\php\offer.php";
require_once "C:\Users\hp\bwp-501-bsmk3\php\bill.php";
$who=$_GET['who'];
session_start();
if(empty($_SESSION["token"])){
    header("location:http://localhost:63342/bwp-501-bsmk3/admin%20register.html?");
}
else {
    if ($who == "admins") {
        $user = $_POST;
        $new_user = new humans($user);
        try {
            if (isset($pdo)) {
                $con = $pdo->prepare("UPDATE besmk.admin SET user_name='$new_user->user_name', password= '$new_user->password',email='$new_user->email' WHERE id='$new_user->id'");
                $con->execute();
                header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
            }
        } catch
        (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    } elseif ($who == "offers") {
        $offer = $_POST;
        $new_offer = new offer($offer);
        try {

            if (isset($pdo)) {
                $con = $pdo->prepare("UPDATE besmk.offers SET offers_name='$new_offer->offer_name',message='$new_offer->message', minutes='$new_offer->minutes', internet='$new_offer->internet', money_value='$new_offer->money_value',offer_code='$new_offer->offer_code' WHERE offers_id='$new_offer->id'");
                $con->execute();
                header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
            }
        } catch
        (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }}