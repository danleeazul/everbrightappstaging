<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://www.everbright.com.ph/everbrightapp/libs/css/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 </head>
 <body class="mdc-typography">

 <aside  class='mdc-drawer'>
                      <div id='mySidenav' class='sidenav'>
                      <div>
                    </div>
                    <div style='height: 90%;' class='mdc-drawer__content'>
                    
                      <nav class='mdc-list'>
                             

                             <a id='navbutton' class='mdc-list-item'  href='indexsample.php' aria-selected='true'>
                              <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>dashboard</i>
                          <span class='mdc-list-item__text'>Dashboard</span>
                        </a>
                        <a id='navbutton' class='mdc-list-item mdc-list-item--activated' >
                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>format_list_bulleted</i>
                          <span class='mdc-list-item__text'>Listing</span>
                        </a>
                        <a id='navbutton' class='mdc-list-item' href='#' >
                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>person</i>
                          <span class='mdc-list-item__text'>Accounts</span>
                        </a>
                        <hr class='mb-4'>                 
                      </nav>

                    </div>
                    <div class='textbottom'> 
          <table style='border: none; width: 100%;'>                       
                      <tr>
                        <td><p style='padding-left:20px;' class='text-muted'>© Everbright v0.0</p></td>
                        <td style='padding-right:30px; padding-bottom:20px' class='text-right'><a href='logout.php' class='text-decoration-none'>Log out</a></td>
                      </tr>   
                  </table>
        </div>
                     </div>
                         
                  </aside>
                  <div class='mdc-drawer-app-content'>
    <header class='mdc-top-app-bar'>
      <div class='mdc-top-app-bar__row'>
      <section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-start'>
       <a type='button' onclick='openNav()' id='sidebarCollapse' class='demo-menu material-icons mdc-top-app-bar__navigation-icon'>menu</a>
       <h3 style='margin-left: 15px;'>Listing</h3>
      </section>
     </div>
     </header>


    <main onclick='closeNav()' style='height: 93%;' class='main-content'>
     <div class='mdc-top-app-bar--fixed-adjust'>



     <div class='row col p-3'>
      <div class='container'>
          <div class='row'>
              <div class='col-md-3 order-md-2 mb-4'>
                <h4 class='d-flex justify-content-between align-items-center mb-3'>
                  <span class='text-muted'>Filter</span>
                </h4>
                        <form class='card p-2'>
                        <div class='input-group' style='padding-bottom: 10px;'>
                       <input type='text' name='search_text' id='search_text'  class='form-control' placeholder='Listing ID'>
                        </div>
                        <div class='input-group' style='padding-bottom: 10px;'>
                                 <select class='custom-select d-block w-100' id='unittype' name='unittype' onchange='GetSelectedValue()' required>                             
                                 <option value=''>Unit Type</option>
                                 <option value='Sale'>Sale</option>
                                 <option value='Rent'>Rent</option>
                                 <option value='Sale/Rent'>Sale/Rent</option>
                                 <option value='PS-Resale'>PS-Resale</option>
                                 </select>
                        </div>
                        <div class='input-group' style='padding-bottom: 10px;'>
                                 <select class='custom-select d-block w-100' id='propertytype'>
                                 <option value=''>Property Type</option>
                                 <option>Commercial Lot</option>
                                <option>Commercial Property</option>
                                 <option>Condominium/Apartments</option>
                                 <option>House & Lot</option>
                                 <option>Industrial Property</option>
                                 <option>Office</option>
                                 <option>Residential Lot</option>
                                 <option>Townhouse</option>
                             </select>                
                        </div>
                        <div class='input-group' style='padding-bottom: 10px;'>
                               <select class='custom-select d-block w-100' id='city' required>
                                  <option value=''>City</option>
                                  <option value='17'>Antipolo</option>
                                <option value='6'>Bataan</option>
                                <option value='15'>Batangas</option>
                                <option value='16'>Bulacan</option>
                                <option value='13'>Cavite</option>
                                <option value='7'>Laguna</option>
                               <option value='1'>Makati</option>
                                <option value='4'>Mandaluyong</option>
                               <option value='18'>Marikina</option>
                               <option value='8'>Muntinlupa</option>
                                <option value='13'>Parañaque</option>
                                <option value='11'>Pasay</option>
                                <option value='13'>Quezon City</option>
                                <option value='5'>San Juan</option>
                                <option value='2'>Taguig</option>
                                <option value='19'>Zambales</option>
                            </select> 
                        </div>
                        <div class='input-group' style='padding-bottom: 10px;'>
                   <select class='custom-select d-block w-100' id='neighborhood' required>
                        <option value=''>Select...</option>
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
                        </div>
                    </form>
   
              </div>   


          
        <div class='col-md-9 order-md-1'>
            <h4 class='d-flex justify-content-between align-items-center mb-3'>
                    <span class='text-muted'>Requirements</span> 
           <a href='create_req.php'><button type='button' href='create_req.php' class='btn btn-primary btn-sm'>Add</button></a> 
            </h4>

            

            <ul class='list-group mb-3' id="result">


           

            
    </ul>
    </div>

    </div>
</main>
</div>

  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
    $.ajax({
              url:"fetchsample.php",
              method:"POST",
              data:{query:query},
              success:function(data)
              {
              $('#result').html(data);
              }
          });
 }

 $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != ''){
    load_data(search);
    }
    else{
    load_data();
    }
 });

 $('#unittype').keyup(function(){
    var search2 = $(this).val();
    if(search2 != ''){
    load_data(search2);
    }
    else{
    load_data();
    }
 });
 
});
</script>