<?php

//fetch_data.php

include_once 'config/database.php';

if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM tbl_requirements WHERE requirements_id
 ";
//  if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
//  {
//   $query .= "
//    AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
//   ";
//  }
 if(isset($_POST["building"]))
 {
  $building_filter = implode("','", $_POST["building"]);
  $query .= "
   AND building IN('".$building_filter."')
  ";
 }
//  if(isset($_POST["ram"]))
//  {
//   $ram_filter = implode("','", $_POST["ram"]);
//   $query .= "
//    AND product_ram IN('".$ram_filter."')
//   ";
//  }
//  if(isset($_POST["storage"]))
//  {
//   $storage_filter = implode("','", $_POST["storage"]);
//   $query .= "
//    AND product_storage IN('".$storage_filter."')
//   ";
//  }

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="col-sm-4 col-lg-3 col-md-3">
    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
     <img src="image/'. $row['name'] .'" alt="" class="img-responsive" >
     <p align="center"><strong><a href="#">'. $row['building'] .'</a></strong></p>
     <h4 style="text-align:center;" class="text-danger" >'. $row['price'] .'</h4>
     <p>Type : '. $row['type'].' MP<br />
     Building : '. $row['building'] .' <br />
     Requirements : '. $row['requirements'] .' GB<br />
    </div>
   </div>
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>
