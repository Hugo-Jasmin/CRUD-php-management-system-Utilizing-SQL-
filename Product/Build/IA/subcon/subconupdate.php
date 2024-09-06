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

$id = $_POST['id'];
$datechanged = date("Y-m-d H:i:s"); 

$selectquery = "SELECT * FROM subcon WHERE id = '$id'";
$getquery = mysqli_query($conn, $selectquery);

if ($row = mysqli_fetch_assoc($getquery)) {
    $action = "edit";
    $historyname = $row['name'];
    $historywork = $row['work'];
    $historypay = $row['pay'];
    $leftpay = $row['newPay'];

    $insertquery = "INSERT INTO subconhistory (historyaction, historyname, historywork, historypay, leftpay, historyid, datechanged2) VALUES ('$action','$historyname','$historywork','$historypay','$leftpay','$id','$datechanged')";
    if (mysqli_query($conn, $insertquery)) {
        echo "Data inserted into new table successfully.";
    } else {
        echo "Error inserting data into new table: " . mysqli_error($conn);
    }
    
    $name = $_POST['Newname'];
    $work = $_POST['Newwork'];
    $pay = $_POST['newPay'];
    $id = $_POST['id'];

    $updatequery = "UPDATE subcon SET name = '$name', work = '$work', pay = '$pay', id = '$id' WHERE id = '$id'";
    
    if (mysqli_query($conn, $updatequery)) {
        echo "Record berhasil diupdate.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    $updatelefttopay = "UPDATE subcon SET newPay = '$pay' WHERE id = '$id'";
    if(mysqli_query($conn, $updatelefttopay)){
        echo "Left to pay updated successfully.";
        header('Location: /IA/subconprojectview.php');
    } else {
        echo "Error updating left to pay: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
