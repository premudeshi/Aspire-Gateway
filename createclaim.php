<?php require "login/loginheader.php"; 
$user = $_SESSION['username'];
require "vendor/autoload.php"; 


$link = mysql_connect("localhost", "root", "");
mysql_select_db("aspireindex", $link);


?>

<!DOCTYPE html>
<html>
<title>Vital Water Gateway</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/google.css">
<link rel="stylesheet" href="css/font-awesome.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Aspire Gateway</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
       <img src="images/logo2.png" alt="Vital Water" style="width:75px;height:75px;" class="w3-circle w3-margin-right">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $user;?></strong></span><br>
      <a href="notifyemail.php" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="login/logout.php" class="w3-bar-item w3-button"><i class="fa fa-caret-square-o-right"></i></a>
      <a href="settings.php" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="claims.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-gavel fa-fw"></i>  Claims</a>
    <a href="company.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-plus fa-fw"></i>  Register Company</a>
    <a href="document.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-paperclip fa-fw"></i>  Documents</a>
    <a href="todo.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-th-list fa-fw"></i>  To-Do</a>
    <a href="news.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h2><b><i class="fa fa-gavel"></i> Claims</b></h2>
  </header>
<div class="w3-container">

<form action="ccm.php" method="post" name="claim">
  <div class="w3-container">
    <h5>Create Claim</h5>
     <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-half" style="border: 3px solid black; border-radius: 8px;">
      <h5><b><i class="fa fa-building-o"></i> Company Information</b></h5><br>
     Insured: <br>

<select name="insured" required>  
           <?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aspireindex";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
} 

$sql = "SELECT * FROM company WHERE type = 'Insured'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value=" ' . $row["name"] . '">' . $row["name"] .  "</option>";

    }
} else {
    echo "0 results";
}


$conn->close();

  ?>
</select><br>
<br> 


      Insurance Company: <br>
      <select name="insured" required>  
           <?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aspireindex";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
} 

$sql = "SELECT * FROM company WHERE type = 'Insurance Company'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value=" ' . $row["name"] . '">' . $row["name"] .  "</option>";

    }
} else {
    echo "0 results";
}


$conn->close();

  ?>
</select><br>
<br>
    



Broker:<br> 
<select name="broker" required>  
           <?php





// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
    
} 

$sql1 = "SELECT * FROM company WHERE type = 'Broker'";
$result1 = $conn1->query($sql1);
echo '<option value=""></option>';

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo '<option value=" ' . $row["name"] . '">' . $row["name"] .  "</option>";

    }
} else {
    echo "0 results";
}


$conn1->close();

  ?>
</select><br>

      <br>
      </div>

      <div class="w3-half" style="border: 3px solid black; border-radius: 8px;">
        <h5><b><i class="fa fa-gavel"></i> Claim Informarion</b></h5><br>
      

      Claim Number: <br>
      <input type="text" name="number" required><br>
      <br>
      Date: <br> 
      <input type="date" name="date"><br></span><br>
      <br>

      Type of Claim: <br>
      <select name="type">
      <option value="Fire">Fire</option>
      <option value="Buglary">Buglary</option>
      </select>
      <br>
      <br>

      Address of Claim:<br>
      <textarea rows="4" cols="47.5" name="add">
      Enter Address here</textarea><br>
      </span><br>
      </div>
    </div>
  </div>

<input type="submit" value="Create"></span><br>



</form>
</div>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
