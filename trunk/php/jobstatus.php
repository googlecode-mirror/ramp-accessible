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
	$host="infoserver.cecs.csulb.edu:3306"; 
	$DBusername="lmendoza"; 
	$DBpassword="Wae3aiph"; 
	$db_name="lmendoza"; 
	$con = mysql_connect($host,$DBusername,$DBpassword);
	if(!$con)
		die('Could not connect to the database'. mysql_error());
	mysql_select_db($db_name,$con) or die(mysql_error());
	$tbl_name="tblJob"; 
	$sql="SELECT idsJobNumber, idsPartID, chrPONumber, dtmDateReceived, blnShipped, blnReleased, intComplete, chrDescription, chrName FROM tblJob INNER JOIN tblPart 			USING(idsPartID) INNER JOIN tblCompany USING(idsCompanyID)";
	$jobResult=mysql_query($sql,$con) OR die(mysql_error());
	$jobCount=mysql_num_rows($jobResult);

	$companySql="SELECT idsJobNumber, idsPartID, chrPONumber, dtmDateReceived, blnShipped, blnReleased, intComplete,chrDescription FROM tblCompany INNER JOIN tblPart USING 		(idsCompanyID) INNER JOIN tblJob USING(idsPartID) WHERE idsCompanyID = '{$_SESSION['COMPANY_ID']}' ";
	$companyResult=mysql_query($companySql,$con) OR die(mysql_error());
	$companyCount=mysql_num_rows($companyResult);
	
	mysql_close();
	$i = 0;
	$j = 0;
	
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
			<p> Welcome to the Job Status Page. Here you can view the status of all of your jobs.</p>
			

			<?php
				if($employee == true)
				{
			?>
			<table>
			<caption>Job Status</caption>					
                        <thead>
                            <tr>
                                <th>Job Number</th>
                                <th>Part ID</th>
				<th>Company Name</th>
                                <th>PO Number</th>
				<th>Description</th>
                                <th>Date Received</th>
                                <th>Date Shipped</th>
                                <th>Date Released</th>
				<th>Percentage Complete</th>
                        </tr>
                        </thead>
			<?php
				while($i < $jobCount)
					{
						$idsJobNumber = mysql_result($jobResult,$i,"idsJobNumber");
						$idsPartID = mysql_result($jobResult,$i,"idsPartID");
						$chrPONumber = mysql_result($jobResult,$i,"chrPONumber");
						$dtmDateReceived = mysql_result($jobResult,$i,"dtmDateReceived");
						$blnShipped = mysql_result($jobResult,$i,"blnShipped");
						$blnReleased = mysql_result($jobResult,$i,"blnReleased");
						$intComplete= mysql_result($jobResult,$i,"intComplete");
						$description= mysql_result($jobResult,$i,"chrDescription");
						$Name= mysql_result($jobResult,$i,"chrName");
			
					?>
				
				<tr>
					<td ><?php echo $idsJobNumber; ?></td>
					<td ><?php echo $idsPartID; ?></td>
					<td><?php echo $Name; ?></td>
					<td ><?php echo $chrPONumber; ?></td>
					<td><?php echo $description; ?></td>
					<td ><?php echo $dtmDateReceived; ?></td>
					<td ><?php echo $blnShipped; ?></td>
					<td ><?php echo $blnReleased; ?></td>
					<td ><?php echo $intComplete; ?></td>
					
			<?php
					$i++;
					}				
				?>
				</tr>
				</table>
			<?php
				}
				?>
				
			<?php
				if($company == true)
				{
			?>
				<table>
			<caption>Job Status</caption>					
                        <thead>
                            <tr>
                                <th>Job Number</th>
                                <th>Part ID</th>
                                <th>PO Number</th>

                                <th>Date Received</th>
                                <th>Date Shipped</th>
                                <th>Date Released</th>
				<th>Percentage Complete</th>
				<th>Description</th>
                        </tr>
                        </thead>
			<?php
				while($j < $companyCount)
					{
						$idsJobNumber = mysql_result($companyResult,$j,"idsJobNumber");
						$idsPartID = mysql_result($companyResult,$j,"idsPartID");
						$chrPONumber = mysql_result($companyResult,$j,"chrPONumber");
						$dtmDateReceived = mysql_result($companyResult,$j,"dtmDateReceived");
						$blnShipped = mysql_result($companyResult,$j,"blnShipped");
						$blnReleased = mysql_result($companyResult,$j,"blnReleased");
						$intComplete= mysql_result($companyResult,$j,"intComplete");
						$description= mysql_result($companyResult,$j,"chrDescription");
			
					?>
				
				<tr>
					<td ><?php echo $idsJobNumber; ?></td>
					<td ><?php echo $idsPartID; ?></td>
					<td ><?php echo $chrPONumber; ?></td>
					<td ><?php echo $dtmDateReceived; ?></td>
					<td ><?php echo $blnShipped; ?></td>
					<td ><?php echo $blnReleased; ?></td>
					<td ><?php echo $intComplete; ?></td>
					<td ><?php echo $description; ?></td>
					
			<?php
					$j++;
					}				
				?>
				</tr>
				</table>
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

