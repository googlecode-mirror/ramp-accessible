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
						
						<label id="lblCustomer" for="customer">Customer:</label>
						<select id="cboCustomer" name="customer">					
							<option>Select a Customer...</option>
							<!-- import values from database -->
							<?php
								mysql_connect('infoserver.cecs.csulb.edu','nscott','egiJ4rai') or die(mysql_error());
								mysql_select_db('nscott') or die(mysql_error());
								
								$customers = "SELECT idsCompanyID, chrName FROM tblCompany c".
											  "INNER JOIN tblCompany_CompanyType cct ".
											  "ON c.idsCompanyID = cct.idsCompanyID ".
											  "INNER JOIN tblCompanyType ct ".
											  "ON cct.idsCompanyTypeID = ct.idsCompanyTypeID ".
											  "WHERE chrType = Customer";
								$result = mysql_query($getID);
								while($row = mysql_fetch_array($result, MYSQL_ASSOC))
								{
									echo "<option>".$row['chrName']."</option>";
									echo "<option>test</option>";
								}
							?>
						</select>
						<br />
						
						<label id="lblPartNumber" for="partNumber">Part Number:</label>
						<select id="cboPartNumber" name="partNumber">					
							<option>Select a Part Number...</option>
							<!-- import values from database -->
						</select>
						<br />
						
						<label id="lblRevision" for="revision">Revision:</label>
						<select id="cboRevision" name="revision">					
							<option>Select a Revision...</option>
							<!-- import values from database -->
						</select>
						<br />
						
						<label id="lblOperation" for="operation">Operation:</label>
						<select id="cboOperation" name="operation">					
							<option>Select an Operation...</option>
							<!-- import values from database -->
						</select>
						<br />
						
						<label id="lblMachine" for="machine">Machine:</label>
						<select id="cboMachine" name="machine">					
							<option>Select a Machine...</option>
							<!-- import values from database -->
						</select>
						<br />
						
						<label id="lblCodeFile" for="codeFile">Code File:</label>
						<input id="txtCodeFile" name="codeFile" size="40"></input>
						<button id="btnBrowseCode" name="browseCode">Browse...</button>
						<br />
						
						<label id="lblGeometryFile" for="geomertyFile">Geometry File:</label>
						<input id="txtGeometryFile" name="geometryFile" size="40"></input>
						<button id="btnBrowseGeometry" name="browseGeometry">Browse...</button>
						<br />
						
						<input type="button" id="btnSubmit" value="Submit" style="font-size: 1.15em; margin-left:19%"></input>
					</FORM>
				</div>
			</div>
		</div>
	</body>
</html>