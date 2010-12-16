
var downloadElements = new Array();
downloadElements[0] = "lblCustomer";
downloadElements[1] = "cboCustomer";
downloadElements[2] = "lblPartNumber";
downloadElements[3] = "cboPartNumber";
downloadElements[4] = "lblRevision";
downloadElements[5] = "cboRevision";
downloadElements[6] = "lblOperation";
downloadElements[7] = "cboOperation";
downloadElements[8] = "lblMachine";
downloadElements[9] = "cboMachine";
downloadElements[10] = "cboWhichFile";

var uploadElements = new Array();
uploadElements[0] = "lblCodeFile";
uploadElements[1] = "ofdCodeFile";
uploadElements[3] = "lblGeometryFile";
uploadElements[4] = "ofdGeometryFile";

var errorElements = new Array();
errorElements[0] = "customerMessage";
errorElements[1] = "partNumberMessage";
errorElements[2] = "revisionMessage";
errorElements[3] = "operationMessage";
errorElements[4] = "machineMessage";

function body_OnLoad()
{    
	var element;
	
	document.getElementById('message').style.visibility = "hidden";
	
	for (element in downloadElements)
        document.getElementById(downloadElements[element]).style.visibility = "hidden";
	
	for (element in uploadElements)
        document.getElementById(uploadElements[element]).style.visibility = "hidden";
    
    for (element in errorElements)
        document.getElementById(errorElements[element]).style.visibility = "hidden";
        
	document.getElementById('btnSubmit').style.visibility = "hidden";
}

function chooseDownload_Click()
{
	var element;
	
	document.getElementById('message').style.visibility = "visible";

	for (element in downloadElements)
        document.getElementById(downloadElements[element]).style.visibility = "visible";
	
	for (element in uploadElements)
        document.getElementById(uploadElements[element]).style.visibility = "hidden";
	
	document.getElementById('btnSubmit').style.visibility= "visible";
	document.getElementById('btnSubmit').value = "Download";
}

function chooseUpload_Click()
{
	var element;
	
	document.getElementById('message').style.visibility = "visible";
	
	for (element in downloadElements)
        document.getElementById(downloadElements[element]).style.visibility = "visible";
	
	for (element in uploadElements)
        document.getElementById(uploadElements[element]).style.visibility = "visible";
        
    document.getElementById('cboWhichFile').style.visibility = "hidden";
	
	document.getElementById('btnSubmit').style.visibility = "visible";	
	document.getElementById('btnSubmit').value = "Upload";

}

function validateComboBox(id, messageId)
{
    var valid = true;
    
    if(document.getElementById(id).selectedIndex == 0)
    {   
        document.getElementById(messageId).style.visibility = "visible";
        valid = false;
    }
    else
        document.getElementById(messageId).style.visibility = "hidden";
        
    return valid;
}

function validate()
{
    var valid = true;

    if(document.getElementById('cboCustomer').selectedIndex == 0)
        valid = false;
        
    if(document.getElementById('cboPartNumber').selectedIndex == 0)
        valid = false;
        
    if(document.getElementById('cboRevision').selectedIndex == 0)
        valid = false;
        
    if(document.getElementById('cboOperation').selectedIndex == 0)
        valid = false;
        
    if(document.getElementById('cboMachine').selectedIndex == 0)
        valid = false;
        
    if(document.getElementById('btnSubmit').value == "Upload")
        if(document.getElementById('ofdGeometryFile').value == "")
            if(document.getElementById('ofdCodeFile').value = "")
                valid = false;
        
    return true;
}


