<?php
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
$user_name=$_POST['user_name'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
$birthday=$_POST['birthday'];
try {

    if (isset($pdo)) {
        $con = $pdo->prepare("SELECT id,email,phone_number,birthday FROM besmk.new_user where user_name='$user_name'");
        $con->execute();
        $users = $con->fetchAll(PDO::FETCH_ASSOC);
        if ($users==Array())
        {
            $exceptio_user = "your user name is rong please try again";
            echo (json_encode($exceptio_user));
        }
        foreach ($users as $user) {

            if ($email == ($user['email'])&&$phone_number==($user['phone_number'])&&$birthday==($user['birthday'])) {
                print true;
                $new_password=$_GET['new_password'];
                try {
                   if (isset($pdo)) {
                    $update = $pdo->prepare("UPDATE besmk.new_user  SET password='$new_password' WHERE user_name='$user_name'");
                    $update->execute();
                    print_r(json_encode("updated password"));
                }}  catch (PDOException $e) {
                    print_r(json_encode("Connection failed: " . $e->getMessage()));
                }
            } else {
                $exceptio_information="your information is rong please try again";
                echo (json_encode($exceptio_information));
            }
        print_r(json_encode($users));

    }
}} catch (PDOException $e) {
    print_r(json_encode("Connection failed: " . $e->getMessage()));
}