<?php

require "db.php";

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $name = $_POST['name'];
    $mobile = $_POST["mobile"];
    $country = $_POST["country"];
    $address = $_POST["address"];
    $city = $_POST["city"];

    if (
        empty($_POST["email"])
        || empty($_POST["name"])
        || empty($_POST["mobile"])
        || empty($_POST["country"])
        || empty($_POST["address"])
        || empty($_POST["city"])
    ) {
        header("location: ../shipping.php?status=Fill All Data !");
        exit();
    } else {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: ../shipping.php?status=Invalid Email No !");
            exit();
        } else if (strlen($name) < 3 || strlen($name) > 50) {
            header("location: ../shipping.php?status=Invalid name Name !");
            exit();
        } else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]{7}/", $mobile) || strlen($mobile) !== 10) {
            header("location: ../shipping.php?status=Invalid Mobile Name !");
            exit();
        } else if (strlen($country) < 3 || strlen($country) > 20) {
            header("location: ../shipping.php?status=Invalid country Name !");
            exit();
        } else if (strlen($address) < 5 || strlen($address) > 200) {
            header("location: ../shipping.php?status=Invalid address Name !");
            exit();
        } else if (strlen($city) < 3 || strlen($city) > 20) {
            header("location: ../shipping.php?status=Invalid city Name !");
            exit();
        } else {
            $q2 = "INSERT INTO `shipping` (`name`,`email`,`country`,`mobile`,`address`,`city`) 
            VALUES ('" . $name . "','" . $email . "','" . $country . "','" . $mobile . "','" . $address . "','" . $city . "')";
            $rs2 = $conn->query($q2);
            $conn->close();

            header("location: ../shipping.php?status=Shipping Successfully Added !");
            exit();
        }
    }
} else if (isset($_POST["update"])) {

    $shippingId = $_POST["shippingId"];
    $email = $_POST["email"];
    $name = $_POST['name'];
    $mobile = $_POST["mobile"];
    $country = $_POST["country"];
    $address = $_POST["address"];
    $city = $_POST["city"];

    if (
        empty($_POST["email"])
        || empty($_POST["name"])
        || empty($_POST["mobile"])
        || empty($_POST["country"])
        || empty($_POST["address"])
        || empty($_POST["city"])
    ) {
        header("location: ../shipping.php?status=Fill All Data !");
        exit();
    } else {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: ../shipping.php?status=Invalid Email No !");
            exit();
        } else if (strlen($name) < 3 || strlen($name) > 50) {
            header("location: ../shipping.php?status=Invalid name Name !");
            exit();
        } else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]{7}/", $mobile) || strlen($mobile) !== 10) {
            header("location: ../shipping.php?status=Invalid Mobile Name !");
            exit();
        } else if (strlen($country) < 3 || strlen($country) > 20) {
            header("location: ../shipping.php?status=Invalid country Name !");
            exit();
        } else if (strlen($address) < 5 || strlen($address) > 200) {
            header("location: ../shipping.php?status=Invalid address Name !");
            exit();
        } else if (strlen($city) < 3 || strlen($city) > 20) {
            header("location: ../shipping.php?status=Invalid city Name !");
            exit();
        } else {
            $q1 = "UPDATE `shipping` SET name = '" . $name . "', email = '" . $email . "', country = '" . $country . "', mobile = '" . $mobile . "',address = '" . $address . "',city = '" . $city . "' WHERE shippingId = '" . $shippingId . "'";
            $rs1 = $conn->query($q1);

            $conn->close();

            header("location: ../shipping.php?status=Shipping Details Update Succeed !");
            exit();
        }
    }
} else if (isset($_POST["delete"])) {

    $shippingId = $_POST["shippingId"];

    if (
        empty($_POST["shippingId"])
    ) {
        header("location: ../shipping.php?status=Delete Failed !");
        exit();
    } else {

        $q5 = "DELETE FROM `shipping` WHERE shippingId='" . $shippingId . "'";
        $rs5 = $conn->query($q5);

        $conn->close();

        header("location: ../shipping.php?status=Shipping Details Delete Succeed !");
        exit();
    }
} else {
    header("location: ../shipping.php?status=Shiiping Details Failed !");
    exit();
}
