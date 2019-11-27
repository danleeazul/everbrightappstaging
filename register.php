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

      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
    <div class="py-5 text-center">
        <h2>Register User</h2>
    </div>
        <!-- PHP insert code will be here -->
        <?php


if($_POST){
 
    // include database connection
    include 'database.php';

    try{
     
        // insert query
        $query = "INSERT INTO tbl_users SET firstname=:firstname, middlename=:middlename, lastname=:lastname, position=:position, email=:email, contact_number=:contact_number, birthdate=:birthdate, address=:address, password=:password, sss=:sss, pagibig=:pagibig, tin=:tin, access_level=:access_level, status=:status, image=:image";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $firstname=htmlspecialchars(strip_tags($_POST['firstname']));
        $middlename=htmlspecialchars(strip_tags($_POST['middlename']));
        $lastname=htmlspecialchars(strip_tags($_POST['lastname']));
        $address=htmlspecialchars(strip_tags($_POST['address']));
        $birthdate=htmlspecialchars(strip_tags($_POST['birthdate']));
        $contact_number=htmlspecialchars(strip_tags($_POST['contact_number']));
        $position=htmlspecialchars(strip_tags($_POST['position']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
        $password=htmlspecialchars(strip_tags($_POST['password']));
        $status=htmlspecialchars(strip_tags($_POST['status']));
        $access_level=htmlspecialchars(strip_tags($_POST['access_level']));
        $sss=htmlspecialchars(strip_tags($_POST['sss']));
        $pagibig=htmlspecialchars(strip_tags($_POST['pagibig']));
        $tin=htmlspecialchars(strip_tags($_POST['tin']));

        // new 'image' field
        $image=!empty($_FILES["image"]["name"])
                ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"])
                : "";
        $image=htmlspecialchars(strip_tags($image));



        // bind the parameters
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':middlename', $middlename);
        $stmt->bindParam(':lastname', $lastname);  
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact_number', $contact_number);
        $stmt->bindParam(':address', $address);
        //$stmt->bindParam(':password', $password);
        $stmt->bindParam(':sss', $sss);
        $stmt->bindParam(':pagibig', $pagibig);
        $stmt->bindParam(':tin', $tin);
        $stmt->bindParam(':access_level', $access_level);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':image', $image);
  

        // hash the password before saving to database
         $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);

        $birthdate = date('Y-m-d', strtotime($birthdate));
         $stmt->bindParam(':birthdate', $birthdate);


         // now, if image is not empty, try to upload the image
        if($image){
        
            // sha1_file() function is used to make a unique file name
            $target_directory = "uploads/";
            $target_file = $target_directory . $image;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        
            // error message is empty
            $file_upload_error_messages="";

            // make sure that file is a real image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check!==false){
                // submitted file is an image
            }else{
                $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
            }

            // make sure certain file types are allowed
            $allowed_file_types=array("jpg", "jpeg", "png");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Only JPG, JPEG, PNG files are allowed.</div>";
            }


            // make sure the 'uploads' folder exists
            // if not, create it
            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }

            // if $file_upload_error_messages is still empty
            if(empty($file_upload_error_messages)){
                // it means there are no errors, so try to upload the file
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    // it means photo was uploaded
                }else{
                    echo "<div class='alert alert-danger'>";
                        echo "<div>Unable to upload photo.</div>";
                        echo "<div>Update the record to upload photo.</div>";
                    echo "</div>";
                }
            }
            
            // if $file_upload_error_messages is NOT empty
            else{
                // it means there are some errors, so show them to user
                echo "<div class='alert alert-danger'>";
                    echo "<div>{$file_upload_error_messages}</div>";
                    echo "<div>Update the record to upload photo.</div>";
                echo "</div>";
            }
        
        }

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
<form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
      <!--DEALS-->
      <hr class="mb-4">
      <h4 class="mb-3">Employee Information</h4>
       <div class="row">
               <div class="col-md-4 mb-3">
               <label for="lastName">First Name</label>
               <input type="text" class="form-control" name="firstname" placeholder="" value="" required>  
                    <div class="invalid-feedback">
                    Valid First name is required.
                    </div>         
               </div>
 
              <div class="col-md-4 mb-3">
                 <label for="firstName">Middle Name</label>
                 <input type="text" class="form-control" name="middlename" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid Middle Name is required.
                    </div>  
              </div>

              <div class="col-md-4 mb-3">
                 <label for="firstName">Last Name</label>
                 <input type="text" class="form-control" name="lastname" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid Last Name is required.
                    </div>  
              </div>
 
              <div class="col-md-12 mb-3">
                 <label for="firstName">Address</label>
                 <input type="text" class="form-control" name="address" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid Address is required.
                    </div>  
              </div>
            </div>
 
            <div class="row">
            <div class="col-md-4 mb-3">
                <label for="lastName">Birthdate</label>
                <input id="birthdate" class="form-control" name="birthdate" width="auto" onchange="getDate()" required />
                    <div class="invalid-feedback">
                    Valid Birthdate is required.
                    </div>  
           </div>
    
            <div class="col-md-4 mb-3">
            <label for="firstName">Contact No</label>
            <input type="text" class="form-control" name="contact_number" placeholder="" value="" onkeypress="return isNumberKey(event)"  required>    
             <div class="invalid-feedback">
                    Valid Contact Number
                </div>      
           </div>

           <div class="col-md-4 mb-3">
                 <label for="firstName">Position</label>
                 <input type="text" class="form-control" name="position" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid Position is required.
                    </div>  
              </div>

              <div class="col-md-4 mb-3">
              <label for="firstName">Picture</label>
              <input type="file" class="form-control" name="image">  

                 <div class="invalid-feedback">
                    Valid Photo is required.
                    </div>  
              </div>

              <input name="status" value="0" style="visibility: hidden;">
              <input name="access_level" value="Customer" style="visibility: hidden;">
           </div> <!--Row -->

           <h4 class="mb-3">Login Credentials</h4>
           <div class="row">
           <div class="col-md-4 mb-3">
                 <label for="firstName">Username</label>
                 <input type="text" class="form-control" name="email" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid username is required.
                 </div>  
              </div>

              <div class="col-md-4 mb-3">
                 <label for="firstName">Password</label>
                 <input type="password" class="form-control" name="password" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid Password is required.
                    </div>  
              </div>
             </div> <!-- ROW -->
 
           <h4 class="mb-3">Government ID's</h4>
           <div class="row">
           <div class="col-md-4 mb-3">
                 <label for="firstName">SSS No</label>
                 <input type="text" class="form-control" name="sss" onkeypress="return isNumberKey(event)" placeholder="" value="">  
                  
              </div>
              <div class="col-md-4 mb-3">
                 <label for="firstName">PagIbig No</label>
                 <input type="text" class="form-control" name="pagibig" onkeypress="return isNumberKey(event)" placeholder="" value="">  
                 
              </div>
              <div class="col-md-4 mb-3">
                 <label for="firstName">Tin No</label>
                 <input type="text" class="form-control" name="tin" onkeypress="return isNumberKey(event)" placeholder="" value="">  
                 
              </div>

       </div>
            <hr class="mb-4">
            <div class="text-right">
            <a href='/everbrightapp/admin/users.php'><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
            <button type="submit" value='Save'  class="btn btn-primary">Submit</button>
            <br />
            <br />
            </div>
            
</div><!--  Row -->
          
</form>
        
    </div> <!-- end .container -->
      
    <!-- <p id="image" style="visibility: hidden;"  name="image">url</p>      -->


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

$('#birthdate').datepicker({
            uiLibrary: 'bootstrap4',
            //format: 'yyyy-mm-dd'
        });

 function getDate(){
   var x = document.getElementById("birthdate").value;
   document.getElementById("deals_datex").innerHTML = x;
 }


    </script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://everbright.com.ph/everbrightapp//libs/js/form-validation.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
  
</body>
</html>
