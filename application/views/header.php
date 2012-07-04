<!DOCTYPE HTML>
<html lang="en">
    <head>
        
        <!--fav icon -->
        <link rel="icon" type="image/png" href="img/logo.png" />
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.css" /> 
        <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-responsive.css" />  
        <link rel="stylesheet" type="text/css" media="all" href="css/base.css" />
        
        
        <!-- js -->
        <script type="text/javascript" src="js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        
        <title><?php print($Name);?></title>
    </head>
    <body>
        <!--TODO:place page header here-->
        <header class="container">
           <div class="row">
               <div class="navbar navbar-fixed-top">
                   <div class="navbar-inner">
                      <div class="container">
                          <a class="brand" href="<?php print(base_url()); ?>"><?php print($Name);?></a> <!-- TODO: get restaurant name dynamically and place here -->
                          <!-- TODO: add nav menu generation code here -->
                      </div> 
                   </div>
               </div>
           </div>
        </header>
        