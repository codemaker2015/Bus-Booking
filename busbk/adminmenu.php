<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>

<body class=""> 
  <!--<![endif]-->
    
        


    
    <div class="sidebar-nav">
        <form class="search form-inline">
            <input type="text" placeholder="Search...">
        </form>

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>REGISTRATIONS</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="adminpanel.php?val=2">Bus</a></li>
            <li ><a href="adminpanel.php?val=4">Bus Type</a></li>
            <li ><a href="adminpanel.php?val=7">Seat Layout</a></li>
            <li ><a href="adminpanel.php?val=10">State  & District</a></li>
             <li ><a href="adminpanel.php?val=11">Conductor</a></li>
            <li ><a href="adminpanel.php?val=8">Stop</a></li>
            <li ><a href="adminpanel.php?val=3">Route</a></li>
            <li ><a href="adminpanel.php?val=9">Allocation</a></li>
              <li ><a href="adminpanel.php?val=5">Fare-Time</a></li>
            
        </ul>

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>APPROVELS<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="adminpanel.php?val=6">Agent</a></li>
            <li ><a href="adminpanel.php?val=12">Testimonials</a></li>
            <li ><a href="adminpanel.php?val=6">Contacts</a></li>
        </ul>

     
        <a href="index.php" class="nav-header" ><i class="icon-question-sign"></i>Logout</a>
        
    </div>
    

    
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>
