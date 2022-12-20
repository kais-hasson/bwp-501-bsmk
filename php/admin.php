
<?php
header("Content-type: application/json");
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
session_start();

    if(empty($_SESSION["token"])){
        header("location:http://localhost:63342/bwp-501-bsmk3/admin%20register.html?");
    }else{
        $who=$_GET['who'];
}
    if( $who=="admins")
{
    try {

        if (isset($pdo)) {
            $con = $pdo->prepare("SELECT id,user_name,password,email FROM besmk.admin ");
            $con->execute();
            $admins = $con->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($admins));

        }
    } catch (PDOException $e) {
        print_r(json_encode("Connection failed: " . $e->getMessage()));
    }
}
    if ($who=="users"){
    try {
        if (isset($pdo)) {
            $con = $pdo->prepare("SELECT id, title, f_name, l_name, phone_number, email, user_name, city, address, gender, birthday, occupation, password FROM besmk.new_user ");
            $con->execute();
            $users = $con->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($users));
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

}
elseif ($who=="destroy"){
       session_destroy();
       echo (json_encode("please log in and try again"));
    header("location:http://localhost:63342/bwp-501-bsmk3/admin%20register.html?");
}


?>