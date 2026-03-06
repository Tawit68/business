<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add Customer</h1>
    <form action="countryCode.php" method="POST">

        <label for="countryCode">countryCode:</label>
        <input type="text" id="countryCode" name="countryCode">
        <br><br>

        <label for="countryName">countryName:</label>
        <input type="text" id="countryName" name="countryName">
        <br><br>

        <input type="submit" value="Submit">
        <br><br>
</body>

</html>

<?php
if (isset($_POST['countryCode']) && isset($_POST['countryName'])) :

          require 'connect.php';
    $strcountryCode = $_POST["countryCode"];
    $strcountryName = $_POST["countryName"];
          $sql = "INSERT INTO country (countryCode, countryName) VALUES (:countryCode, :countryName)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':countryCode', $_POST['countryCode']);
    $stmt->bindParam(':countryName', $_POST['countryName']);
    if ($stmt->execute()) :
        $message = 'Suscessfully add new country';
    else :
        $message = 'Fail to add new country';
    endif;
    echo $message;
    $conn = null;
endif;