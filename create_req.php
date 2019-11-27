<?php
// core configuration
include_once "config/core.php";

// include login checker
//$require_login=true;
//include_once "login_checker_two.php";

 // to prevent undefined index notice
 $action = isset($_GET['action']) ? $_GET['action'] : "";
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Everbright App</title>
      
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

      <link href="https://www.everbright.com.ph/everbrightapp/libs/css/form-validation.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
    <div class="py-5 text-center">
        <h2>Add Requirements</h2>
    </div>
        <!-- PHP insert code will be here -->
        <?php

// include login checker
$require_login=true;
include_once "login_checker.php";

 // to prevent undefined index notice
 $action = isset($_GET['action']) ? $_GET['action'] : "";

if($_POST){
 
    // include database connection
    include 'database.php';

    try{
     
        // insert query
        $query = "INSERT INTO tbl_requirements SET name=:name, building=:building, location=:location, type=:type, requirements=:requirements, price=:price";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $building=htmlspecialchars(strip_tags($_POST['building']));
        $location=htmlspecialchars(strip_tags($_POST['location']));
        $type=htmlspecialchars(strip_tags($_POST['type']));
        $requirements=htmlspecialchars(strip_tags($_POST['requirements']));
        $price=htmlspecialchars(strip_tags($_POST['price']));




        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':building', $building);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':requirements', $requirements);
        $stmt->bindParam(':price', $price);

        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
            
        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}


?>
 
<!-- html form here where the product information will be entered -->
<form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <!--DEALS-->
      <hr class="mb-4">
       <div class="row">
               <div class="col-md-4 mb-3">
               <label for="lastName">Name</label>
                    <select class="custom-select d-block w-100" name="name" id="nameimage" onchange="GetSelectedValue()" required>
                      <option value="">Select...</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-MsPatty.png">Ms. Patty</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-SirMarion.png">Sir Marion</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Joana.png">Joana Marie Legaspi</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Aj.png">Aira Joy Lim</option> 
                      <option value="https://www.everbright.com.ph/headshot/EB-Nica.png">Nica Ginez</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Demi.png">Demi Dela Cruz</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Bry.png">Bryan Sam Asis</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Renz.png">Renz Ocampo</option>
                    </select>    
                    <div class="invalid-feedback">
                    Select Agents/Brokers
                    </div>         
               </div>
 
              <div class="col-md-4 mb-3">
                 <label for="firstName">Building</label>
                 <input type="text" class="form-control" name="building" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid building is required.
                    </div>  
              </div>
 
             <div class="col-md-4 mb-3">
               <label for="firstName">Location</label>
               <select class="custom-select d-block w-100" name="location" required>
                  <option value="">Select...</option>
                  <option value="Antipolo">Antipolo</option>
                  <option value="Bataan">Bataan</option>
                  <option value="Batangas">Batangas</option>
                  <option value="Bulacan">Bulacan</option>
                  <option value="Cavite">Cavite</option>
                  <option value="Laguna">Laguna</option>
                  <option value="Makati">Makati</option>
                  <option value="Mandaluyong">Mandaluyong</option>
                  <option value="Marikina">Marikina</option>
                  <option value="Muntinlupa">Muntinlupa</option>
                  <option value="Parañaque">Parañaque</option>
                  <option value="Pasay">Pasay</option>
                  <option value="13">Quezon City</option>
                  <option value="Quezon City">San Juan</option>
                  <option value="Taguig">Taguig</option>
                  <option value="Zambales">Zambales</option>
                </select>                   
                <div class="invalid-feedback">
                    Valid location is required.
                    </div>  
            </div>
 
            <div class="col-md-4 mb-3">
                <label for="lastName">Type</label>
                    <select class="custom-select d-block w-100" name="type" required>
                      <option value="">Select...</option>
                      <option value="Sale">Sale</option> 
                      <option value="Rent">Rent</option>
                    </select>            
                    <div class="invalid-feedback">
                    Valid property type is required.
                    </div>  
           </div>
    
            <div class="col-md-4 mb-3">
            <label for="firstName">Price</label>
             <input type="text" class="form-control" name="price" placeholder="Php" value="" required> 
             <small id="emailHelp" class="form-text text-muted">You can input a text eg. 10M | FMV | 100K-200K | 1K/SQM</small>
             <div class="invalid-feedback">
                    Valid price is required.
            </div>      
           </div>
 
          <div class="col-md-12 mb-3">
             <label for="firstName">Specification</label>
             <textarea class="form-control" id="exampleFormControlTextarea1" name="requirements" rows="3" required></textarea>      
             <div class="invalid-feedback">
                    Valid specification is required.
            </div>      
          </div>


       </div>
            <hr class="mb-4">
            <div class="text-right">
            <?php
                  if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
                      //header("Location: {$home_url}admin/dashboard.php");
                      echo "            <a href='{$home_url}admin/dashboard.php'><button type='button' href='{$home_url}admin/dashboard.php' class='btn btn-outline-secondary'>Cancel</button></a>                  ";
                  }
                  if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Customer"){
                    echo "            <a href='dashboard.php'><button type='button' href='dashboard.php' class='btn btn-outline-secondary'>Cancel</button></a>                  ";
                  }
            ?>
            <!-- <a href='dashboard.php'><button type="button" href='dashboard.php' class="btn btn-outline-secondary">Cancel</button></a> -->
            <button type="submit" value='Save'  class="btn btn-primary">Submit</button>
            </div>
            

          
</form>
        
    </div> <!-- end .container -->
      
    <p id="image" style="visibility: hidden;"  name="image">url</p>     


 <!-- Optional JavaScript -->


 <script>
function GetSelectedValue(){
  var e = document.getElementById("nameimage");
  var result = e.options[e.selectedIndex].value;
  var unitcode = result

document.getElementById("image").innerHTML = unitcode;
}

    </script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://everbright.com.ph/everbrightapp//libs/js/form-validation.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
  
</body>
</html>
