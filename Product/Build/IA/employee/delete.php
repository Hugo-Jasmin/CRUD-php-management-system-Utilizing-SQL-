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
    die("connection failed:" . mysqli_connect_error());
}

$id = $_GET['id'];
$action = "deletion";

            $selectquery = "SELECT * FROM karyawan WHERE id = '$id'";
            $result = mysqli_query($conn, $selectquery);

            if ($row = mysqli_fetch_assoc($result)) {
            
            $placeholderemployeetype = $row['employeetype'];
            $placeholdername = $row['Nama'];
            $placeholderaddress = $row['alamat'];
            $placeholderpayplan = $row['payplan'];
            $placeholderbonus = $row['bonus'];
            $placeholderwage = $row['gaji'];
            $placeholdernote = $row['note'];
            $placeholderjob = $row['job'];
            $datechanged = date("Y-m-d H:i:s");

            $insertquery = "INSERT INTO employeehistory (historyemployeetype, historyaction, historyname, historyadress, historypayplan, historywage, historynote, historyjob, historyid, datechanged, historybonus) VALUES ('$placeholderemployeetype','$action','$placeholdername','$placeholderaddress','$placeholderpayplan','$placeholderwage','$placeholdernote','$placeholderjob','$id','$datechanged','$placeholderbonus')";
            if (mysqli_query($conn, $insertquery)) {
                echo "data inserted successfully!";
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
        }
        $deletion = "DELETE FROM karyawan WHERE id = $id";
        if (mysqli_query($conn, $deletion)) {
            header('location: /IA/employeeprojectview.php');
            exit(); 
        } else {
            echo "err: " . mysqli_error($conn); 
        }

$conn->close();
?>
