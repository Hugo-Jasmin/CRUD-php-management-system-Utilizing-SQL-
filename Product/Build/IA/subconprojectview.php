<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('This path is restricted go back to index.php!');</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>subcontractor database</title>
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
              <li><a class="dropdown-item" href="/IA/overhead/createoverhead.php">overhead</a></li>
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

<div class="row justify-content-center">
<div class="col-9">
  
  <span class="me-2">databases:</span>
  <div class="btn-group">
    <a href="employeeprojectview.php" class="btn btn-primary active" aria-current="page">Employee</a>
    <a href="" class="btn btn-primary active" aria-current="page">subcontractor</a>
    <a href="overheadprojectview.php" class="btn btn-primary active" aria-current="page">overhead</a>
      </div>
    </div>
  </div>

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-md-5 order-md-2">

        <?php
        ///just put this here so i can call it down the ladder, 
    $servername = "localhost";
    $username = "u855808231_root"; 
    $password = "Memeikaykenjay1"; 
    $dbname = "u855808231_huyo"; 
              $conn = mysqli_connect($servername, $username, $password, $dbname);
              if (!$conn) {
                  die("error with connection: " . mysqli_connect_error());
              }
      ?>
      
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Filters</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Operations</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"> 
    
<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
    <br>
<a>To search from the database, fill in general search, to filter fields and find better results you can adjust search parameters, to clear empty out general search and enter.</a>
    <div>
    <form method="post">
      <br>
      <input type="text" placeholder="Search data" name="search">
      <button type="submit" name="generalsubmit">General Search</button>
    </form>
    </div>
    <br>
<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
    <div class="card">
  <h7 class="card-header">filter searches</h7>
  <div class="card-body">
    <p class="card-text">
      <form method="post">
      <div class="row justify-content-start">
      <div class="col-4">
      Select id range, leave blank if none.
      <br>
      <br>
      <input type="number" placeholder="id lower limit" name="startidsearch">
      <br>
      <input type="number" placeholder="id upper limit" name="endidsearch">
      <br>
      <input type="text" placeholder="Search name" name="namesearch">
      <br>
      </div>
      <div class="col-4">
      <br>
      <br>
      <br>
      <input type="text" placeholder="Search work" name="worksearch">
      <br>
      <input type="number" placeholder="pay lower limit" name="startpaysearch">
      <br>
      <input type="number" placeholder="pay upper limit" name="endpaysearch">
      <br>
      </div>
      <div class="col-4">
      <br>
      <br>
      <br>
      <input type="number" placeholder="payleft lower limit" name="startnewPaysearch">
      <br>
      <input type="number" placeholder="payleft upper limit" name="endnewPaysearch">
      <br>
      <br>
      
      <button type="submit" name="submit">search</button>
      </div>
            </div>
    </form>
  </p>
  <?php
  if (isset($_POST['generalsubmit'])) {
    $search = $_POST['search'];
    $searchquery = "SELECT * FROM subcon WHERE id = '$search' OR name LIKE '%$search%' OR work LIKE '%$search%' OR pay LIKE '%$search%' OR newPay LIKE '%$search%' OR comments LIKE '%$search%'";
    $result1 = mysqli_query($conn, $searchquery);
  }
  elseif (isset($_POST['submit'])) {
    $namesearch = $_POST['namesearch'];
    $worksearch = $_POST['worksearch'];

    $selectidquery = "SELECT * FROM subcon";
    $startidsearch = $_POST['startidsearch'] ?? null;
    $endidsearch = $_POST['endidsearch'] ?? null;

    $selectpayquery = "SELECT * FROM subcon";
    $startpaysearch = $_POST['startpaysearch'] ?? null;
    $endpaysearch = $_POST['endpaysearch'] ?? null;

    $selectnewPay = "SELECT * FROM subcon";
    $startnewPaysearch = $_POST['startnewPaysearch'] ?? null;
    $endnewPaysearch = $_POST['endnewPaysearch'] ?? null;

    $minimumandmaximum = "SELECT MIN(id) AS minid, MAX(id) AS maxid FROM subcon";
    $minandmaxpay = "SELECT MIN(pay) AS minpay, MAX(pay) AS maxpay FROM subcon";
    $minmaxnewPay = "SELECT MIN(newPay) AS minnewPay, MAX(newPay) AS maxnewPay FROM subcon";

    $idresult = mysqli_query($conn, $minimumandmaximum);
    $defaultrow = mysqli_fetch_assoc($idresult);

    $payresult = mysqli_query($conn, $minandmaxpay);
    $defaultpayrow = mysqli_fetch_assoc($payresult);

    $newPayresult = mysqli_query($conn, $minmaxnewPay);
    $defaultnewPayrow = mysqli_fetch_assoc($newPayresult);
    if (empty($startidsearch)) {
        $startidsearch = $defaultrow['minid'];
    }
    if (empty($endidsearch)) {
      $endidsearch = $defaultrow['maxid'];
    }
    if (empty($startpaysearch)) {
      $startpaysearch = $defaultpayrow['minpay'];
    }
    if (empty($endpaysearch)) {
    $endpaysearch = $defaultpayrow['maxpay'];
    }
    if (empty($startnewPaysearch)) {
      $startnewPaysearch = $defaultnewPayrow['minnewPay'];
    }
    if (empty($endnewPaysearch)) {
    $endnewPaysearch = $defaultnewPayrow['maxnewPay'];
    }

    // Execute the min/max query
    $filterquery = "SELECT * FROM subcon WHERE name LIKE '%$namesearch%' AND id BETWEEN $startidsearch AND $endidsearch AND work LIKE '%$worksearch%' AND newPay BETWEEN $startnewPaysearch AND $endnewPaysearch";
    $queryresults = mysqli_query($conn, $filterquery);
    
  }
  ?>
  </div>



  </div>
<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
<?php
  if (isset($_POST['generalsubmit'])) {
    $search = $_POST['search'];
    $sumquerygeneral = "SELECT SUM(pay) AS totalpay FROM subcon WHERE id = '$search' OR name LIKE '%$search%' OR work LIKE '%$search%' OR pay LIKE '%$search%' OR newPay LIKE '%$search%'";
    $sumleftpaygeneral = "SELECT SUM(newPay) AS totalleftpay FROM subcon WHERE id = '$search' OR name LIKE '%$search%' OR work LIKE '%$search%' OR pay LIKE '%$search%' OR newPay LIKE '%$search%'";

    $sumresult = mysqli_query($conn, $sumquerygeneral);
    $sumleftpay = mysqli_query($conn, $sumleftpaygeneral);

    if ($sumresult) {
        ?>
        <br>
        <?php
        $row = mysqli_fetch_assoc($sumresult);
        $totalwage = $row['totalpay']; 
        $formattedtotalwage = number_format($totalwage, 0, '.', ','); 
        echo "Total agreed pay: " . $formattedtotalwage;
        $lrow = mysqli_fetch_assoc($sumleftpay);
        $totalLpay = $lrow['totalleftpay']; 
        $formattedtotalLpay = number_format($totalLpay, 0, '.', ','); 
        ?>
        <br>
        <?php
        echo "Total left pay: " . $formattedtotalLpay;

    }
 ##unrelated   
    $searchquery = "SELECT * FROM subcon WHERE id = '$search' OR name LIKE '%$search%' OR work LIKE '%$search%' OR pay LIKE '%$search%' OR newPay LIKE '%$search%'";
    $result1 = mysqli_query($conn, $searchquery);
  }
  elseif (isset($_POST['submit'])) {
    ####TAB THIS
    #### TAB THIS
    $sumqueryfilter = "SELECT SUM(pay) AS totalpay FROM subcon WHERE name LIKE '%$namesearch%' AND id BETWEEN $startidsearch AND $endidsearch AND work LIKE '%$worksearch%' AND newPay BETWEEN $startnewPaysearch AND $endnewPaysearch";
    $sumleftpaysumbit = "SELECT SUM(newPay) AS totalleftpay FROM subcon WHERE name LIKE '%$namesearch%' AND id BETWEEN $startidsearch AND $endidsearch AND work LIKE '%$worksearch%' AND newPay BETWEEN $startnewPaysearch AND $endnewPaysearch";

    $sumresult = mysqli_query($conn, $sumqueryfilter);
    $sumleftpay = mysqli_query($conn, $sumleftpaysumbit);

    if ($sumresult) {
      ?>
      <br>
      <?php
      $row = mysqli_fetch_assoc($sumresult);
      $totalwage = $row['totalpay']; 
      $formattedtotalwage = number_format($totalwage, 0, '.', ','); 
      echo "Total agreed pay: " . $formattedtotalwage;
      $lrow = mysqli_fetch_assoc($sumleftpay);
      $totalLpay = $lrow['totalleftpay']; 
      $formattedtotalLpay = number_format($totalLpay, 0, '.', ','); 
      ?>
      <br>
      <?php
      echo "Total left pay: " . $formattedtotalLpay;

}
  }
  else{
    $sumqueryfilter = "SELECT SUM(pay) AS totalpay FROM subcon";
    $sumleftpaynofilter = "SELECT SUM(newPay) AS totalleftpay FROM subcon";

    $sumresult = mysqli_query($conn, $sumqueryfilter);
    $sumleftpay = mysqli_query($conn, $sumleftpaynofilter);

    if ($sumresult) {
      $row = mysqli_fetch_assoc($sumresult);
      $totalwage = $row['totalpay']; 
      $formattedtotalwage = number_format($totalwage, 0, '.', ','); 
      echo "Total agreed pay: " . $formattedtotalwage;
      $lrow = mysqli_fetch_assoc($sumleftpay);
      $totalLpay = $lrow['totalleftpay']; 
      $formattedtotalLpay = number_format($totalLpay, 0, '.', ','); 
      ?>
      <br>
      <?php
      echo "Total left pay: " . $formattedtotalLpay;
  }
}
  
  ?>
<!--- BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAK BREAKBREAK BREAK BREAK BREAK BREAK -->
  </div>
  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
  <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
</div>
</div>

    <div class="col-md-7 order-md-1">
<!-- Table Container for the 'karyawan' table -->
<div class="table-container">
        <div class="table-responsive">
          <table class="table align-middle">
          <tr>
            <td>id</td>
            <td>name</td>
            <td>work</td>
            <td>agreed pay</td>
            <td>left to pay</td>
            <td>option</td>
              </tr>
              <?php
              
    if (isset($_POST['generalsubmit'])) {
      if ($result1) { 
      if(mysqli_num_rows($result1)>0){
 
        while ($row = mysqli_fetch_assoc($result1)) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['work'].'</td>';
            echo "<td> <a href='subcon/editpay.php?id=" . $row['id'] . "'>" . $row['pay'] . "</a></td>";
            echo '<td>'.$row['newPay'].'</td>';
            echo "<td> <a href='subcon/subconedit.php?id=" . $row['id'] . "'>EDIT</a> <a href='subcon/delete.php?id=" . $row['id'] . "'>DELETE</a></td>";        
            echo '</tr>';
        } 
      } else {
        echo '<tr>';
        echo '<td>no data found</td>';
        echo '</tr>';
        }
      }
    }
    
    elseif (isset($_POST['submit'])) {
      if ($queryresults) { 
      if(mysqli_num_rows($queryresults)>0){
 
        while ($row = mysqli_fetch_assoc($queryresults)) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['work'].'</td>';
            echo "<td> <a href='subcon/editpay.php?id=" . $row['id'] . "'>" . $row['pay'] . "</a></td>";
            echo '<td>'.$row['newPay'].'</td>';
            echo "<td> <a href='subcon/subconedit.php?id=" . $row['id'] . "'>EDIT</a> <a href='subcon/delete.php?id=" . $row['id'] . "'>DELETE</a></td>";        
            echo '</tr>';
        } 
      } else {
        echo '<tr>';
        echo '<td>no data found</td>';
        echo '</tr>';
        }
      }
    }

    else{   

      $query = "SELECT * FROM subcon";
      $result = mysqli_query($conn, $query);

      if (!$result) {
          die('Error: ' . mysqli_error($conn));
      }

      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['work'].'</td>';
        echo "<td> <a href='subcon/editpay.php?id=" . $row['id'] . "'>" . $row['pay'] . "</a></td>";
        echo '<td>'.$row['newPay'].'</td>';
        echo "<td> <a href='subcon/subconedit.php?id=" . $row['id'] . "'>EDIT</a> <a href='subcon/delete.php?id=" . $row['id'] . "'>DELETE</a></td>";        
        echo '</tr>';

      }
    }
    ?>
    

    </table>
        </div>
      </div>




</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>



