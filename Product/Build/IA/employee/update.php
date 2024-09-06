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

$selectquery = "SELECT * FROM karyawan WHERE id = '$id'";
$getquery = mysqli_query($conn, $selectquery);

if ($row = mysqli_fetch_assoc($getquery)) {
    
    $action = "edit";
    $placeholderemployeetype = $row['employeetype'];
    $placeholdername = $row['Nama'];
    $placeholderaddress = $row['alamat'];
    $placeholderpayplan = $row['payplan'];
    $placeholderbonus = $row['bonus'];
    $placeholderwage = $row['gaji'];
    $placeholdernote = $row['note'];
    $placeholderjob = $row['job'];

    $insertquery = "INSERT INTO employeehistory (historyemployeetype, historyaction, historyname, historyadress, historypayplan, historywage, historynote, historyjob, historyid, datechanged, historybonus) VALUES ('$placeholderemployeetype','$action','$placeholdername','$placeholderaddress','$placeholderpayplan','$placeholderwage','$placeholdernote','$placeholderjob','$id','$datechanged','$placeholderbonus')";
    if (mysqli_query($conn, $insertquery)) {
        echo "Data inserted into new table successfully.";
    } else {
        echo "Error inserting data into new table: " . mysqli_error($conn);
    }

    $employeetype = $_POST['employeetype'];
    $Nama = $_POST['Newname'];
    $alamat = $_POST['Newaddress'];
    $payplan = $_POST['payplan'];
    $gaji = $_POST['Newwage'];
    $note = $_POST['Newnote'];
    $job = $_POST['Newjob'];

    $updatequery = "UPDATE karyawan SET employeetype = '$employeetype', Nama = '$Nama', alamat = '$alamat', payplan = '$payplan', gaji = '$gaji', note = '$note', job = '$job' WHERE id = '$id'";
    if (mysqli_query($conn, $updatequery)) {
        echo "Record berhasil diupdate.";
        header('Location: /IA/employeeprojectview.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "No existing record found for ID: $id";
}

mysqli_close($conn);
?>