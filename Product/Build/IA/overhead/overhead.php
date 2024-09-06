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
    $vendor = $_POST['vendor'];
    $category = $_POST['category'];
    $frequency = $_POST['frequency'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $invoiceNo = $_POST['invoiceNo'];
    $comments = $_POST['comments'];
    $datecreated = date("Y-m-d H:i:s"); 

        $normalsql ="INSERT INTO overhead (name,vendor,category,frequency, description, cost,date,status,invoiceNo,comments) VALUES ('$name','$vendor', '$category','$frequency', '$description','$cost','$date', '$status','$invoiceNo', '$comments')";
        if (mysqli_query($conn, $normalsql)) {
            echo "Success!!";
            $last_id = mysqli_insert_id($conn);
        } else {
            echo "Error: " . $normalsql . "<br>" . mysqli_error($conn);
        }
        
        $historysql = "INSERT INTO overheadhistory ( historyaction, historyname, historyvendor, historycategory,historyfrequency, historydescription, historycost,historydate,historystatus, historyinvoiceNo, historycomments, historyid, datecreated) VALUES ('$action','$name','$vendor', '$category','$frequency', '$description','$cost','$date', '$status','$invoiceNo', '$comments', '$last_id','$datecreated')";
         if (mysqli_query($conn, $historysql)) {
            echo "insertion sukses!";
            $last_id = mysqli_insert_id($conn);
        } else {
            echo "Error: " . $historysql . "<br>" . mysqli_error($conn);
        }

    

    mysqli_close($conn);
    ?>