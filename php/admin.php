
<?php
header("Content-type: application/json");
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
session_start();
if (isset($_SESSION['error']))
{
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success']))
{
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
$who=$_GET['who'];
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
}elseif ($who=="users"){
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
?>