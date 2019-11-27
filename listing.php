<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title="Everbright App";
 
 //include login checker
 //$require_login=true;
 //include_once "login_checker_two.php";
 
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

                            if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
echo "                      <a id='navbutton' class='mdc-list-item' href='{$home_url}admin/dashboard.php' >";
echo "                              <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>dashboard</i>";
echo "                          <span class='mdc-list-item__text'>Dashboard</span>";
echo "                        </a>";

                            }

                            if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Officer"){
echo "                      <a id='navbutton' class='mdc-list-item' href='{$home_url}admin/dashboard.php' >";
echo "                              <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>dashboard</i>";
echo "                          <span class='mdc-list-item__text'>Dashboard</span>";
echo "                        </a>";
                            }      
                            
                            
                            if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Customer"){
echo "                         <a id='navbutton' class='mdc-list-item' href='{$home_url}dashboard.php' >";
echo "                              <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>dashboard</i>";
echo "                          <span class='mdc-list-item__text'>Dashboard</span>";
echo "                        </a>";
                            }


echo "                        <a id='navbutton' class='mdc-list-item mdc-list-item--activated' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>format_list_bulleted</i>";
echo "                          <span class='mdc-list-item__text'>Listing</span>";
echo "                        </a>";

                                if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
echo "                        <a id='navbutton' href='{$home_url}admin/users.php' class='mdc-list-item' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>supervisor_account</i>";
echo "                          <span class='mdc-list-item__text'>Users</span>";
echo "                        </a>";
                                }
                                if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Officer"){

                                }


echo "                        <a id='navbutton' data-toggle='modal' data-target='#logoutModal' class='mdc-list-item' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>exit_to_app</i>";
echo "                          <span class='mdc-list-item__text'>Logout</span>";
echo "                        </a>";  
echo "                        <hr class='mb-4'>";                 
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
   
echo "<div data-type='AwesomeTableView' data-viewID='-LLD1dgOXU8YdFoS1qxE'></div>";

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

    include 'footer.php';
    ?>
