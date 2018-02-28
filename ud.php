
<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $str = test_input($_POST["confirm"]);


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







$imageFileType = strtolower(pathinfo($_FILES["file"]["name"] ,PATHINFO_EXTENSION));




$path = $_FILES['file']['name'];
$imageFileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
$target_dir = "server/" . $number . "/";
$target_file = $target_dir . $upload . ".". $imageFileType ;
$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


$link = mysqli_connect("localhost", "root", "", "aspireindex");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution
$sql = "UPDATE documents SET " . $upload . "='1' WHERE number= '$number'";
if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}




// close the FTP stream 
//ftp_close($conn_id);





?>




<?php

?>