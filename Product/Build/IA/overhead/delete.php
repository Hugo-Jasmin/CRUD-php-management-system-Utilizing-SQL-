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

$selectquery = "SELECT * FROM overhead WHERE id = '$id'";
$result = mysqli_query($conn, $selectquery  );

if ($row = mysqli_fetch_assoc($result)) {

    $placeholdername = $row['name'];
    $placeholdervendor = $row['vendor'];
    $placeholdercategory = $row['category'];
    $placeholderfrequency = $row['frequency'];
    $placeholderdescription = $row['description'];
    $placeholdercost = $row['cost'];
    $placeholderdate = $row['date'];
    $placeholderstatus = $row['status'];
    $placeholderinvoiceNo = $row['invoiceNo'];
    $placeholdercomments = $row['comments'];
    $datechanged = date("Y-m-d H:i:s");

$insertquery = "INSERT INTO overheadhistory ( historyaction, historyname, historyvendor, historycategory,historyfrequency, historydescription, historycost,historydate,historystatus, historyinvoiceNo, historycomments, historyid, datecreated) VALUES ('$action','$placeholdername','$placeholdervendor', '$placeholdercategory','$placeholderfrequency', '$placeholderdescription','$placeholdercost','$placeholderdate', '$placeholderstatus','$placeholderinvoiceNo', '$placeholdercomments', '$id','$datechanged')";
if (mysqli_query($conn, $insertquery)) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
}
$deletion = "DELETE FROM overhead WHERE id = $id";
if (mysqli_query($conn, $deletion)) {
    header('Location: /IA/overheadprojectview.php');
    exit(); 
} else {
    echo "Error: " . mysqli_error($conn); 
}
$conn->close();
?>

