<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title="Everbright App";
 
// include login checker
// $require_login=true;
// include_once "login_checker.php";
 
// include page header HTML
include_once 'header.php';

include_once 'config/database.php';
$query = 'SELECT * FROM tbl_deals ORDER BY deals_id DESC';
$stmt = $con->prepare($query);
$stmt->execute();

// this is how to get number of rows returned
$num = $stmt->rowCount();


//  DASHBOARD
echo "<aside  class='mdc-drawer'>";
echo "                      <div id='mySidenav' class='sidenav'>";
echo "                      <div>";
echo "                    </div>";
echo "                    <div style='height: 90%;' class='mdc-drawer__content'>";
                    
echo "                      <nav class='mdc-list'>";
                             

echo "                             <a id='navbutton' class='mdc-list-item'  href='dashboard.php' aria-selected='true'>";
echo "                              <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>dashboard</i>";
echo "                          <span class='mdc-list-item__text'>Dashboard</span>";
echo "                        </a>";
echo "                        <a id='navbutton' class='mdc-list-item mdc-list-item--activated' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>format_list_bulleted</i>";
echo "                          <span class='mdc-list-item__text'>Listing</span>";
echo "                        </a>";
echo "                        <a id='navbutton' class='mdc-list-item' href='#' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>person</i>";
echo "                          <span class='mdc-list-item__text'>Accounts</span>";
echo "                        </a>";
echo "                        <hr class='mb-4'>";                 
echo "                      </nav>";

echo "                    </div>";
echo "                    <div class='textbottom'> ";
echo "          <table style='border: none; width: 100%;'>                       ";
echo "                      <tr>";
echo "                        <td><p style='padding-left:20px;' class='text-muted'>© Everbright v0.0</p></td>";
echo "                        <td style='padding-right:30px; padding-bottom:20px' class='text-right'><a href='logout.php' class='text-decoration-none'>Log out</a></td>";
echo "                      </tr>   ";
echo "                  </table>";
echo "        </div>";
echo "                     </div>";
                         
echo "                  </aside>";
       

        
//  HEADER
    echo "<div class='mdc-drawer-app-content'>";
    echo "<header class='mdc-top-app-bar'>";
    echo "  <div class='mdc-top-app-bar__row'>";
    echo "  <section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-start'>";
    echo "   <a type='button' onclick='openNav()' id='sidebarCollapse' class='demo-menu material-icons mdc-top-app-bar__navigation-icon'>menu</a>";
    echo "   <h3 style='margin-left: 15px;'>Listing</h3>";
    echo "  </section>";
    echo " </div>";
    echo " </header>";
// END HEADER

    echo "<main onclick='closeNav()' style='height: 93%;' class='main-content'>";
    echo " <div class='mdc-top-app-bar--fixed-adjust'>";


//  INSERT HERE THE CONTENT
    echo " <div class='row col p-3'>";
    echo "  <div class='container'>";
    echo "      <div class='row'>";
    echo "          <div class='col-md-3 order-md-2 mb-4'>";
    echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
    echo "              <span class='text-muted'>Filter</span>";
    echo "            </h4>";
    echo "                    <form class='card p-2'>";
    echo "                    <div class='input-group' style='padding-bottom: 10px;'>";
    echo "                   <input type='text' name='listing_id' name='listing_id'  class='form-control' placeholder='Listing ID'>";
    echo "                    </div>";
    echo "                    <div class='input-group' style='padding-bottom: 10px;'>";
    echo "                             <select class='custom-select d-block w-100' id='unittype' onchange='GetSelectedValue()' required> ";                            
    echo "                             <option value=''>Unit Type</option>";
    echo "                             <option value='S'>Sale</option>";
    echo "                             <option value='R'>Rent</option>";
    echo "                             <option value='SR'>Sale/Rent</option>";
    echo "                             <option value='PSR'>PS-Resale</option>";
    echo "                             </select>";
    echo "                    </div>";
    echo "                    <div class='input-group' style='padding-bottom: 10px;'>";
    echo "                             <select class='custom-select d-block w-100' id='propertytype'>";
    echo "                             <option value=''>Property Type</option>";
    echo "                             <option>Commercial Lot</option>";
    echo "                            <option>Commercial Property</option>";
    echo "                             <option>Condominium/Apartments</option>";
    echo "                             <option>House & Lot</option>";
    echo "                             <option>Industrial Property</option>";
    echo "                             <option>Office</option>";
    echo "                             <option>Residential Lot</option>";
    echo "                             <option>Townhouse</option>";
    echo "                         </select>      ";          
    echo "                    </div>";
    echo "                    <div class='input-group' style='padding-bottom: 10px;'>";
    echo "                           <select class='custom-select d-block w-100' id='city' required>";
    echo "                           <option value=''>City</option>";
    echo "                           <option value='17'>Antipolo</option>";
    echo "                            <option value='6'>Bataan</option>";
    echo "                            <option value='15'>Batangas</option>";
    echo "                            <option value='16'>Bulacan</option>";
    echo "                            <option value='13'>Cavite</option>";
    echo "                            <option value='7'>Laguna</option>";
    echo "                           <option value='1'>Makati</option>";
    echo "                            <option value='4'>Mandaluyong</option>";
    echo "                           <option value='18'>Marikina</option>";
    echo "                           <option value='8'>Muntinlupa</option>";
    echo "                            <option value='13'>Parañaque</option>";
    echo "                            <option value='11'>Pasay</option>";
    echo "                            <option value='13'>Quezon City</option>";
    echo "                            <option value='5'>San Juan</option>";
    echo "                            <option value='2'>Taguig</option>";
    echo "                            <option value='19'>Zambales</option>";
    echo "                        </select> ";
    echo "                    </div>";
    echo "                    <div class='input-group' style='padding-bottom: 10px;'>";
    echo "                    <select class='custom-select d-block w-100' id='neighborhood' required>";
    echo "                    <option value=''>Select...</option>";
    echo "                    <option>Addition Hills</option>";
    echo "                     <option>Alabang</option>";
    echo "                     <option>Alabang West</option>";
    echo "                     <option>Anvaya Cove</option>";
    echo "                    <option>Ayala Center</option>";
    echo "                    <option>Ayala Westgrove Heights</option>";
    echo "                    <option>Bacao</option>";
    echo "                    <option>Bagong Ilog</option>";
    echo "                    <option>Balintawak</option>";
    echo "                     <option>Bambang</option>";
    echo "                    <option>Batasan Hills</option>";
    echo "                    <option>Bayshore City</option>";
    echo "                   <option>Bel-Air Village</option>";
    echo "                   <option>BGC</option>";
    echo "                   <option>Capitol Commons</option>";
    echo "                   <option>Century City</option>";
    echo "                   <option>Corazon De Jesus</option>";
    echo "                   <option>Coronado St.</option>";
    echo "                  <option>Cubao</option>";
    echo "                   <option>Dasmariñas</option>";
    echo "                  <option>Dasmariñas Techno Park</option>";
    echo "                   <option>Diliman</option>";
    echo "                  <option>Don Bosco</option>";
    echo "                   <option>Don Galo</option>";
    echo "                  <option>Eastwood</option>";
    echo "                   <option>Ermita</option>";
    echo "                   <option>Ermitaño</option>";
    echo "                  <option>Forbes Park</option>";
    echo "                   <option>Fortune</option>";
    echo "                  <option>Greenhills</option>";
    echo "                  <option>Hulo</option>";
    echo "                  <option>Iruhin East</option>";
    echo "                   <option>Kapitolyo</option>";
    echo "                  <option>Kaunlaran</option>";
    echo "                  <option>Legazpi Village</option>";
    echo "                  <option>Little Baguio</option>";
    echo "                  <option>Loyola</option>";
    echo "                  <option>Maharlika West</option>";
    echo "                  <option>McKinely West</option>";
    echo "                  <option>MOA Complex</option>";
    echo "                  <option>Moonwalk</option>";
    echo "                   <option>New Manila</option>";
    echo "                   <option>Nuvali</option>";
    echo "                   <option>Old Balara</option>";
    echo "                   <option>Ortigas Center</option>";
    echo "                  <option>Pandayan</option>";
    echo "                  <option>Pio Del Pilar</option>";
    echo "                   <option>Poblacion</option>";
    echo "                   <option>Pulo</option>";
    echo "                  <option>Punta de Fuego</option>";
    echo "                  <option>Rockwell Center</option>";
    echo "                  <option>Roxas District</option>";
    echo "                  <option>Salawag</option>";
    echo "                  <option>Salcedo Village</option>";
    echo "                    <option>Sampaloc</option>";
    echo "                   <option>San Antonio Village</option>";
    echo "                  <option>San Celestine</option>";
    echo "                  <option>San Lorenzon Village</option>";
    echo "                  <option>Santa Cruz</option>";
    echo "                  <option>Santa Mesa</option>";
    echo "                  <option>Silang Junction North</option>";
    echo "                  <option>Soutwoods</option>";
    echo "                  <option>Sta. Rosa</option>";
    echo "                   <option>Sungay North</option>";
    echo "                  <option>Tranca</option>";
    echo "                  <option>Ugong</option>";
    echo "                  <option>Urdaneta Village</option>";
    echo "                   <option>Usasan</option>";
    echo "                  <option>Valencia</option>";
    echo "                  <option>Vertis North</option>";
    echo "                   <option>Wack-Wack</option>";
    echo "                   <option>Western Bicutan</option>";
    echo "                  <option>Zapote</option>";
    echo "                   <option>Zapote V</option>";
    echo "              </select> ";
    echo "                    </div>";
    echo "                </form>";
   
    echo "          </div>";   


          
echo "        <div class='col-md-9 order-md-1'>";
echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
echo "                    <span class='text-muted'>Requirements</span>"; 
echo "           <a href='create_req.php'><button type='button' href='create_req.php' class='btn btn-primary btn-sm'>Add</button></a>"; 
echo "            </h4>";


echo "            <ul class='list-group mb-3'>";



$querya = "SELECT * FROM tbl_requirements WHERE requirements LIKE '%$listing_id%' ";
$stmta = $con->prepare($querya);
$stmta->execute();

// this is how to get number of rows returned
$numa = $stmta->rowCount();

if($numa>0){
    while ($rowa = $stmta->fetch(PDO::FETCH_ASSOC)){
    
        extract($rowa);
       
       

echo "              <li class='list-group-item d-flex justify-content-between lh-condensed'>";

echo "  <table style='border: none;'>";
echo "                     <tr>";
echo "                      <td>";
echo "                  <img  src='{$name}' width='50' height='50'>";
echo "                    </td>";
echo "                     <td style='width: 800px; padding-left: 10px; padding-right: 10px;'>";
echo "                  <h6 class='my-0 card-title'>{$building}</h6>";
echo "                  <small>{$location} | {$type}</small>";
echo "                  <br />";
echo "                  <p class='card-text cardtextmin'>{$requirements}</p>";
echo "                        </td>";
echo "                        <td style='width: 100px;'>";
    
echo "                <span class='text-muted'>{$price}</span>";
echo "                        </td>";
echo "                        </tr>";
echo "                    </table>";

echo "              </li>";

    }//while
}//IF



                  
echo "            </ul>";

echo "        </div>";





//  ENDING CONTENT

    include 'footer.php';
    ?>
