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
    die("Error: " . mysqli_connect_error());
}

$id = $_POST['id'];
$datechanged = date("Y-m-d H:i:s"); 

$selectquery = "SELECT * FROM overhead WHERE id = '$id'";
$getquery = mysqli_query($conn, $selectquery);

if ($row = mysqli_fetch_assoc($getquery)) {
        $action = "edit";
        $historyaction = $action;
        $historyname = $row['name'];
        $historycategory = $row['category'];
        $historyfrequency = $row['frequency'];
        $historydescription = $row['description'];
        $historycost = $row['cost'];
        $historydate = $row['date'];
        $historystatus = $row['status'];
        $historyinvoiceNo = $row['invoiceNo'];
        $historycomments = $row['comments'];
        $historyvendor = $row['vendor'];

    $insertquery = "INSERT INTO overheadhistory (historyaction, historyname, historyvendor, historycategory, historyfrequency, historydescription, historycost, historydate, historystatus, historyinvoiceNo, historycomments, historyid, datecreated) VALUES ('$historyaction', '$historyname', '$historyvendor', '$historycategory', '$historyfrequency', '$historydescription', '$historycost', '$historydate', '$historystatus', '$historyinvoiceNo', '$historycomments', '$id', '$datechanged')";
    if (mysqli_query($conn, $insertquery)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    $newname = $_POST['Newname'];
    $newcategory = $_POST['Newcategory'];
    $newfrequency = $_POST['Newfrequency'];
    $newdescription = $_POST['Newdescription'];
    $newcost = $_POST['Newcost'];
    $newdate = $_POST['Newdate'];
    $newstatus = $_POST['Newstatus'];
    $newinvoiceNo = $_POST['NewinvoiceNo'];
    $newcomments = $_POST['Newcomments'];
    $newvendor = $_POST['Newvendor'];
    $updatequery = "UPDATE subcon SET name = '$name', work = '$work', pay = '$pay', id = '$id' WHERE id = '$id'";
    
    if (mysqli_query($conn, $updatequery)) {
        echo "Update done!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    $updateoverhead = "UPDATE overhead SET name = '$newname', vendor = '$newvendor', category = '$newcategory', frequency = '$newfrequency', description = '$newdescription', cost = '$newcost', date = '$newdate', status = '$newstatus', invoiceNo = '$newinvoiceNo', comments = '$newcomments' WHERE id = '$id'";
    if(mysqli_query($conn, $updateoverhead)){
        echo "Left to pay updated successfully.";
        header('Location: /IA/overheadprojectview.php');
    } else {
        echo "error updating: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
