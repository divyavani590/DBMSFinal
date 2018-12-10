<?php include('header.php'); ?>
<html>

<head>
<title>ICTYA Collections</title>
<style>
body, html {
    height: 100%;
    margin: 0;
}

.bg {
    /* The image used */
    background-image: url("winter.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #C70039;
	}
li {
    float: left;
	}
li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
	}
li a:hover, .dropdown:hover .dropbtn {
    background-color: #EC7063;
	}
li.dropdown {
    display: inline-block;
	}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
	}
.dropdown-content a:hover {
	background-color: #EAECEE
	}
.dropdown:hover .dropdown-content {
    display: block;
	}
</style>
</head>
<body>



<div class="bg">
<br>
<input type="submit"  name="submit" value="Employee-View Recent Orders">

<br><br><br><br><br><br><br><br><br><br><br>
<font  color="#C70039" face="courier" size= "30"><i><b>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

&emsp;&emsp;Welcome to ICTYA Collections - Employee Page</font></i></b>
<?php include('footer.php') ?>

</body>
</div>

</html>