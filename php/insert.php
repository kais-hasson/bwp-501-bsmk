<?php
header("Content-type: application/json");
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
require_once "C:\Users\hp\bwp-501-bsmk3\php\humans.php";
require_once "C:\Users\hp\bwp-501-bsmk3\php\offer.php";
require_once "C:\Users\hp\bwp-501-bsmk3\php\bill.php";
require_once "C:\Users\hp\Documents\project final\bwp-501-bsmk3\php\job.php";
$who=$_GET['who'];
    if ($who=="users") {
        $user=$_POST;
        $new_user=new humans($user);
        try {

            if (isset($pdo)) {
                $select_if_user_exist=$pdo->prepare("SELECT user_name,email,phone_number FROM besmk.new_user");
                $select_if_user_exist->execute();
                $users_exist=$select_if_user_exist->fetchAll(PDO::FETCH_ASSOC);
                foreach ($users_exist as $user_exist) {
                    if ($user_exist['phone_number'] == $new_user->phone_number && $user_exist['email'] == $new_user->email && $user_exist['user_name'] == $new_user->user_name) {
                        $exception_exist = "this user already exist please go to login page";
                        print_r(json_encode($exception_exist));
                        break;
                    } elseif ($user_exist['user_name'] == $new_user->user_name) {
                        $exception_user_name = "this user already exist please change it";
                        print_r(json_encode($exception_user_name));
                        break;
                    } elseif ($user_exist['email'] == $new_user->email) {
                        $exception_email = "this email already  exist please change it";
                        print_r(json_encode($exception_email));
                        break;
                    } elseif ($user_exist['phone_number'] == $new_user->phone_number) {
                        $exception_phone_number = "this phone_number already exist please change it";
                        print_r(json_encode($exception_phone_number));
                        break;
                    }
                    else{
                        $con = $pdo->prepare("INSERT INTO besmk.new_user(title, f_name, l_name, phone_number, email, user_name, city, address, gender, birthday, occupation, password)
                         VALUE('$new_user->title','$new_user->first_name','$new_user->last_name','$new_user->phone_number','$new_user->email','$new_user->user_name','$new_user->city','$new_user->address','$new_user->gender','$new_user->birthday','$new_user->occupation','$new_user->password')");
                        $conn->execute();
                        $conn = $pdo->prepare("insert into besmk.bills(phone_number, user_name) values ('$new_user->phone_number','$new_user->user_name')");
                        $con->execute();
                        print_r(json_encode("new user added"));
                        $_SESSION["token_user"]=hash("sha256",uniqid());
                    }
                }
                }
        } catch
        (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
session_start();
if(empty($_SESSION["token"])){
    header("location:http://localhost:63342/bwp-501-bsmk3/admin%20register.html?");
}else{
    if ($who=="admins"){
        $user=$_POST;
        $new_user=new humans($user);
        try {
            if (isset($pdo)) {

                $con = $pdo->prepare("INSERT INTO besmk.admin(user_name,password,email) VALUE('$new_user->user_name','$new_user->password','$new_user->email')");
                $con->execute();
                header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
            }
        } catch
        (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
if ($who=="offers") {
    $offer=$_POST;
    $new_offer=new offer($offer);
    try {
        if (isset($pdo)) {
            $con = $pdo->prepare("INSERT INTO besmk.offers(offers_name,offer_code,message,minutes,money_value,internet)
    VALUE('$new_offer->offer_name','$new_offer->offer_code','$new_offer->message','$new_offer->minutes','$new_offer->money_value','$new_offer->internet')");
            $con->execute();
            header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
        }
    } catch
    (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
if ($who=="bills") {
    $bill=$_POST;
    $new_bill=new bill($bill);
    try {
        if (isset($pdo)) {
            $con = $pdo->prepare("UPDATE besmk.bills SET money_amount='$new_bill->money_amount'
WHERE phone_number='$new_bill->phone_number'");
            $con->execute();
            header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
        }
    } catch
    (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }}
    if ($who=="job"){
        $jobs=$_POST;
        $new_job=new job($jobs);
        try {
            if (isset($pdo)) {

                $con = $pdo->prepare("INSERT INTO besmk.jobs(job_name, job_title, salary) VALUE('$new_job->job_name','$new_job->job_title','$new_job->salary')");
                $con->execute();
                header("location:http://localhost:63342/bwp-501-bsmk3/admin.html?");
            }
        } catch
        (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}