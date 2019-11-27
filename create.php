<!DOCTYPE HTML>
<html>
<head>
    <title>Everbright App</title>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <link href="https://www.everbright.com.ph/everbrightapp//libs/css/form-validation.css" rel="stylesheet" type="text/css"/>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
     


    <!-- container -->
    <div class="container">
   
        
      
    <!-- html form to create product will be here -->
    <!-- PHP insert code will be here -->
    <?php
        if($_POST){
 
            // include database connection
            include 'config/database.php';
 
                try{
                
                    // insert query
                    $query = "INSERT INTO tbl_listings SET code=:code, type=:type, direct=:direct, property_type=:property_type,
                    city=:city, neigborhood=:neigborhood, building=:building, unit_no=:unit_no, unit_type=:unit_type, size=:size,
                    selling_price=:selling_price, rent_price=:rent_price, parking=:parking, inclusions=:inclusions, terms=:terms,
                    availability=:availability, notes=:notes, owner=:owner, contact=:contact, broker=:broker, listed_by=:listed_by,
                    source=:source, encoded_by=:encoded_by, created=:created, modified=:modified";
            
                    // prepare query for execution
                    $stmt = $con->prepare($query);
            
                    // posted values
                    $code=htmlspecialchars(strip_tags($_POST['code']));
                    $type=htmlspecialchars(strip_tags($_POST['type']));
                    $direct=htmlspecialchars(strip_tags($_POST['direct']));
                    $property_type=htmlspecialchars(strip_tags($_POST['property_type']));
                    $city=htmlspecialchars(strip_tags($_POST['city']));
                    $neigborhood=htmlspecialchars(strip_tags($_POST['neigborhood']));
                    $building=htmlspecialchars(strip_tags($_POST['building']));
                    $unit_no=htmlspecialchars(strip_tags($_POST['unit_no']));
                    $unit_type=htmlspecialchars(strip_tags($_POST['unit_type']));
                    $size=htmlspecialchars(strip_tags($_POST['size']));
                    $selling_price=htmlspecialchars(strip_tags($_POST['selling_price']));
                    $rent_price=htmlspecialchars(strip_tags($_POST['rent_price']));
                    $inclusions=htmlspecialchars(strip_tags($_POST['inclusions']));
                    $terms=htmlspecialchars(strip_tags($_POST['terms']));
                    $availability=htmlspecialchars(strip_tags($_POST['availability']));
                    $notes=htmlspecialchars(strip_tags($_POST['notes']));
                    $owner=htmlspecialchars(strip_tags($_POST['owner']));
                    $contact=htmlspecialchars(strip_tags($_POST['contact']));
                    $broker=htmlspecialchars(strip_tags($_POST['broker']));
                    $listed_by=htmlspecialchars(strip_tags($_POST['listed_by']));
                    $source=htmlspecialchars(strip_tags($_POST['source']));
                    $encoded_by=htmlspecialchars(strip_tags($_POST['encoded_by']));
            
                    // bind the parameters
                    $stmt->bindParam(':code', $code);
                    $stmt->bindParam(':type', $type);
                    $stmt->bindParam(':direct', $direct);
                    $stmt->bindParam(':property_type', $property_type);
                    $stmt->bindParam(':city', $city);
                    $stmt->bindParam(':neigborhood', $neigborhood);
                    $stmt->bindParam(':building', $building);
                    $stmt->bindParam(':unit_no', $unit_no);
                    $stmt->bindParam(':unit_type', $unit_type);
                    $stmt->bindParam(':size', $size);
                    $stmt->bindParam(':selling_price', $selling_price);
                    $stmt->bindParam(':rent_price', $rent_price);
                    $stmt->bindParam(':parking', $parking);
                    $stmt->bindParam(':inclusions', $description);
                    $stmt->bindParam(':terms', $terms);
                    $stmt->bindParam(':availability', $availability);
                    $stmt->bindParam(':notes', $notes);
                    $stmt->bindParam(':owner', $owner);
                    $stmt->bindParam(':contact', $contact);
                    $stmt->bindParam(':broker', $broker);
                    $stmt->bindParam(':listed_by', $listed_by);
                    $stmt->bindParam(':source', $source);
                    $stmt->bindParam(':encoded_by', $encoded_by);
                    // specify when this record was inserted to the database
                    $created=date('Y-m-d H:i:s');
                    $stmt->bindParam(':created', $created);
                    
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

<div class="py-5 text-center">
        <h2>Listings Form</h2>
      </div>
    
        <div class="py-5">
          <h4 class="mb-3">Location</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="firstName">Building Name</label>
                <input type="text" class="form-control" id="buildingname" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Building name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="lastName">City</label>
                <select class="custom-select d-block w-100" id="city" required>
                  <option value="">Select...</option>
                  <option value="17">Antipolo</option>
                  <option value="6">Bataan</option>
                  <option value="15">Batangas</option>
                  <option value="16">Bulacan</option>
                  <option value="13">Cavite</option>
                  <option value="7">Laguna</option>
                  <option value="1">Makati</option>
                  <option value="4">Mandaluyong</option>
                  <option value="18">Marikina</option>
                  <option value="8">Muntinlupa</option>
                  <option value="13">Parañaque</option>
                  <option value="11">Pasay</option>
                  <option value="13">Quezon City</option>
                  <option value="5">San Juan</option>
                  <option value="2">Taguig</option>
                  <option value="19">Zambales</option>
                </select>                
                <div class="invalid-feedback">
                  Valid City is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="zip">Neighborhood</label>
                <select class="custom-select d-block w-100" id="neighborhood" required>
                  <option value="">Select...</option>
                  <option>Addition Hills</option>
                  <option>Alabang</option>
                  <option>Alabang West</option>
                  <option>Anvaya Cove</option>
                  <option>Ayala Center</option>
                  <option>Ayala Westgrove Heights</option>
                  <option>Bacao</option>
                  <option>Bagong Ilog</option>
                  <option>Balintawak</option>
                  <option>Bambang</option>
                  <option>Batasan Hills</option>
                  <option>Bayshore City</option>
                  <option>Bel-Air Village</option>
                  <option>BGC</option>
                  <option>Capitol Commons</option>
                  <option>Century City</option>
                  <option>Corazon De Jesus</option>
                  <option>Coronado St.</option>
                  <option>Cubao</option>
                  <option>Dasmariñas</option>
                  <option>Dasmariñas Techno Park</option>
                  <option>Diliman</option>
                  <option>Don Bosco</option>
                  <option>Don Galo</option>
                  <option>Eastwood</option>
                  <option>Ermita</option>
                  <option>Ermitaño</option>
                  <option>Forbes Park</option>
                  <option>Fortune</option>
                  <option>Greenhills</option>
                  <option>Hulo</option>
                  <option>Iruhin East</option>
                  <option>Kapitolyo</option>
                  <option>Kaunlaran</option>
                  <option>Legazpi Village</option>
                  <option>Little Baguio</option>
                  <option>Loyola</option>
                  <option>Maharlika West</option>
                  <option>McKinely West</option>
                  <option>MOA Complex</option>
                  <option>Moonwalk</option>
                  <option>New Manila</option>
                  <option>Nuvali</option>
                  <option>Old Balara</option>
                  <option>Ortigas Center</option>
                  <option>Pandayan</option>
                  <option>Pio Del Pilar</option>
                  <option>Poblacion</option>
                  <option>Pulo</option>
                  <option>Punta de Fuego</option>
                  <option>Rockwell Center</option>
                  <option>Roxas District</option>
                  <option>Salawag</option>
                  <option>Salcedo Village</option>
                  <option>Sampaloc</option>
                  <option>San Antonio Village</option>
                  <option>San Celestine</option>
                  <option>San Lorenzon Village</option>
                  <option>Santa Cruz</option>
                  <option>Santa Mesa</option>
                  <option>Silang Junction North</option>
                  <option>Soutwoods</option>
                  <option>Sta. Rosa</option>
                  <option>Sungay North</option>
                  <option>Tranca</option>
                  <option>Ugong</option>
                  <option>Urdaneta Village</option>
                  <option>Usasan</option>
                  <option>Valencia</option>
                  <option>Vertis North</option>
                  <option>Wack-Wack</option>
                  <option>Western Bicutan</option>
                  <option>Zapote</option>
                  <option>Zapote V</option>
                </select>    
                <div class="invalid-feedback">
                  Valid neighborhood required.
                </div>
              </div>
            </div>

           
    

            <!--UNIT DETAILS-->
            <hr class="mb-4">
            <h4 class="mb-3">Unit Details</h4>
            <div class="row">
              <div class="col-md-4 mb-3">
                  <label for="firstName">Unit No<span class="text-muted"> (Street/Block/Lot)</span></label>
                  <input type="text" class="form-control" id="unitno" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid unit number is required.
                    </div>
                
              </div>

              <div class="col-md-4 mb-3">
                  <label for="firstName">Size<span class="text-muted"> (sqm)</span></label>
                  <input type="number" class="form-control" id="size" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid size is required.
                    </div>
              </div>

              <div class="col-md-4 mb-3">
                  <label for="zip">Direct</label>
                  <div class="row" style="margin: 5px">
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" required>
                          <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" required>
                          <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                  </div>                
              </div>
            </div>

            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="lastName">Type</label>
                    <select class="custom-select d-block w-100" id="unittype" onchange="GetSelectedValue()" required>                             
                      <option value="">Select...</option>
                      <option value="S">Sale</option>
                      <option value="R">Rent</option>
                      <option value="SR">Sale/Rent</option>
                      <option value="PSR">PS-Resale</option>
                    </select>
                    <p id="result">as</p>     
                      <div class="invalid-feedback">
                        Valid unit type is required.
                      </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="lastName">Property Type</label>
                    <select class="custom-select d-block w-100" id="propertytype" required>
                      <option value="">Select...</option>
                      <option>Commercial Lot</option>
                      <option>Commercial Property</option>
                      <option>Condominium/Apartments</option>
                      <option>House & Lot</option>
                      <option>Industrial Property</option>
                      <option>Office</option>
                      <option>Residential Lot</option>
                      <option>Townhouse</option>
                    </select>                
                    <div class="invalid-feedback">
                      Valid property type is required.
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                  <label for="lastName">Parking</label>
                    <select class="custom-select d-block w-100" id="parking">
                      <option value="">Select...</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>                
                      <div class="invalid-feedback">
                       Valid parking number is required.
                      </div>
                </div>

                <div class="col-md-4 mb-3">
                      <label for="firstName">Inclusion<span class="text-muted"> (sqm)</span></label>
                      <select class="custom-select d-block w-100" id="inclusion" required>
                          <option value="">Select...</option>
                          <option>As is</option>
                          <option>Bare</option>
                          <option>Brand New</option>
                          <option>Fully Furnished</option>
                          <option>Fully Finished</option>
                          <option>Interiored</option>
                          <option>Semi Furnished</option>
                          <option>Unfurnished</option>
                          <option>Warm Shell</option>
                      </select>         
                          <div class="invalid-feedback">
                              Valid inclusion is required.
                          </div>            
                </div>

                <div class="col-md-4 mb-3">
                    <label for="firstName">Terms</label>
                    <input type="text" class="form-control" id="terms" placeholder="" value="">  
                        <div class="invalid-feedback">
                            Valid terms is required.
                        </div>            
              </div>

              <div class="col-md-4 mb-3">
                  <label for="firstName">Availability</label>
                  <select class="custom-select d-block w-100" id="availability" required>
                      <option value="">Select...</option>
                      <option>Available</option>
                      <option>Available for Selling while Tenented</option>
                      <option>Inactive</option>
                      <option>Not Available</option>
                      <option>Sold</option>
                      <option>Tenanted</option>
                  </select>         
                      <div class="invalid-feedback">
                          Valid availability is required.
                      </div>            
            </div>

            <div class="col-md-12 mb-3">
                <label>Notes<span class="text-muted"> (Optional)</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>     
            </div>

  
              </div>

               <!--PRICE-->
            <hr class="mb-4">
            <h4 class="mb-3">Price</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Rent Price</label>
                    <input type="text" class="form-control" id="rentprice" placeholder="Php" value="">
                      <div class="invalid-feedback">
                          Valid Rental price is required.
                      </div>              
                </div>

                <div class="col-md-6 mb-3">
                    <label for="firstName">Selling Price</label>
                    <input type="text" class="form-control" id="sellingprice" placeholder="Php" value="">
                      <div class="invalid-feedback">
                          Valid Selling price is required.
                      </div>                   
                </div>
            </div>

      <!--CONTACT AND SOURCE-->
      <hr class="mb-4">
      <div class="row">
              <div class="col-md-4 mb-3">
                  <label for="firstName">Owner</label>
                  <input type="text" class="form-control" id="owner" placeholder="" value="" required>  
                      <div class="invalid-feedback">
                          Valid owner name is required.
                      </div>            
              </div>

             <div class="col-md-4 mb-3">
                <label for="firstName">Contact No</label>
                <input type="text" class="form-control" id="contactno" placeholder="---- --- ---" value="" required>  
                    <div class="invalid-feedback">
                        Valid contact number is required.
                    </div>            
             </div>

            <div class="col-md-4 mb-3">
              <label for="firstName">Broker</label>
              <input type="text" class="form-control" id="broker" placeholder="" value="">   
                  <div class="invalid-feedback">
                      Valid Broker is required.
                  </div>            
           </div>

           <div class="col-md-4 mb-3">
              <label for="firstName">Listed By</label>
              <input type="text" class="form-control" id="listedby" placeholder="" value="" required>  
                  <div class="invalid-feedback">
                      Valid listed name is required.
                  </div>            
          </div>

         <div class="col-md-4 mb-3">
            <label for="firstName">Source</label>
            <input type="text" class="form-control" id="source" placeholder="" value="" required>  
                <div class="invalid-feedback">
                    Valid source is required.
                </div>            
         </div>

         <div class="col-md-12 mb-3">
            <label for="exampleFormControlFile1">Photos</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>

        <div class="col-md-12 mb-3">
        <label for="exampleFormControlFile1">Viber</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>

      </div>

    

         
            <hr class="mb-4">
            <div class="text-right">
            <a href='dashboard.php'><button type="button" href='dashboard.php' class="btn btn-outline-secondary">Cancel</button></a>
            <button type="submit" value='Save' class="btn btn-primary">Submit</button>
            
            </div>
            
        </div>

    
      
          
    </div> <!-- end .container -->
        </form>
    

        <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Everbright Web App v0.10</p>
       
      </footer>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://everbright.com.ph/everbrightapp//libs/js/form-validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
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

function GetSelectedValue(){

    var e = document.getElementById("unittype");
    var result = e.options[e.selectedIndex].value;
                        
    var x = document.getElementById("city")
    var resultx = x.options[x.selectedIndex].value;

    var unitcode = result + resultx  

    document.getElementById("result").innerHTML = unitcode;
}
</script>   

</body>
</html>