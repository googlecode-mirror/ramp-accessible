<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html charset=utf-8">
	<link rel="stylesheet" href="../css/ramp.css" type="text/css">
	<link rel="shortcut icon" href="../imgs/icon/ramp.ico">
	<title>Contact Us</TITLE>
   </head>
   <body>
	<div id="wrapper">
	    <div id="leftside"><img src ="../imgs/bk_2.png" style = "height:60%; width: 100%"></img></div>
            <div id="rightside"><img src ="../imgs/bk_3.png" style = "height:60%; width: 100%"></img></div>

            <div id="header">
                <span id="headerLogo"></span><span>RAMP Engineering Inc.</span>			
            </div>
            
            <div id="navmenu">
                <ul>
                    <li><a href="../index.html" alt="home">HOME</a></li>
                    <li><a href="../equipment.html" alt="EQUIPMENT">EQUIPMENT</a></li>
                    <li><a href="../sample.html" alt="SAMPLE">SAMPLE</a></li>
                    <li><a href="../history.html" alt="HISTORY">HISTORY</a></li>
                    <li><a href="../FAQ.html" alt="FAQ">FAQ</a></li>
                    <li><a href="contactus.php" alt="CONTACT US">CONTACT US</a></li>
                    <li><a href="index.html" alt="LOG IN">LOG IN</a></li>
                </ul>           
            </div>
            
	    <div id="center">
                <div id="content">   
   		     <h2 class="title">CONTACT US</h2>
   		     <?php
				$dbhost = "infoserver.cecs.csulb.edu";
				$username = "nscott";
				$password = "egiJ4rai";
				$dbname = $username;
				$conn = mysql_connect($dbhost, $username, $password);
				if (!$conn)
				{
				   die('Could not connect: '.mysql_error());
				}
				mysql_select_db($dbname) or die (mysql_error());
			
				//Select all contacts from RAMP Engineering company
				$query = "SELECT * FROM tblContact ";
				$query .= "INNER JOIN tblCompany USING (idsCompanyID) ";
				$query .= "WHERE tblCompany.chrName = 'RAMP Engineering Inc.' ";
				$query .= "ORDER BY chrDepartment";
				$result = mysql_query($query, $conn) or die(mysql_error());
				//Display a list of RAMP Engineering's contact information
				while ($row = mysql_fetch_array($result))
				{
					echo "<p>";
					echo "Department: " .$row['chrDepartment'];
					echo "<br/>";
					echo "Employee: " .$row['chrFirstName'] . " " .$row['chrLastName'];
					echo "<br/>";
					echo "Phone: " .$row['chrPhone'];
					echo "<br/>";
					echo "Email: " .$row['chrEmail'];
					echo "<br/>";
					echo "Fax: " .$row['chrFax'];
					echo "<br/>";
					echo "</p>";
				}
		     ?>
		</div>
	    </div>

	    <div id="footer">
                <hr>
                <div class="text">
                    <div id="copyright">
                    &copy; 2010 RAMP Engineering Inc. All rights reserved.
		    	<p>Latest update: 
			<?php echo date ("F d Y H:i:s.", filemtime("contactus.php")); 
			?>
			</p>
                    </div>
                    <div id="contactinfo">
                    6850 Walthall Way . Paramount, CA 90723<br>
                    Telephone: (562) 531-8030 . Fax: (562) 531-8088<br>
                    <a href="mailto:rampcamp@dslextreme.com">rampcamp@dslextreme.com</a>        
                    </div>
                </div>
                <div id="validator">
                    <span><a href="http://validator.w3.org/check?uri=referer">
                        <img src="http://www.w3.org/Icons/valid-html401"
                        alt="Valid HTML 4.01 Strict" height="31" width="88"></a></span>
                    <span><a href="http://jigsaw.w3.org/css-validator/check/referer">
                        <img src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                        alt="Valid CSS!" ></a></span>
                </div>
            </div>
        </div>

   </body>
</html>