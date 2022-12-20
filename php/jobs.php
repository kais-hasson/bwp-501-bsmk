<?php

header("Content-type: application/json");
require_once "C:\Users\hp\bwp-501-bsmk3\php\pdo.php";
        try {
            if (isset($pdo)) {
                $con = $pdo->prepare("SELECT id, job_name, job_title, salary FROM besmk.jobs ");
                $con->execute();
                $bills = $con->fetchAll(PDO::FETCH_ASSOC);
                print_r(json_encode($bills));
            }
        } catch (PDOException $e) {
            print_r(json_encode("Connection failed: " . $e->getMessage()));
        }

