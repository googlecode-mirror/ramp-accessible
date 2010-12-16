<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
  		<meta http-equiv="Content-Type" content="text/html charset=utf-8">
  		<link rel="stylesheet" href="../css/ramp.css" type="text/css">
  		<link rel="shortcut icon" href="../imgs/icon/ramp.ico">
		<SCRIPT TYPE="text/javascript" SRC="../js/files.js"></SCRIPT>
  		<title>RAMP Engineering</title>
	</head>


 	<body onLoad="body_OnLoad()">
		<div id="leftside"><img src ="../imgs/bk_2.png" style = "height:60%; width: 100%"></img></div>
		<div id="rightside"><img src ="../imgs/bk_3.png" style = "height:60%; width: 100%"></img></div>

		<div id ="wrapper">
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
					<h3 style="padding:0; margin:.2em;">File Upload/Download</h3>
					
					<p>What would you like to do?
					<br />
					<button name="chooseDownload" onClick="chooseDownload_Click()">Download</button>
					or
					<button name="chooseUpload" onClick="chooseUpload_Click()">Upload</button>
					</p>
					
					<FORM>	
						<p id="message" style="font-weight: bold;">Select the Program information:</p>
						
						<?php
							// Connect to database
							mysql_connect('infoserver.cecs.csulb.edu','nscott','egiJ4rai') or die(mysql_error());
							mysql_select_db('nscott') or die(mysql_error());
							
							// Get Customers
							$query = "SELECT chrName FROM tblCompany c ";
							$query .= "INNER JOIN tblCompany_CompanyType cct ";
							$query .= "ON c.idsCompanyID = cct.idsCompanyID ";
							$query .= "INNER JOIN tblCompanyType ct ";
							$query .= "ON cct.idsCompanyTypeID = ct.idsCompanyTypeID ";
							$query .= "WHERE chrType = 'Customer' ";
							$query .= "ORDER BY chrName";
							$customers = mysql_query($query);
							
							// Get Part Numbers
							$query = "SELECT chrPartNumber FROM tblPart ";
							$query .= "ORDER BY chrPartNumber";
							$partNumbers = mysql_query($query);
							
							// Get Revisions
							$query = "SELECT chrRevision FROM tblRevision ";
							$query .= "ORDER BY chrRevision";
							$revisions = mysql_query($query);
							
							// Get operations
							$query = "SELECT intOperationNumber ";
						    $query .= "FROM tblOperationNumber ";
							$query .= "ORDER BY intOperationNumber";
							$operations = mysql_query($query);
							
							// Get machines
							$query = "SELECT chrMachineName FROM tblMachine ";
							$query .= "ORDER BY chrMachineName";
							$machines = mysql_query($query);							
						?>
						
						
						<label id="lblCustomer" for="customer">Customer:</label>
						<select id="cboCustomer" name="customer">					
							<option>Select a Customer...</option>
							<!-- import values from database -->
							<?php
								while($row = mysql_fetch_array($customers))
								{
									echo "<option>".$row['chrName']."</option>";
								}
							?>
						</select>
						<br />
						
						<label id="lblPartNumber" for="partNumber">Part Number:</label>
						<select id="cboPartNumber" name="partNumber">					
							<option>Select a Part Number...</option>
							<!-- import values from database -->
							<?php
								while($row = mysql_fetch_array($partNumbers))
								{
									echo "<option>".$row['chrPartNumber']."</option>";
								}
							?>
						</select>
						<br />
						
						<label id="lblRevision" for="revision">Revision:</label>
						<select id="cboRevision" name="revision">					
							<option>Select a Revision...</option>
							<!-- import values from database -->
							<?php
								while($row = mysql_fetch_array($revisions))
								{
									echo "<option>".$row['chrRevision']."</option>";
								}
							?>
						</select>
						<br />
						
						<label id="lblOperation" for="operation">Operation:</label>
						<select id="cboOperation" name="operation">					
							<option>Select an Operation...</option>
							<!-- import values from database -->
							<?php
								while($row = mysql_fetch_array($operations))
								{
									echo "<option>".$row['intOperationNumber']."</option>";
								}
							?>
						</select>
						<br />
						
						<label id="lblMachine" for="machine">Machine:</label>
						<select id="cboMachine" name="machine">					
							<option>Select a Machine...</option>
							<!-- import values from database -->
							<?php
								while($row = mysql_fetch_array($machines))
								{
									echo "<option>".$row['chrMachineName']."</option>";
								}
							?>
						</select>
						<br />
						
						<label id="lblCodeFile" for="codeFile">Code File:</label>
						<input type="file" id="ofdCodeFile" name="codeFile" size="40"></input>
						<br />
						
						<label id="lblGeometryFile" for="geomertyFile">Geometry File:</label>
						<input type="file" id="ofdGeometryFile" name="geometryFile" size="40"></input>
						<br />
						
						
						<input type="button" id="btnSubmit" value="Submit" style="font-size: .8em; margin-left:19%"></input>
					</FORM>
				</div>
			</div>
		</div>
	</body>
</html>