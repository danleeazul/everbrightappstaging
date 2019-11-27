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
        <h2>New Contract Signed</h2>
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
        $query = "INSERT INTO tbl_deals SET name=:name, building=:building, unit_no=:unit_no, type=:type, price=:price, deals_date=:deals_date";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $building=htmlspecialchars(strip_tags($_POST['building']));
        $unit_no=htmlspecialchars(strip_tags($_POST['unit_no']));
        $type=htmlspecialchars(strip_tags($_POST['type']));
        $price=htmlspecialchars(strip_tags($_POST['price']));
        $deals_date=htmlspecialchars(strip_tags($_POST['deals_date']));




        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':building', $building);
        $stmt->bindParam(':unit_no', $unit_no);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':price', $price);


        $deals_date = date('Y-m-d', strtotime($deals_date));
         $stmt->bindParam(':deals_date', $deals_date);
         
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
                      <option value="https://www.everbright.com.ph/headshot/EB-SirAlvin.png">Sir Alvin</option>
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
                 <label for="firstName">Building<span class="text-muted"> / Parking</span></label>
                 <input type="text" class="form-control" name="building" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid building or parking is required.
                    </div>   
              </div>
 
             <div class="col-md-4 mb-3">
               <label for="firstName">Unit No<span class="text-muted"> / Parking Slot</span></label>
               <input type="text" class="form-control" name="unit_no" placeholder="" value="" required> 
               <div class="invalid-feedback">
                    Valid unit no or parking slot no is required.
                    </div>       
            </div>
 
            <div class="col-md-4 mb-3">
                <label for="lastName">Type</label>
                    <select class="custom-select d-block w-100" name="type" required>
                      <option value="">Select...</option>
                      <option value="Sale">Sale</option> 
                      <option value="Rent">Rent</option>
                      <option value="Rent">Renewal</option>
                    </select> 
                    <div class="invalid-feedback">
                    Valid type is required.
                    </div>             
           </div>
 
          <div class="col-md-4 mb-3">
             <label for="firstName">Price</label>
             <input type="text" class="form-control" name="price" placeholder="Php" value="" onkeypress="return isNumberKey(event)"  required>    
             <div class="invalid-feedback">
                    Valid price is required.
                    </div>         
          </div>

          <div class="col-md-4 mb-3">
             <label for="firstName">Date Contract Signed</label>
             <input id="deals_dates" class="form-control" name="deals_date" width="auto" onchange="getDate()" required />
             <div class="invalid-feedback">
                    Valid date contract signed is required.
            </div>  
          </div>

       </div>
        <!-- <p id="deals_datex"></p>  -->



         
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
            <button type="submit" value='Save'  class="btn btn-primary">Submit</button>
            
            </div>
            

          
</form>
        
    </div> <!-- end .container -->
      

      <p id="image" style="visibility: hidden;"  name="image">url</p>     

 <!-- Optional JavaScript -->


 <script>
function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }


          (function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())

$('#deals_dates').datepicker({
            uiLibrary: 'bootstrap4',
            //format: 'yyyy-mm-dd'
        });

 function getDate(){
   var x = document.getElementById("deals_dates").value;
   document.getElementById("deals_datex").innerHTML = x;
 }


function GetSelectedValue(){
  var e = document.getElementById("nameimage");
  var result = e.options[e.selectedIndex].value;
  var unitcode = result

document.getElementById("image").innerHTML = unitcode;
}
    </script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://everbright.com.ph/everbrightapp//libs/js/form-validation.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
  
</body>
</html>
