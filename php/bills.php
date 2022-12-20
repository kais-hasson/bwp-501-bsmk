<?php

header("Content-type: application/json");
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
session_start();
$who=$_GET['who'];
if($who=="admin"){
    if(empty($_SESSION["token"])){
    header("location:http://localhost:63342/bwp-501-bsmk3/admin%20register.html");
}
else{

    try {
        if (isset($pdo)) {
            $con = $pdo->prepare("SELECT id, phone_number, money_amount, user_name FROM besmk.bills ");
            $con->execute();
            $bills = $con->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($bills));
        }
    } catch (PDOException $e) {
        print_r(json_encode("Connection failed: " . $e->getMessage()));
    }}}
if($who=="user"){
    if(empty($_SESSION["token_user"])){
        header("location:http://localhost:63342/bwp-501-bsmk3/register.html?");
    }else{

        try {
            if (isset($pdo)) {
                $con = $pdo->prepare("SELECT phone_number, money_amount, user_name FROM besmk.bills ");
                $con->execute();
                $bills = $con->fetchAll(PDO::FETCH_ASSOC);
                print_r(json_encode($bills));
            }
        } catch (PDOException $e) {
            print_r(json_encode("Connection failed: " . $e->getMessage()));
        }}}