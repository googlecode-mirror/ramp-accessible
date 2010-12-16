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
                    
                    <?php
                        function validate()
                        {
                            $errors = "";
                            if($_POST['customer'] == "Please select a Customer...")
                                $errors .= "Please select a Customer<br />";
                                
                            if($_POST['partNumber'] == "Please select a Part Number...")
                                $errors .= "Please select a Part Number<br />";
                            
                            if($_POST['revision'] == "Please select a Revision...")
                                $errors .= "Please select a Revision<br />";
                                
                            if($_POST['operation'] == "Please select an Operation...")
                                $errors .= "Please select an Operation<br />";
                                
                            if($_POST['machine'] == "Please select a Machine...")
                                $errors .= "Please select a Machine<br />";
                                
                            if($_POST['submit'] == "Upload")
                                if(!$_POST['ofdCodeFile'] && !$_POST['ofdGeometryFile'])
                                    $errors .= "At least one file must be selected for uploading<br />";
                            
                            return $errors;
                        }
                        if($_POST['submit'])
                        {
                            $errors = validate();
                            
                            if(strlen($errors) > 0)
                            {
                                echo "<STRONG>Cannot perform file transfer!</STRONG><BR>";
                                echo "The following errors occurred:<BR><div style=\"color: red\">".$errors."</div>";
                            }
                            else
                            {
                                echo "<p>File transfer under way...</p>";
                                
                                if($_POST['submit'] == "Upload")
                                {
                                    //TODO get the programRevisionID
                                    mysql_connect('infoserver.cecs.csulb.edu','nscott','egiJ4rai') or die(mysql_error());
                                    mysql_select_db('nscott') or die(mysql_error());
                                    
                                    $query = "SELECT idsProgramRevisionID AS id FROM tblProgramRevision pr ";
                                    $query .= "INNER JOIN tblProgram p USING (idsProgramID) ";
                                    $query .= "INNER JOIN tblMachine m USING (idsMachineID) ";
                                    $query .= "INNER JOIN tblOperation op USING (idsOperationID) ";
                                    $query .= "INNER JOIN tblOperationNumber opn USING (idsOperationNumberID) ";
                                    $query .= "INNER JOIN tblPart prt USING (idsPartID) ";
                                    $query .= "INNER JOIN tblRevision r USING (idsRevisionID) ";
                                    $query .= "INNER JOIN tblCompany c USING (idsCompanyID) ";
                                    $query .= "WHERE c.chrName = \'".$_POST['customer']."\' ";
                                    $query .= "AND prt.chrPartNumber = \'".$_POST['partNumber']."\' ";
                                    $query .= "AND r.chrRevision = \'".$_POST['revision']."\' ";
                                    $query .= "AND opn.intOperationNumber = ".$_POST['operation']." ";
                                    $query .= "AND m.chrMachineName = \'".$_POST['machine']."\' ";
                                    
                                    $result = mysql_query($query);
                                    $programRevision = mysql_fetch_array($result);
                                    
                                    // Upload the files to the server
                                    if($_POST['ofdCodeFile'])
                                    {   
                                        $codeDest = "Programs/Code/".$programRevision['id'].basename($_FILES['ofdCodeFile']['name'])
                                        
                                        if (mkdir($codeDest, 0777, true))
                                        {
                                            // Transfer the temporary file on the server to 
                                            // its new destination
                                            if(move_uploaded_file($_FILES['ofdCodeFile']['tmp_name'], $codeDest))
                                                $errors .= "Code file upload failure.";
                                            else
                                                $errors .= "Code file upload success.";
                                        }
                                        else
                                        {
                                            $errors .= "Code file upload failure";
                                        }
                                    }
                                    if($_POST['ofdGeometryFile'])
                                    {
                                        $geoDest = "Programs/Geometry/".$programRevision['id'].basename($_FILES['ofdGeometryFile']['name'])
                                        
                                        if (mkdir($geoDest, 0777, true))
                                        {   
                                            // Transfer the temporary file on the server to 
                                            // its new destination
                                            if(move_uploaded_file($_FILES['ofdGeometryFile']['tmp_name'], $geoDest))
                                                $errors .= "Geometry file upload failure.";
                                            else
                                                $errors .= "Geometry file upload success.";
                                        }
                                        else
                                        {
                                            $errors .= "Geometry file upload failure";
                                        }
                                    }
                                    
                                    echo $errors."<br />";
                                }
                                else
                                {                                    
                                    //TODO get the programRevisionID
                                    mysql_connect('infoserver.cecs.csulb.edu','nscott','egiJ4rai') or die(mysql_error());
                                    mysql_select_db('nscott') or die(mysql_error());
                                                                        
                                    $query = "SELECT idsProgramRevisionID AS id, chrCodeFiles, chrGeometryFiles "
                                    $query .= "FROM tblProgramRevision pr ";
                                    $query .= "INNER JOIN tblProgram p USING (idsProgramID) ";
                                    $query .= "INNER JOIN tblMachine m USING (idsMachineID) ";
                                    $query .= "INNER JOIN tblOperation op USING (idsOperationID) ";
                                    $query .= "INNER JOIN tblOperationNumber opn USING (idsOperationNumberID) ";
                                    $query .= "INNER JOIN tblPart prt USING (idsPartID) ";
                                    $query .= "INNER JOIN tblRevision r USING (idsRevisionID) ";
                                    $query .= "INNER JOIN tblCompany c USING (idsCompanyID) ";
                                    $query .= "WHERE c.chrName = \'".$_POST['customer']."\' ";
                                    $query .= "AND prt.chrPartNumber = \'".$_POST['partNumber']."\' ";
                                    $query .= "AND r.chrRevision = \'".$_POST['revision']."\' ";
                                    $query .= "AND opn.intOperationNumber = ".$_POST['operation']." ";
                                    $query .= "AND m.chrMachineName = \'".$_POST['machine']."\' ";
                                    
                                    $result = mysql_query($query);
                                    $programRevision = mysql_fetch_array($result);
                                    
                                    // Download the code file
                                    if($programRevision['chrCodeFiles'] != "") // TODO check for null also
                                    {
                                        $filepath = "Programs/Code/".$programRevision['id']."/".$programRevision['chrCodeFiles'];
                                        flush();
                                        readfile($filepath);
                                    }
                                    
                                    //Download the geometry file
                                    if($programRevision['chrGeometryFiles'] != "") // TODO check for null also
                                    {
                                        $filepath = "Programs/Geometry/".$programRevision['id']."/".$programRevision['chrGeometryFiles'];
                                        flush();
                                        readfile($filepath);
                                    }
                                    
                                }
                            }
                        }
                        else
                        {
                    ?>
                    
                    <p>What would you like to do?
                    <br />
                    <button name="chooseDownload" onClick="chooseDownload_Click()">Download</button>
                    or
                    <button name="chooseUpload" onClick="chooseUpload_Click()">Upload</button>
                    </p>
                    
                    <form action="files.php" name="files" onsubmit="return validate()" method="POST" enctype="multipart/form-data">    
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
                        <select id="cboCustomer" name="customer" onblur="validateComboBox(id, 'customerMessage')">                    
                            <option>Select a Customer...</option>
                            <!-- import values from database -->
                            <?php
                                while($row = mysql_fetch_array($customers))
                                {
                                    echo "<option>".$row['chrName']."</option>";
                                }
                            ?>
                        </select>
                        <span id="customerMessage" class="error">Please select a Customer</span>
                        <br />
                        
                        <label id="lblPartNumber" for="partNumber">Part Number:</label>
                        <select id="cboPartNumber" name="partNumber" onblur="validateComboBox(id, 'partNumberMessage')">                    
                            <option>Select a Part Number...</option>
                            <option>test</option>
                            <!-- import values from database -->
                            <?php
                                while($row = mysql_fetch_array($partNumbers))
                                {
                                    echo "<option>".$row['chrPartNumber']."</option>";
                                }
                            ?>
                        </select>
                        <span id="partNumberMessage" class="error">Please select a Part Number</span>
                        <br />
                        
                        <label id="lblRevision" for="revision">Revision:</label>
                        <select id="cboRevision" name="revision" onblur="validateComboBox(id, 'revisionMessage')">                    
                            <option>Select a Revision...</option>
                            <!-- import values from database -->
                            <?php
                                while($row = mysql_fetch_array($revisions))
                                {
                                    echo "<option>".$row['chrRevision']."</option>";
                                }
                            ?>
                        </select>
                        <span id="revisionMessage" class="error">Please select a Revision</span>
                        <br />
                        
                        <label id="lblOperation" for="operation">Operation:</label>
                        <select id="cboOperation" name="operation" onblur="validateComboBox(id, 'operationMessage')">                    
                            <option>Select an Operation...</option>
                            <!-- import values from database -->
                            <?php
                                while($row = mysql_fetch_array($operations))
                                {
                                    echo "<option>".$row['intOperationNumber']."</option>";
                                }
                            ?>
                        </select>
                        <span id="operationMessage" class="error">Please select an Operation</span>
                        <br />
                        
                        <label id="lblMachine" for="machine">Machine:</label>
                        <select id="cboMachine" name="machine" onblur="validateComboBox(id, 'machineMessage')">                    
                            <option>Select a Machine...</option>
                            <!-- import values from database -->
                            <?php
                                while($row = mysql_fetch_array($machines))
                                {
                                    echo "<option>".$row['chrMachineName']."</option>";
                                }
                                
                            } // end of else
                            ?>
                        </select>
                        <span id="machineMessage" class="error">Please select a Machine</span>
                        <br />
                        
                        <label id="lblCodeFile" for="codeFile">Code File:</label>
                        <input type="file" id="ofdCodeFile" name="codeFile" size="40"></input>
                        <br />
                        
                        <label id="lblGeometryFile" for="geomertyFile">Geometry File:</label>
                        <input type="file" id="ofdGeometryFile" name="geometryFile" size="40"></input>
                        <br />
                        
                        
                        <input type="submit" id="btnSubmit" name="submit" value="Submit" style="font-size: .8em; margin-left:18%"></input>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>