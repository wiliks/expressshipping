
<?php 

 
require_once "admin/functions/db.php";

$ID =$_POST["ID"];

    if (isset($_POST["submit"])) {
      // Add task to DB
     // $sql2 = "SELECT EXISTS(SELECT * from package WHERE ID=$ID);";
      $sql2 = "SELECT * from package WHERE ID=$ID";
  
      $stmt = $db->prepare($sql2);
      $stmt->execute($sql2);
      $row2=mysqli_fetch_array($stmt);
  
  
      try {
          if($row2==1){
        header('Location:package.php?found');
          }else{
            header('Location:index.php?notfound');
          }
        }
  
       catch (Exception $e) {
          $e->getMessage();
          echo "Error";
      }
    }else{
      echo "errorr";
    }

	

?>