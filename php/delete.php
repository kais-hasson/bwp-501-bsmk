<?php
header("Content-type: application/json");
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
require_once "C:\Users\hp\bwp-501-bsmk3\admin register.html";
$who=$_GET['who'];
$deleted_id=$_POST['id'];
session_start();
if(empty($_SESSION["token"])){
    header("location:http://localhost:63342/bwp-501-bsmk3/admin%20register.html?");}
else{
if($who=="admins")
{
    try {
        if (isset($pdo)) {
            $con = $pdo->prepare("DELETE FROM besmk.admin WHERE id='$deleted_id'");
            $con->execute();

            header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
        }
    } catch
    (PDOException $e) {
        print_r(json_encode( "Connection failed: " . $e->getMessage()));
}}
elseif ($who=="users"){
     try {
         if (isset($pdo)) {
             $con = $pdo->prepare("DELETE FROM besmk.new_user id='$deleted_id'");
             $con->execute();
             header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
         }
     } catch
     (PDOException $e) {
         print_r(json_encode( "Connection failed: " . $e->getMessage()));}
}
elseif ($who=="offers"){
    try {
        if (isset($pdo)) {
            $con = $pdo->prepare("DELETE FROM besmk.offers WHERE offers_id='$deleted_id'");
            $con->execute();
            header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
        }
    } catch
    (PDOException $e) {
        print_r(json_encode( "Connection failed: " . $e->getMessage()));
}}
elseif ($who=="bills"){
    try {
        if (isset($pdo)) {
            $con = $pdo->prepare("DELETE FROM besmk.bills WHERE id='$deleted_id'");
            $con->execute();
            header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
        }
    } catch
    (PDOException $e) {
        print_r(json_encode( "Connection failed: " . $e->getMessage()));
    }}
elseif ($who=="job"){
    try {
        if (isset($pdo)) {
            $con = $pdo->prepare("DELETE FROM besmk.jobs WHERE id='$deleted_id'");
            $con->execute();
            header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
        }
    } catch
    (PDOException $e) {
        print_r(json_encode( "Connection failed: " . $e->getMessage()));
    }}}