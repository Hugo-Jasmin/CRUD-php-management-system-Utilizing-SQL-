<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('This path is restricted go back to index.php!');</script>";
    exit;
}
?>

<?php 
    $servername = "localhost";
    $username = "u855808231_root"; 
    $password = "Memeikaykenjay1"; 
    $dbname = "u855808231_huyo"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
$action = "deletion";

$selectquery = "SELECT * FROM subcon WHERE id = '$id'";
$result = mysqli_query($conn, $selectquery  );

if ($row = mysqli_fetch_assoc($result)) {
    $placeholdername = $row['name'];
    $placeholderwork = $row['work'];
    $placeholderpay = $row['pay'];
    $placeholdernewPay = $row['newPay'];
    $datechanged = date("Y-m-d H:i:s");

$insertquery = "INSERT INTO subconhistory (historyaction, historyname, historywork, historypay,leftpay, historyid, datechanged2) VALUES ('$action','$placeholdername','$placeholderwork', '$placeholderpay','$placeholdernewPay', '$id','$datechanged')";
if (mysqli_query($conn, $insertquery)) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}
}
$deletion = "DELETE FROM subcon WHERE id = $id";
$result1 = mysqli_query($conn, $deletion);
if ($result1) {
    header('Location:/IA/subconprojectview.php');
}else{
    die('Error: ' . mysqli_error($conn));
}
$conn->close();
?>
