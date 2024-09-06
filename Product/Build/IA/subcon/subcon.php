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

$action = "create";
$name = $_POST['name'];
$work = $_POST['work'];
$pay = $_POST['pay'];
$newPay = $_POST['pay'];
$datecreated = date("Y-m-d H:i:s"); 

    $sql = "INSERT INTO subcon (name,work,pay,newPay) VALUES ('$name', '$work','$pay','$newPay')";
    if (mysqli_query($conn, $sql)) {
        echo "Success!!";
        $last_id = mysqli_insert_id($conn);
    } else {
        echo "Error: " . $sql . mysqli_error($conn);
    }
    
    $sql = "INSERT INTO subconhistory (historyaction, historyname,historywork,historypay,historyid,leftpay, datechanged2) VALUES ('$action','$name', '$work','$pay','$last_id','$pay','$datecreated')";
    if (mysqli_query($conn, $sql)) {
        echo "Success!";
        header('Location: /IA/subconprojectview.php');
    } else {
        echo "Error: " . $sql . mysqli_error($conn);
    }
mysqli_close($conn);
?>
