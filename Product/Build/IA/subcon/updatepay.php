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
    die("error with connection: " . mysqli_connect_error());
}

$action = "edit";
$id = $_POST['id'];
$addPay = $_POST['addPay']; 
$subPay = $_POST['subPay']; 
$datechanged = date("Y-m-d H:i:s"); 
$query = "SELECT * FROM subcon WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $payrn = $row['newPay']; 
    $payoriginal = $row['pay'];
    $historyname = $row['name'];
    $historywork = $row['work'];

    $newbalance = $payrn - $addPay + $subPay;

    $updatequery = "UPDATE subcon SET newPay = '$newbalance' WHERE id = '$id'";
    if (mysqli_query($conn, $updatequery)) {
        echo "Balance updated ";
    } else {
        echo "Error updating: " . mysqli_error($conn);
    }
    
    $insertquery = "INSERT INTO subconhistory (historyaction, historyname, historywork, historypay, leftpay, addPay, subPay, historyid, datechanged2) VALUES ('$action','$historyname','$historywork','$payoriginal','$newbalance','$addPay', '$subPay','$id','$datechanged')";
    if (mysqli_query($conn, $insertquery)) {
        echo "History data inserted ";
        header('Location: /IA/subconprojectview.php');
    } else {
        echo "Error inserting " . mysqli_error($conn);
    }
} else {
    echo "Error fetching record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
