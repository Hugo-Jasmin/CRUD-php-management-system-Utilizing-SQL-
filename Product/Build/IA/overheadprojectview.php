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
    <title>overhead database</title>
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
    <a href="subconprojectview.php" class="btn btn-primary active" aria-current="page">subcontractor</a>
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
      <input type="number" placeholder="id lower limit" name="startidsearch">
      <br>
      <input type="number" placeholder="id upper limit" name="endidsearch">
      <br>
      <input type="text" placeholder="Search name" name="namesearch">
      <br>
      <input type="text" placeholder="Search vendor" name="vendorsearch">
      <br>
      <input type="text" placeholder="Search category" name="categorysearch">
      <br>
      </div>
      <div class="col-4">
      <br>
      <br>
      <input type="text" placeholder="Search frequency" name="frequencysearch">
      <br>
      <input type="text" placeholder="Search description" name="descriptionsearch">
      <br>
      <input type="number" placeholder="cost lower limit" name="startcostsearch">
      <br>
      <input type="number" placeholder="cost upper limit" name="endcostsearch">
      <br>
      <br>
      <label for="label">Date lower limit:</label>
      <input type="date" placeholder="date lower limit" name="startdatesearch">
      <br>
      <label for="label">Date upper limit:</label>
      <input type="date" placeholder="date upper limit" name="enddatesearch">
      <br>
      </div>
      <div class="col-4">
      <br>
      <br>
      <input type="text" placeholder="search status" name="statussearch">
      <br>
      <input type="number" placeholder="search invoice number" name="invoiceNosearch">
      <br>
      <input type="text" placeholder="search comments" name="commentsearch">
      <br>
      <br>
      <button type="submit" name="submit">search</button>
      </div>
      </form>
      </div>
  </p>
  <?php
  if (isset($_POST['generalsubmit'])) {
    $search = $_POST['search']; 
    $searchquery = "SELECT * FROM overhead WHERE id = '$search' OR name LIKE '%$search%' OR vendor LIKE '%$search%' OR category = '$search' OR frequency = '$search' OR description LIKE '%$search%' OR cost LIKE '%$search%' OR date LIKE '%$search%' OR status LIKE '%$search%' OR invoiceNo LIKE '%$search%' OR comments LIKE '%$search%'";
    $result1 = mysqli_query($conn, $searchquery);
  }
  elseif (isset($_POST['submit'])) {
    $namesearch = $_POST['namesearch'];
    $vendorsearch = $_POST['vendorsearch'];
    $categorysearch = $_POST['categorysearch'];
    $frequencysearch = $_POST['frequencysearch'];
    $descriptionsearch = $_POST['descriptionsearch'];
    $statussearch = $_POST['statussearch'];
    $invoiceNosearch = $_POST['invoiceNosearch'];
    $commentsearch = $_POST['commentsearch'];

    $selectidquery = "SELECT * FROM overhead";
    $startidsearch = $_POST['startidsearch'] ?? null;
    $endidsearch = $_POST['endidsearch'] ?? null;

    $selectcostquery = "SELECT * FROM overhead";
    $startcostsearch = $_POST['startcostsearch'] ?? null;
    $endcostsearch = $_POST['endcostsearch'] ?? null;

    $selectdatequery = "SELECT * FROM overhead";
    $startdatesearch = $_POST['startdatesearch'] ?? null;
    $enddatesearch = $_POST['enddatesearch'] ?? null;

    $minimumandmaximum = "SELECT MIN(id) AS minid, MAX(id) AS maxid FROM overhead";
    $minMaxcostQuery = "SELECT MIN(cost) AS mincost, MAX(cost) AS maxcost FROM overhead";
    $minMaxdateQuery = "SELECT MIN(date) AS mindate, MAX(date) AS maxdate FROM overhead";

    $idresult = mysqli_query($conn, $minimumandmaximum);
    $defaultrow = mysqli_fetch_assoc($idresult);

    $costresult = mysqli_query($conn, $minMaxcostQuery);
    $defaultcostrow = mysqli_fetch_assoc($costresult);

    $dateresult = mysqli_query($conn, $minMaxdateQuery);
    $defaultdaterow = mysqli_fetch_assoc($dateresult);
    if (empty($startidsearch)) {
        $startidsearch = $defaultrow['minid'];
    }
    if (empty($endidsearch)) {
        $endidsearch = $defaultrow['maxid'];
    }
    if (empty($startcostsearch)) {
        $startcostsearch = $defaultcostrow['mincost'];
    }
    if (empty($endcostsearch)) {
        $endcostsearch = $defaultcostrow['maxcost'];
    }
    if (empty($startdatesearch)) {
        $startdatesearch = $defaultdaterow['mindate'];
    }
    if (empty($enddatesearch)) {
        $enddatesearch = $defaultdaterow['maxdate'];
    }
    
    $filterquery = "SELECT * FROM overhead WHERE name LIKE '%$namesearch%' AND id BETWEEN '$startidsearch' AND '$endidsearch' AND vendor LIKE '%$vendorsearch%' AND category LIKE '%$categorysearch%' AND frequency LIKE '%$frequencysearch%' AND description LIKE '%$descriptionsearch%' AND status LIKE '%$statussearch%' AND invoiceNo LIKE '%$invoiceNosearch%' AND comments LIKE '%$commentsearch%' AND cost BETWEEN '$startcostsearch' AND '$endcostsearch' AND date BETWEEN '$startdatesearch' AND '$enddatesearch'";
    
    $queryresults = mysqli_query($conn, $filterquery);
    
    $sumqueryfilter = "SELECT SUM(cost) AS totalcost FROM overhead WHERE name LIKE '%$namesearch%' AND id BETWEEN '$startidsearch' AND '$endidsearch' AND vendor LIKE '%$vendorsearch%' AND category LIKE '%$categorysearch%' AND frequency LIKE '%$frequencysearch%' AND description LIKE '%$descriptionsearch%' AND status LIKE '%$statussearch%' AND invoiceNo LIKE '%$invoiceNosearch%' AND comments LIKE '%$commentsearch%' AND cost BETWEEN '$startcostsearch' AND '$endcostsearch' AND date BETWEEN '$startdatesearch' AND '$enddatesearch'";
    
    $sumresult = mysqli_query($conn, $sumqueryfilter);
    
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
    $sumquerygeneral = "SELECT SUM(cost) AS totalcost FROM overhead WHERE id = '$search' OR name LIKE '%$search%' OR vendor LIKE '%$search%' OR category = '$search' OR frequency = '$search' OR description LIKE '%$search%' OR cost LIKE '%$search%' OR date LIKE '%$search%' OR status LIKE '%$search%' OR invoiceNo LIKE '%$search%' OR comments LIKE '%$search%'";
    $sumresult = mysqli_query($conn, $sumquerygeneral);

    if ($sumresult) {
        $row = mysqli_fetch_assoc($sumresult);
        $totalcost = $row['totalcost']; // Get the sum from the query result
        $formattedtotalcost = number_format($totalcost, 0, '.', ',');
        echo "Total cost: " . $formattedtotalcost;
    }
 ##unrelated   
    $searchquery = "SELECT * FROM overhead WHERE id = '$search' OR name LIKE '%$search%' OR vendor LIKE '%$search%' OR category = '$search' OR frequency = '$search' OR description LIKE '%$search%' OR cost LIKE '%$search%' OR date LIKE '%$search%' OR status LIKE '%$search%' OR invoiceNo LIKE '%$search%' OR comments LIKE '%$search%'";
    $result1 = mysqli_query($conn, $searchquery);
  }
  elseif (isset($_POST['submit'])) {
    if ($sumresult) {
      $row = mysqli_fetch_assoc($sumresult);
      $totalcost = $row['totalcost'];
      $formattedtotalcost = number_format($totalcost, 0, '.', ',');
      echo "Total cost: " . $formattedtotalcost;
    }
  }
  else{
    $sumqueryfilter = "SELECT SUM(cost) AS totalcost FROM overhead";
    $sumresult = mysqli_query($conn, $sumqueryfilter);

    if ($sumresult) {
      $row = mysqli_fetch_assoc($sumresult);
      $totalcost = $row['totalcost'];
      $formattedtotalcost = number_format($totalcost, 0, '.', ',');
      echo "Total cost: " . $formattedtotalcost;
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
<div class="table-container">
        <div class="table-responsive">
          <table class="table align-middle">
          <tr>
            <td>id</td>
            <td>name</td>
            <td>vendor</td>
            <td>category</td>
            <td>frequency</td>
            <td>description</td>
            <td>cost</td>
            <td>date</td>
            <td>status</td>
            <td>invoice number</td>
            <td>comments</td>
            <td>OPTIONS</td>
              </tr>
              <?php
              
    if (isset($_POST['generalsubmit'])) {
      if ($result1) { 
      if(mysqli_num_rows($result1)>0){
 
        while ($row = mysqli_fetch_assoc($result1)) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['vendor'].'</td>';
            echo '<td>'.$row['category'].'</td>';
            echo '<td>'.$row['frequency'].'</td>';
            echo '<td>'.$row['description'].'</td>';
            echo '<td>'.$row['cost'].'</td>';
            echo '<td>'.$row['date'].'</td>';
            echo '<td>'.$row['status'].'</td>';
            echo '<td>'.$row['invoiceNo'].'</td>';
            echo '<td>'.$row['comments'].'</td>';
            echo "<td> <a href='/IA/overhead/overheadedit.php?id=" . $row['id'] . "'>EDIT</a> <a href='overhead/delete.php?id=" . $row['id'] . "'>DELETE</a></td>";        
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
            echo '<td>'.$row['vendor'].'</td>';
            echo '<td>'.$row['category'].'</td>';
            echo '<td>'.$row['frequency'].'</td>';
            echo '<td>'.$row['description'].'</td>';
            echo '<td>'.$row['cost'].'</td>';
            echo '<td>'.$row['date'].'</td>';
            echo '<td>'.$row['status'].'</td>';
            echo '<td>'.$row['invoiceNo'].'</td>';
            echo '<td>'.$row['comments'].'</td>';
            echo "<td> <a href='/IA/overhead/overheadedit.php?id=" . $row['id'] . "'>EDIT</a> <a href='overhead/delete.php?id=" . $row['id'] . "'>DELETE</a></td>";        
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

      $query = "SELECT * FROM overhead"; 

      $result = mysqli_query($conn, $query);

      if (!$result) {
          die('Error: ' . mysqli_error($conn));
      }

      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['vendor'].'</td>';
        echo '<td>'.$row['category'].'</td>';
        echo '<td>'.$row['frequency'].'</td>';
        echo '<td>'.$row['description'].'</td>';
        echo '<td>'.$row['cost'].'</td>';
        echo '<td>'.$row['date'].'</td>';
        echo '<td>'.$row['status'].'</td>';
        echo '<td>'.$row['invoiceNo'].'</td>';
        echo '<td>'.$row['comments'].'</td>';
        echo "<td> <a href='/IA/overhead/overheadedit.php?id=" . $row['id'] . "'>EDIT</a> <a href='overhead/delete.php?id=" . $row['id'] . "'>DELETE</a></td>";        
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



