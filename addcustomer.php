<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Select Country</title>
</head>

<body>

    <h1>The select element</h1>

    <p>The select element is used to create a drop-down list.</p>
    <h1>Add CUstomer</h1>
    <form action="addcustomer.php" method="POST">


        <input type="text" placeholder=" Enter CustomerID" name="CustomerID">
        <br><br>
        <input type="text" placeholder="Name" name="Name">
        <br><br>
        <input type="date" placeholder="birthdate" name="birthdate">
        <br><br>
        <input type="email" placeholder="email" name="email">
        <br><br>
        <input type=" text" placeholder="outstandingDebt" name="outstandingDebt">
        <br><br>
        <form action="countryCode.php" method="POST">
            <label for="country">Choose a country:</label>
            <select name="countryCode" id="country">
                <option value="AT">ออสเตรีย</option>
                <option value="AU">Australia</option>
                <option value="BD">บังคลาเทศ</option>
                <option value="CB">กัมพูชา</option>
                <option value="CN">China</option>
                <option value="FI">Finland</option>
                <option value="FJ">Fuji</option>
                <option value="GL">Greenland</option>
                <option value="ID">อินเดีย</option>
                <option value="IT">อิตาลี</option>
                <option value="JP">Japan</option>
                <option value="MY">มาเลเซีย</option>
                <option value="PH">ฟิลิปปินส์</option>
                <option value="PK">ปากีสถาน</option>
                <option value="RS">รัสเซีย</option>
                <option value="SG">Singapore</option>
                <option value="TH">ไทย</option>
            </select>
            <br><br>
            <input type="submit" value="Submit">
        </form>

        <p>Click the "Submit" button and the form-data will be sent to a page on the server called</p>

</body>

</html>



<?php
if (isset($_POST['CustomerID']) && isset($_POST['Name'])) :
    echo "<br>" . $_POST['CustomerID'] . $_POST['Name'] . $_POST['birthdate'] . $_POST['email'] .
        $_POST['countryCode'] . $_POST['outstandingDebt'];

    require 'connect.php';
    $sql = "insert into customer values(:CustomerID, :Name, :birthdate, :email, :countryCode, :outstandingDebt)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Name', $_POST['Name']);
    $stmt->bindParam(':birthdate', $_POST['birthdate']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':countryCode', $_POST['countryCode']);
    $stmt->bindParam(':outstandingDebt', $_POST['outstandingDebt']);

    if ($stmt->execute()) :
        $message = 'Suscessfully add new customer';
    else :
        $message = 'Fail to add new customer';
    endif;
    echo $message;
    $conn = null;
endif;
?>

<?php
