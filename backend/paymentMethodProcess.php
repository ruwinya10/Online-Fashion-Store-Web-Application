<?php

require "db.php";

if (isset($_POST["submit"])) {

    $cardHolder = $_POST["cardHolder"];
    $cardNo = $_POST['cardNo'];
    $expMonth = $_POST["expDate"];
    $month = $_POST["expDate"];
    $cvv = $_POST["cvv"];

    if (
        empty($_POST["cardHolder"])
        || empty($_POST["cardNo"])
        || empty($_POST["expDate"])
        || empty($_POST["cvv"])
    ) {
        header("location: ../payment.php?status=Fill All Data !");
        exit();
    } else {

        // set the time zone to Sri Lanka
        date_default_timezone_set('Asia/Colombo');

        // get the current time in Sri Lanka
        $realmonth = date('m');
        $realyear = date('Y');
        $currentDate = date('Y-m-d');

        // Using explode() to split the string into an array based on spaces
        $parts = explode("-", $month);

        $i = 0;
        // Output each part of the string
        foreach ($parts as $date[$i]) {
            $i++;
        }

        if (strlen($cardNo) != 12) {
            header("location: ../payment.php?status=Invalid Card No !");
            exit();
        }
        if (strlen($cardHolder) < 3 || strlen($cardHolder) > 50) {
            header("location: ../payment.php?status=Invalid Card Holder's Name !");
            exit();
        } elseif ($realmonth > $date[1]) {
            header("location: ../payment.php?status=Invalid Expiry Month !");
            exit();
        } elseif ($realyear > $date[0]) {
            header("location: ../payment.php?status=Invalid Expiry Year !");
            exit();
        } elseif (strlen($cvv) < 3 || strlen($cvv) > 3 || empty($cvv)) {
            header("location: ../payment.php?status=Invalid CVC No !");
            exit();
        } else {
            $q2 = "INSERT INTO `paymentmethod` (`cardHolder`,`cardNo`,`expMonth`,`cvv`) 
            VALUES ('" . $cardHolder . "','" . $cardNo . "','" . $expMonth . "','" . $cvv . "')";
            $rs2 = $conn->query($q2);
            $conn->close();

            header("location: ../payment.php?status=Payment Method Successfully Added !");
            exit();
        }
    }
} else if (isset($_POST["update"])) {

    $methodId = $_POST["methodId"];
    $cardHolder = $_POST["cardHolder"];
    $cardNo = $_POST["cardNo"];
    $expMonth = $_POST["expDate"];
    $month = $_POST["expDate"];
    $cvv = $_POST["cvv"];

    // echo $month;
    // exit();

    if (
        empty($_POST["cardHolder"])
        || empty($_POST["methodId"])
        || empty($_POST["cardNo"])
        || empty($_POST["expDate"])
        || empty($_POST["cvv"])
    ) {
        header("location: ../payment.php?status=Fill All Data !");
        exit();
    } else {

        // set the time zone to Sri Lanka
        date_default_timezone_set('Asia/Colombo');

        // get the current time in Sri Lanka
        $realmonth = date('m');
        $realyear = date('Y');
        $currentDate = date('Y-m-d');

        // Using explode() to split the string into an array based on spaces
        $parts = explode("-", $month);

        $i = 0;
        // Output each part of the string
        foreach ($parts as $date[$i]) {
            $i++;
        }

        if (strlen($cardNo) != 12) {
            header("location: ../payment.php?status=Invalid Card No !");
            exit();
        }
        if (strlen($cardHolder) < 3 || strlen($cardHolder) > 50) {
            header("location: ../payment.php?status=Invalid Card Holder's Name !");
            exit();
        } elseif ($realmonth > $date[1]) {
            header("location: ../payment.php?status=Invalid Expiry Month !");
            exit();
        } elseif ($realyear > $date[0]) {
            header("location: ../payment.php?status=Invalid Expiry Year !");
            exit();
        } elseif (strlen($cvv) < 3 || strlen($cvv) > 3 || empty($cvv)) {
            header("location: ../payment.php?status=Invalid CVC No !");
            exit();
        } else {
            $q1 = "UPDATE `paymentmethod` SET cardHolder = '" . $cardHolder . "', cardNo = '" . $cardNo . "', expMonth = '" . $expMonth . "', cvv = '" . $cvv . "' WHERE methodId = '" . $methodId . "'";
            $rs1 = $conn->query($q1);

            $conn->close();

            header("location: ../payment.php?status=Payment Method Update Succeed !");
            exit();
        }
    }
} else if (isset($_POST["delete"])) {

    $methodId = $_POST["methodId"];

    if (
        empty($_POST["methodId"])
    ) {
        header("location: ../payment.php?status=Delete Failed !");
        exit();
    } else {

        $q5 = "DELETE FROM `paymentmethod` WHERE methodId='" . $methodId . "'";
        $rs5 = $conn->query($q5);

        $conn->close();

        header("location: ../payment.php?status=Payment Method Delete Succeed !");
        exit();
    }
} else {
    header("location: ../payment.php?status=Payment Failed !");
    exit();
}
