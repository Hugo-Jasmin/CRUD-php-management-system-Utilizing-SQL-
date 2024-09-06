<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('This path is restricted go back to index.php!');</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>edit pay</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .table-container {
                border: 2px solid #dee2e6;  
                overflow: hidden;
                padding: 0;
            }
            .container {
                border: 2px solid #dee2e6;
            }
        </style>
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      function employeehistorypopup() {
      window.open("/IA/ledger/employee.php", "HistoryPopup", "width=800,height=600");
      }
      function overheadhistorypopup() {
      window.open("/IA/ledger/overhead.php", "HistoryPopup", "width=800,height=600");
      }
      function subconhistorypopup() {
      window.open("/IA/ledger/subcon.php", "HistoryPopup", "width=800,height=600");
      }
      </script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <a class="navbar-brand" href="/IA/employeeprojectview.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/IA/management.php">management</a>
          </li>



          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              History View
          </a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" onclick="employeehistorypopup();">employee history</a></li>
              <li><a class="dropdown-item" onclick="subconhistorypopup();">subcon history</a></li>
              <li><a class="dropdown-item" onclick="overheadhistorypopup();">overhead history</a></li>
          </ul>
          </li>


          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Add
          </a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/IA/employee/createkaryawan.php">employee</a></li>
              <li><a class="dropdown-item" href="/IA/subcon/createsubcon.php">subcon</a></li>
              <li><a class="dropdown-item" href="/IA/overhead/overhead.html">overhead</a></li>
          </ul>
          </li>
          <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true"> Anugerah Cipta Aestetika™ Architechtures</a>
          </li>
      </ul>
      </div>
  </div>
  </nav>
  <!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
        <br>
        <br>
<?php
    $servername = "localhost";
    $username = "u855808231_root"; 
    $password = "Memeikaykenjay1"; 
    $dbname = "u855808231_huyo"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("error with connection: " . mysqli_connect_error());
}
             $id=$_GET['id'];
             $data=mysqli_query($conn,"select * from subcon where id='$id'");

             while($d=mysqli_fetch_array($data))
            
        {
    $formattedpay = number_format($d['pay'], 0, '.', ',');
    $formattednewPay = number_format($d['newPay'], 0, '.', ',');
?>
<!-- 
BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
            <center>
    <div class="container">
        <p>Money agreed to pay: <a><?php echo $formattedpay; ?></a></p>
        <p>Money left to pay<a><?php echo $formattednewPay; ?></a></p>
        <form action="updatepay.php" method="POST">    
			<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
            <label for="label">subtract from left to pay:</label>
            <input type="number" id="addPay" name="addPay" required><br>
            <label for="label">add to left to pay:</label>
            <input type="number" id="subPay" name="subPay" required><br>
            <br>
            <input type="submit" value="Register">
        </form>
        <center>
        <?php
            }
            ?>
    </div>
</body>
</html>
