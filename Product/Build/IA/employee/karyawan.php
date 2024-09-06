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
$employeetype = $_POST['employeetype'];
$name = $_POST['Nama'];
$address = $_POST['alamat'];
$wage = $_POST['Gaji'];
$payplan = $_POST['payplan'];
$job = $_POST['job'];
$note = $_POST['note'];
$datecreated = date("Y-m-d H:i:s");


    $normalsql = "INSERT INTO karyawan (employeetype,Nama,alamat,gaji, payplan, job,note) VALUES ('$employeetype','$name', '$address','$wage', '$payplan','$job','$note')";
    if (mysqli_query($conn, $normalsql)) {
        echo "Success!!";
        $last_id = mysqli_insert_id($conn);
    } else {
        echo "Error: " . $normalsql . "<br>" . mysqli_error($conn);
    }
    
    $historysql = "INSERT INTO employeehistory (historyemployeetype, historyaction, historyname, historyadress, historypayplan, historywage, historynote, historyjob, historyid, datechanged) VALUES ('$employeetype', '$action', '$name', '$address','$payplan', '$wage',  '$note','$job','$last_id','$datecreated')";
    if (mysqli_query($conn, $historysql)) {
        echo "insertion sukses!";
        $last_id = mysqli_insert_id($conn);
        header('Location: /IA/employeeprojectview.php');
    } else {
        echo "Error: " . $historysql . "<br>" . mysqli_error($conn);
    }



mysqli_close($conn);
?>
