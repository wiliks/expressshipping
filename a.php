<?php
$servername = "localhost";
$username = "aaa";
$password = "aaa";
$dbname = "company";
$NumberOfPost=0;

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT COUNT(*) as $NumberOfPost FROM posts;";
//-- Insert Data Into DB --//

$result = $conn->query($sql);
$sql_posts = "SELECT * FROM posts";
 $query_posts = mysqli_query($conn, $sql_posts);
 $a=mysqli_num_rows($query_posts);
if ($a==4) {
    # code...
    echo"yes";
}

?>
