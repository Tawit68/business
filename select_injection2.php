<?php
require "connect.php";

// $n ="1" . " or '1=1:;'
$strCustomerID = $_GET["CustomerID"];
$sql = "SELECT * FROM customer where CustomerID = :customerID";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':customerID', $strCustomerID);

$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);

while ($row = $stmt->fetch()) {
    echo $row['CustomerID'] . ' ' . $row['Name'] . "<br/>";
}

$conn = nuLL;
?>