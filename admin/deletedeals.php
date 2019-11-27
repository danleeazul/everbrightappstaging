<?php
// include database connection
include '../config/database.php';
 
try {
    // delete query
    $query = "DELETE FROM tbl_deals";
    $stmt = $con->prepare($query);
    
    if($stmt->execute()){
       // header('Location: index.php');
        echo "<script type='text/javascript'> document.location = 'https://www.everbright.com.ph/everbrightapp/admin/dashboard.php'; </script>";
    }else{
        die('Unable to delete record.');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>