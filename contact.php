<html>
<head>
<title>ICTYA Collections</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="loginStyle.css" />
<link rel="stylesheet" href="style.css" />
<style>
  .col-md-6{
    background: white;
  }
  </style>
</head>
<body>
<h1> <font face="courier" color="#C70039">ICTYA Collections </font></h1>
<ul>
  <li><a href="userhome.php">Home</a></li>
  <li><a href="aboutus.php">About Us</a></li>
    <li class="dropdown"><a href="#" class="dropbtn">Register</a>
    <div class="dropdown-content" >
      <a href="userregister.php">Register as User</a>
      <a href="emplregister.php">Register as Employee</a>
    </div>
  </li>
  <li><a href="contact.php">Contact Us</a></li>
</ul>

<div class="bg" >
<div class="container">
	<div class="row">
<div class="col-md-6 col-md-offset-2">
    <div class="row" style="margin-top:10px;" align="center">
          <div class="">
          <img src="images/logo.jpg" alt="ictya collection" style="width:150px;height:150px;">
          </div>
    </div>

    <div class="row" style="margin-top:10px;">
          <div class="">
            <p style="text-align:left;font-size:1.5em;">Contact Us</p>
          </div>
    </div>
    <div class="row" style="margin-top:10px;">
          <div class="">
            <p><span style="display: block; text-align:left; line-height: 30px; font-family: 'Work Sans', sans-serif; font-size: 15px;">
            <i class="fi-map large"></i> Ictya Collection, New Jersey </span>
            <span style="display: block; text-align:left; line-height: 30px; font-family: 'Work Sans', sans-serif; font-size: 15px;">
               St. Elizabeth<br />
        </span><span style="display: block; text-align:left; line-height: 30px; font-family: 'Work Sans', sans-serif; font-size: 15px;"><br />
        <i class="fi-telephone large"></i> Call Free: +1 998-234-5678<br />
         </span><span style="display: block; text-align:left; line-height: 30px; font-family: 'Work Sans', sans-serif; font-size: 15px;"><br />
         <i class="fi-clock large"></i> Monday - Friday: 8AM - 5PM<br />
         </span><span style="display: block; text-align:left; line-height: 30px; font-family: 'Work Sans', sans-serif; font-size: 15px;"><br />
         <i class="fi-mail large"></i><a href ="http://ictyacollection.com" style="color: #9f1d2a"> ictya@gmail.com</a></span></p>
</div> 
    </div>
	</div>
	</div>
	</div>
    <?php include('footer.php') ?>
  </body>
</html>