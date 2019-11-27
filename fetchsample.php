<?php
//fetch.php
include_once 'config/database.php';
$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';



if(isset($_POST["query"]))
{
 $search=htmlspecialchars(strip_tags($_POST['query']));
 //$search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_requirements
  WHERE requirements_id LIKE '%".$search."%'
  OR name LIKE '%".$search."%' 
  OR building LIKE '%".$search."%' 
  OR location LIKE '%".$search."%' 
  AND type LIKE '%".$search."%'
 ";
}
if(isset($_POST["query2"])){
   $unittype=htmlspecialchars(strip_tags($_POST['query']));
   $query .= "
    AND type LIKE '%".$unittype."%'
   ";
}
else
{
 $query = "
  SELECT * FROM tbl_requirements ORDER BY requirements_id DESC
 ";
}
//$result = mysqli_query($con, $query);
$result = $con->prepare($query);
$result->execute();

$numa = $result->rowCount();
if($numa>0)
{
 $output .= '

 ';
 while ($row = $result->fetch(PDO::FETCH_ASSOC))
 //while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <li class="list-group-item d-flex justify-content-between lh-condensed">
  <table style="border: none;">
  <tr>
  <td>
<img  src="'.$row["name"].'" width="50" height="50">
</td>
 <td style="width: 800px; padding-left: 10px; padding-right: 10px;">
<h6 class="my-0 card-title">'.$row["building"].'</h6>
<small>'.$row["location"].' | '.$row["type"].'</small>
<br />
<p class="card-text cardtextmin">'.$row["requirements"].'</p>
    </td>
    <td style="width: 100px;">

<span class="text-muted">'.$row["price"].'</span>
    </td>
    </tr>

   </table>

            </li>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>