<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
  		<meta http-equiv="Content-Type" content="text/html charset=utf-8">
  		<link rel="stylesheet" href="css/ramp.css" type="text/css">
  		<link rel="shortcut icon" href="imgs/icon/ramp.ico">
  		<title>RAMP Engineering</title>
	
	</head>
 
 	<body>
	<?php
	//Start session
	session_start();
	//Check whether the session variable
	//SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['USER_NAME']) || 
		(trim($_SESSION['USER_NAME'])=='')) {
	header("location: accessdenied.php");
	exit();
	}
	$employee = false; 
	$company = false;
	if($_SESSION['COMPANY_ID'] != '')
	{
		$company = true; 
	}
	else
		$employee = true;
	
?>

        <div id="leftside"><img src ="imgs/bk_2.png" style = "height:60%; width: 100%"></img></div>
        <div id="rightside"><img src ="imgs/bk_3.png" style = "height:60%; width: 100%"></img></div>    
    
        <div id ="wrapper">
            <div id="header">
                <span id="headerLogo"></span><span>RAMP Engineering Inc.</span>
            </div>
            
            <div id="navmenu">
                <ul>
                    <li><a href="index.html" alt="home">HOME</a></li>

                    <li><a href="equipment.html" alt="EQUIPMENT">EQUIPMENT</a></li>
                    <li><a href="sample.html" alt="SAMPLE">SAMPLE</a></li>
                    <li><a href="index.html" alt="HISTORY">HISTORY</a></li>
                    <li><a href="index.html" alt="FAQ">FAQ</a></li>
                    <li><a href="index.html" alt="CONTACT US">CONTACT US</a></li>
					<li><a href="logout.php" alt="LOG OUT">LOG OUT</a></li> 

                </ul>           
            </div>  
		
            
            <div id="center">
                <div id="content">
			<p> Logged in successfully. Welcome,  <?php echo $_SESSION['USER_NAME'];?></p>
			<p> Welcome To the Ramp Engineering Login Home. Now that you are logged in you can see 
				the status of a job and if you are an employee upload and download files. </p>
			<?php
				if($employee == true)
				{
					
			?>
				<a href ="files.php" id = "files">Upload or Download Files</a>
				<a href ="jobstatus.php" id ="status">Check the Status of a Job </a>
			<?php
				}
				?>
			<?php
				if($company == true)
				{
			?>
				<a href ="jobstatus.php">Check the Status of a Job </a>
					<?php
					}
					?>
			
			
                </div>
            </div>
            
            <div id="footer">
                <hr>
                <div class="text">
                    <div id="copyright">

                        &copy; 2010 RAMP Engineering Inc. All rights reserved.
                        <p>Latest Update: Wednesday, 08-Dec-2010 00:46:54 PST </p>
                    </div>
                    <div id="contactinfo">
                    6850 Walthall Way • Paramount, CA 90723<br>
                    Telephone: (562) 531-8030 • Fax: (562) 531-8088<br>
                    <a href="mailto:rampcamp@dslextreme.com">rampcamp@dslextreme.com</a>        
                    </div>

                </div>
                <div id="validator">
                    <span><a href="http://validator.w3.org/check?uri=referer">
                        <img src="http://www.w3.org/Icons/valid-html401"
                        alt="Valid HTML 4.01 Strict" height="31" width="88"></a></span>
                    <span><a href="http://jigsaw.w3.org/css-validator/check/referer">
                        <img src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                        alt="Valid CSS!" height="31" width="88"></a></span>
                </div>
            </div>  
        </div>

 	</body>
</html>

