<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
  		<meta http-equiv="Content-Type" content="text/html charset=utf-8">
  		<link rel="stylesheet" href="css/ramp.css" type="text/css">
  		<link rel="shortcut icon" href="imgs/icon/ramp.ico">
  		<title>RAMP Engineering</title>
		<script type ="text/javascript">
		function validateForm(){
			if(document.login.userName.value =="")
			{
				alert("Please Enter your User name");
				return false;
			}
			if(document.login.password.value=="")
			{
				alert("Please Enter Your password");
				return false;
			}
		}
			
		
		</script>
	</head>
 
 	<body>
	<?php
	if(isset($_POST['submit']))
	{
		$validUser = true;
		$validPass = true; 
		$errorMessage = "";
		$companyLoggedIn = false; 
		$employeeLoggedIn = false;
		
		
		if($_POST['userName'] =="")
		{
			$errorMessage[0]="Please enter your User name ";
			$validUser = false;
		}
			
		if($_POST['password']=="")
		{
			$errorMessage[1]="Please enter your Password ";
			$validPass = false;
		}
		if($validUser == true && $validPass == true)
		{
			$host="infoserver.cecs.csulb.edu:3306"; 
			$DBusername="lmendoza"; 
			$DBpassword="Wae3aiph"; 
			$db_name="lmendoza"; 
			$tbl_name="tblCompanyLogin"; 
			$tbl_name2="tblEmployee";
			$userName = $_POST["userName"];
			$password = $_POST["password"];

			$con = mysql_connect($host,$DBusername,$DBpassword);
			if(!$con)
				die('Could not connect to the database'. mysql_error());
			mysql_select_db($db_name,$con) or die(mysql_error());
			$sql="SELECT chrUsername, chrPassword  FROM $tbl_name2 WHERE chrUsername='{$userName}' and chrPassword='{$password}'";
			$employeeResult=mysql_query($sql,$con) OR die(mysql_error());
			$employeeRow = mysql_fetch_array($employeeResult);
			$count=mysql_num_rows($employeeResult);
			
			$companySql="SELECT chrUsername, chrPassword, idsCompanyID  FROM $tbl_name WHERE chrUsername='{$userName}' and chrPassword='{$password}'";
			$companyResult = mysql_query($companySql,$con) OR die(mysql_error());
			$companyRow = mysql_fetch_array($companyResult);
			$companyCount = mysql_num_rows($companyResult);
			if($count == 1)
			{
				session_start();
				session_regenerate_id();
				$_SESSION['USER_NAME']=$employeeRow['chrUsername'];
				session_write_close();
				mysql_close();
				header("location:loginhome.php");
			}
			if($companyCount == 1)
			{
				session_start();
				session_regenerate_id();
				$_SESSION['USER_NAME']=$companyRow['chrUsername'];
				$_SESSION['COMPANY_ID'] = $companyRow['idsCompanyID'];
				session_write_close();
				mysql_close();
				header("location:loginhome.php");
			}
			else if( $companyCount !=1 && $count != 1) 
			{
				$errorMessage[2] = "Incorrect Login Credentials.";
			}

			
		}
		
		
		
	}
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
                    <li><a href="login.php" alt="LOG IN">LOG IN</a></li>

                </ul>           
            </div>           	
            
            <div id="center">
                <div id="content">
			<Form name = "login" action = "login.php" method="POST" onSubmit = "validateForm()" >
				<p class ="red"><?php for ($i = 0; $i<=2;$i++){
										if($errorMessage[$i] !="")
										{
											echo $errorMessage[$i];?>
				<br/>
				<?php
										}
									}?>
				</p>
	            <label for = "userName" class ="ci"> User Name: </label>
				<input type = "text" name = "userName" class ="ci" value = "<?php echo $_POST['userName'];?>" /><br/>
				<label for ="password" class = "ci">Password:</label>
				<input type = "password" name = "password" class ="ci" / ><br/>
				<input type="Submit" id ="submit" Value="Submit" name = "submit"/>
		
			</Form>
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

