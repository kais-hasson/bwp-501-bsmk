<?php
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
session_start();
$user=$_GET['user_name'];
$pass=$_GET['password'];

try{
    if (isset($pdo)) {
        $con = $pdo->prepare("SELECT password,user_name FROM besmk.new_user WHERE user_name='$user'");
        $con->execute();
        $rows = $con->fetchAll();
        if ($rows==Array())
        {
            $exceptio_user = "your user name is rong please try again";
            echo (json_encode($exceptio_user));
        }
        foreach ($rows as $row) {

            if ($pass == ($row['password'])) {
                print true;
                $_SESSION["token_user"]=hash("sha256",uniqid());
            } else {
                $exceptio_password="your password is rong please try again";
                echo (json_encode($exceptio_password));
            }
        }
    }
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>