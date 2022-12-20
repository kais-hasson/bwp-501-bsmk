<?php

header("Content-type: application/json");
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
session_start();
if (isset($_SESSION['error'])) {
    echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo '<p style="color:green">' . $_SESSION['success'] . "</p>\n";
    unset($_SESSION['success']);
}

    try {
        if (isset($pdo)) {
            $con = $pdo->prepare("SELECT id, phone_number, money_amount, user_name FROM besmk.bills ");
            $con->execute();
            $bills = $con->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($bills));
        }
    } catch (PDOException $e) {
        print_r(json_encode("Connection failed: " . $e->getMessage()));
    }