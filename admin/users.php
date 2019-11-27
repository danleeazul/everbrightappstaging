<?php
// core configuration
include_once "../config/core.php";
 
// set page title
$page_title="Everbright App";
 
 //include login checker
$require_login=true;
include_once "../login_checker_two.php";
 
// include page header HTML
include_once '../header.php';

include_once '../config/database.php';
$query = 'SELECT * FROM tbl_deals ORDER BY deals_id DESC';
$stmt = $con->prepare($query);
$stmt->execute();

// this is how to get number of rows returned
$num = $stmt->rowCount();

$image = htmlspecialchars($row['image'], ENT_QUOTES);

//  DASHBOARD
echo "<aside  class='mdc-drawer'>";
echo "                      <div id='mySidenav' class='sidenav'>";
echo "                      <div>";
echo "                    </div>";
echo "                    <div style='height: 90%;' class='mdc-drawer__content'>";
                    
echo "                      <nav class='mdc-list'>";

                            if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
                                echo " <a id='navbutton' class='mdc-list-item' href='{$home_url}admin/dashboard.php' >";

                            }
                            if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Customer"){
                                echo " <a id='navbutton' class='mdc-list-item' href='{$home_url}dashboard.php' >";
                            }
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>dashboard</i>";
echo "                          <span class='mdc-list-item__text'>Dashboard</span>";
echo "                        </a>";

echo "                        <a id='navbutton' href='{$home_url}listing.php' class='mdc-list-item' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>format_list_bulleted</i>";
echo "                          <span class='mdc-list-item__text'>Listing</span>";
echo "                        </a>";

echo "                        <a id='navbutton' class='mdc-list-item mdc-list-item--activated' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>supervisor_account</i>";
echo "                          <span class='mdc-list-item__text'>Users</span>";
echo "                        </a>";

echo "                        <a id='navbutton' data-toggle='modal' data-target='#logoutModal' class='mdc-list-item' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>exit_to_app</i>";
echo "                          <span class='mdc-list-item__text'>Logout</span>";
echo "                        </a>";  
echo "                        <hr class='mb-4'>";                 
echo "                      </nav>";                         
echo "                  </aside>";
       

        
//  HEADER
    echo "<div class='mdc-drawer-app-content'>";
    echo "<header class='mdc-top-app-bar'>";
    echo "  <div class='mdc-top-app-bar__row'>";
    echo "  <section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-start'>";
    echo "   <a type='button' onclick='openNav()' id='sidebarCollapse' class='demo-menu material-icons mdc-top-app-bar__navigation-icon'>menu</a>";
    echo "   <h3 style='margin-left: 15px;'>Users</h3>";
    echo "  </section>";
    echo " </div>";
    echo " </header>";
// END HEADER

    echo "<main onclick='closeNav()' style='height: 93%;' class='main-content'>";
    echo " <div class='mdc-top-app-bar--fixed-adjust'>";


//  INSERT HERE THE CONTENT
   

echo "        <div class='col-md-12 order-md-1'>";
echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
echo "                    <span class='text-muted'>Users</span>"; 
echo "          <div>";   
echo "           <a href='{$home_url}register.php'><button type='button' href='{$home_url}register.php' class='btn btn-primary btn-sm'>Add</button></a>";
echo "            </h4>";
echo "          <div>"; 

echo "            <ul class='list-group mb-3'>";

$querya = 'SELECT * FROM tbl_users ORDER BY id DESC';
$stmta = $con->prepare($querya);
$stmta->execute();

// this is how to get number of rows returned
$numa = $stmta->rowCount();

if($numa>0){
    while ($rowa = $stmta->fetch(PDO::FETCH_ASSOC)){
    
        extract($rowa);
echo "  <a href='/everbrightapp/admin/register_update.php?id={$id}' class='deco-none'>";
echo "              <li class='list-group-item list-group-item-action d-flex justify-content-between lh-condensed'>";
echo "  <table style='border: none;'>";
echo "                     <tr>";
echo "                      <td>";
echo "       <img  src='../uploads/{$image}' width='50' height='50'>";
echo "                    </td>";
echo "                     <td style='width: 800px; padding-left: 10px; padding-right: 10px;'>";
echo "                  <h6 class='my-0 card-title'>{$firstname} {$lastname}</h6>";
echo "                  <small>{$position}</small>";
echo "                  <br />";
echo "                  <p class='card-text cardtextmin'></p>";
echo "                        </td>";
echo "                        <td style='width: 100px;'>";

if($status==1){
    echo "                <span class='badge badge-pill badge-primary'>Active</span>";

}
if($status==0){
    echo "                <span class='badge badge-pill badge-warning'>Pending</span>";
}


echo "                        </td>";
echo "                        </tr>";
echo "                    </table>";
echo "                    </a>";
// onclick='delete_reqsingle({$id}')    



 
echo "              </li>";




    }//while
}//IF
else{
    echo "              <li class='list-group-item d-flex justify-content-between lh-condensed'>";
   echo" <p class='card-text'>No Users</p>";
    echo "              </li>";
}
echo "            </ul>";
echo "        </div>";



//  ENDING CONTENT

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
