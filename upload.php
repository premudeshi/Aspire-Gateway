<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $str = test_input($_POST["upload"]);


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$values = explode(" ", $str);


$number = $values[0]; // piece1

$upload = $values[1];


echo $number . " number<br>";
echo $upload . " Upload<br>";

?>
<html>


<form action="ud.php" method="POST" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" />

       <input type="checkbox" required name="confirm" value="<?php echo $number . ' ' . $upload; ?>"> Confirm Upload<br>

     <input type="submit" value="Upload File" />

</form>


</html>