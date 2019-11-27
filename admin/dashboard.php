<?php
// core configuration
include_once "../admin/core.php";
 
include_once "../object/user.php";


// set page title
$page_title="Everbright App";
 
 //include login checker
$require_login=true;
include_once "../admin/login_checker.php";

// include page header HTML
include_once '../header.php';

include_once '../config/database.php';
$query = 'SELECT deals_id, name, building, unit_no, type, deals_date, price FROM tbl_deals ORDER BY deals_id DESC';
$stmt = $con->prepare($query);
$stmt->execute();

// this is how to get number of rows returned
$num = $stmt->rowCount();

//  DRAWER
echo "<aside  class='mdc-drawer'>";
echo "                      <div id='mySidenav' class='sidenav'>";
echo "                      <div>";
echo "                    </div>";
echo "                    <div style='height: 90%;' class='mdc-drawer__content'>";
                    
echo "                      <nav class='mdc-list'>";
                             

echo "                             <a id='navbutton' class='mdc-list-item mdc-list-item--activated'  aria-selected='true'>";
echo "                              <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>dashboard</i>";
echo "                        <span class='mdc-list-item__text'>Dashboard</span>";
echo "                        </a>";

echo "                        <a id='navbutton' class='mdc-list-item' href='{$home_url}listing.php' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>format_list_bulleted</i>";
echo "                          <span class='mdc-list-item__text'>Listing</span>";
echo "                        </a>";


if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
    echo "                        <a id='navbutton' href='{$home_url}admin/users.php' class='mdc-list-item' >";
    echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>supervisor_account</i>";
    echo "                          <span class='mdc-list-item__text'>Users</span>";
    echo "                        </a>";
}                         

echo "                        <a id='navbutton' data-toggle='modal' data-target='#logoutModal' class='mdc-list-item' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>exit_to_app</i>";
echo "                          <span class='mdc-list-item__text'>Logout</span>";
echo "                        </a>";                
echo "                      </nav>";

// echo "                    </div>";
// echo "                    <div class='textbottom'> ";
// echo "          <table style='border: none; width: 100%;'>                       ";
// echo "                      <tr>";
// echo "                        <td><p style='padding-left:20px;' class='text-muted'>© Everbright v0.0</p></td>";
// echo "                        <td style='padding-right:30px; padding-bottom:20px' class='text-right'><a href='logout.php' class='text-decoration-none'>Log out</a></td>";
// echo "                      </tr>   ";
// echo "                  </table>";
// echo "        </div>";
// echo "                     </div>";                     
echo "                  </aside>";


echo "<div class='mdc-drawer-app-content'>";


//  HEADER
    echo "<header class='mdc-top-app-bar'>";
    echo "  <div class='mdc-top-app-bar__row'>";
    echo "  <section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-start'>";
    echo "   <a type='button' onclick='openNav()' id='sidebarCollapse' class='demo-menu material-icons mdc-top-app-bar__navigation-icon'>menu</a>";
    echo "   <h3 style='margin-left: 15px;'>Dashboard</h3>";
    echo "  </section>";
    // echo "<section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-end' role='toolbar'>";
    // echo " <a class='material-icons mdc-top-app-bar__action-item' aria-label='Search' alt='Search'>search</a>";
    // echo " </section>";
    echo " </div>";
    echo " </header>";
//  END HEADER    
      
    echo "<main onclick='closeNav()' style='height: 93%;' class='main-content'>";
    echo " <div class='mdc-top-app-bar--fixed-adjust'>";

    echo " <div class='row col p-3'>";
    echo "  <div class='container'>";
    echo "      <div class='row'>";
    echo "          <div class='col-md-5 order-md-2 mb-4'>";
    echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
    echo "              <span class='text-muted'>Closed Deals &nbsp<span class='badge badge-secondary'>{$num}</span></span>";
    echo " <div> ";
    echo "           <a><button type='button' data-toggle='modal' data-target='#dealsModal' class='btn btn-outline-danger btn-sm'>Remove</button></a>"; 
    echo "           <a href='{$home_url}create_deals.php'><button type='button' href='{$home_url}create_deals.php' class='btn btn-primary btn-sm'>Add</button></a>"; 
    echo " </div> ";

    echo "            </h4>";
   
    echo "            <ul class='list-group mb-3'>";

    if($num>0){
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
         
        // creating new table row per record

        echo "              <li class='list-group-item d-flex justify-content-between lh-condensed'>";
        echo "                      <table style='border: none;'>";
        echo "                     <tr>";
        echo "                      <td>";
        echo "                  <img  src='{$name}' width='50' height='50'>";
        echo "                    </td>";
        echo "                     <td style='width: 400px; padding-left: 10px; padding-right: 10px;'>";

        echo "                  <h6 class='my-0 card-title'>{$building} - {$unit_no}</h6>";
        echo "                  <small>{$type}</small>";
        echo "                  <br />";
        echo "                  <small class='text-muted'>{$deals_date}</small>";
        echo "                        </td>";
        echo "                        <td style='width: 100px;'>";
            
        echo "                <span class='text-muted'>₱{$price}</span>";
        echo "                        </td>";
        echo "                        </tr>";
        echo "                    </table>";
        echo"                     <button type='button' onclick='delete_dealsingle({$deals_id})'  class='close'aria-label='Close'><span aria-hidden='true'>&times;</span></button>            ";
        echo "              </li>";
                            
        
    }
     
    }
    else{
        echo "              <li class='list-group-item d-flex justify-content-between lh-condensed'>";
       echo" <p class='card-text'>No closed deals yet!!!</p>";
        echo "              </li>";
    }






              
           echo "            </ul>";
                  
        echo "          </div>";   
              
    echo "        <div class='col-md-7 order-md-1'>";
    echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
    echo "                    <span class='text-muted'>Requirements</span>"; 
    echo "          <div>";   
    echo "           <a><button type='button' data-toggle='modal' data-target='#exampleModal' class='btn btn-outline-danger btn-sm'>Remove</button></a>"; 
    echo "           <a href='{$home_url}create_req.php'><button type='button' href='{$home_url}create_req.php' class='btn btn-primary btn-sm'>Add</button></a>";
    echo "            </h4>";
    echo "          <div>"; 

    echo "            <ul class='list-group mb-3'>";

    $querya = 'SELECT * FROM tbl_requirements ORDER BY requirements_id DESC';
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
    echo"                     <button type='button' onclick='delete_reqsingle({$requirements_id})' class='close'aria-label='Close'><span aria-hidden='true'>&times;</span></button>            ";
    

    
    echo "              </li>";




        }//while
    }//IF
    else{
        echo "              <li class='list-group-item d-flex justify-content-between lh-condensed'>";
       echo" <p class='card-text'>No requirements</p>";
        echo "              </li>";
    }
    

   
                      
    echo "            </ul>";
 
    echo "        </div>";

//REQ MODAL
        echo "  <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        echo " <div class='modal-dialog' role='document'>";
        echo "   <div class='modal-content'>";
        echo "     <div class='modal-header'>";
        echo "       <h5 class='modal-title' id='exampleModalLabel'>Remove Requirements</h5>";
        echo "       <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "        <span aria-hidden='true'>&times;</span>";
        echo "      </button>";
        echo "    </div>";
        echo "   <div class='modal-body'>";
        echo "  <p>Are you sure you want to remove all this requirements?</p>";
        echo "    </div>";
        echo "   <div class='modal-footer'>";
        echo "    <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Close</button>";
        echo "     <button type='button' onclick='delete_user()' class='btn btn-danger'>Remove</button>";
        echo "   </div>";
        echo "  </div>";
        echo " </div>";
        echo " </div>";
  //END REQ MODAL



//DEALS MODAL
      echo "  <div class='modal fade' id='dealsModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
      echo " <div class='modal-dialog' role='document'>";
      echo "   <div class='modal-content'>";
      echo "     <div class='modal-header'>";
      echo "       <h5 class='modal-title' id='exampleModalLabel'>Remove Closed Deals</h5>";
      echo "       <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
      echo "        <span aria-hidden='true'>&times;</span>";
      echo "      </button>";
      echo "    </div>";
      echo "   <div class='modal-body'>";
      echo "  <p>Are you sure you want to remove all closed deals?</p>";
      echo "    </div>";
      echo "   <div class='modal-footer'>";
      echo "    <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Close</button>";
      echo "     <button type='button' onclick='delete_deals()' class='btn btn-danger'>Remove</button>";
      echo "   </div>";
      echo "  </div>";
      echo " </div>";
      echo " </div>";
//END DEALS MODAL

//LOGOUT MODAL
    echo "  <div class='modal fade' id='logoutModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
    echo " <div class='modal-dialog' role='document'>";
    echo "   <div class='modal-content'>";
    echo "     <div class='modal-header'>";
    echo "       <h5 class='modal-title' id='exampleModalLabel'>Log out</h5>";
    echo "       <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
    echo "        <span aria-hidden='true'>&times;</span>";
    echo "      </button>";
    echo "    </div>";
    echo "   <div class='modal-body'>";
    echo "  <p>Are you sure you want to log out?</p>";
    echo "    </div>";
    echo "   <div class='modal-footer'>";
    echo "    <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Close</button>";
    echo "     <button type='button' onclick='logout_modals()' class='btn btn-primary'>Log out</button>";
    echo "   </div>";
    echo "  </div>";
    echo " </div>";
    echo " </div>";
//END LOGOUT MODAL

    include '../footer.php';
    ?>
            




