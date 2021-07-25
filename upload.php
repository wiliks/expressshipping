<?php
$servername = "localhost";
$username = "aaa";
$password = "aaa";
$dbname = "aaa";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $name = $_POST['name'];
    $image =  getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $target_dir = "uploads/";
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $target_dir="uploads/others/";
        echo "File is not an image.";
        $uploadOk = 1;
    }
}
$target_file = $target_dir . "post1.png";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 1;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 1;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo $name;


        $sql = "INSERT INTO test(name,img)
VALUES ('williams',$image)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?> 
<img src="uploads/post1.png" alt="no pic">