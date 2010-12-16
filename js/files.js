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


var uploadElements = new Array();
uploadElements[0] = "lblCodeFile";
uploadElements[1] = "ofdCodeFile";
uploadElements[3] = "lblGeometryFile";
uploadElements[4] = "ofdGeometryFile";


function body_OnLoad()
{
	var element;
	
	document.getElementById('message').style.visibility = "hidden";
	
	for (element in downloadElements)
	{	
		document.getElementById(downloadElements[element]).style.visibility = "hidden";
	}
	
	for (element in uploadElements)
	{	
		document.getElementById(uploadElements[element]).style.visibility = "hidden";
	}
	
	document.getElementById('btnSubmit').style.visibility = "hidden";
}

function chooseDownload_Click()
{
	var element;
	
	document.getElementById('message').style.visibility = "visible";

	for (element in downloadElements)
	{	
		document.getElementById(downloadElements[element]).style.visibility = "visible";
	}
	
	for (element in uploadElements)
	{	
		document.getElementById(uploadElements[element]).style.visibility = "hidden";
	}
	
	document.getElementById('btnSubmit').style.visibility= "visible";
	document.getElementById('btnSubmit').value = "Download";
}

function chooseUpload_Click()
{
	var element;
	
	document.getElementById('message').style.visibility = "visible";
	
	for (element in downloadElements)
	{	
		document.getElementById(downloadElements[element]).style.visibility = "visible";
	}
	
	for (element in uploadElements)
	{	
		document.getElementById(uploadElements[element]).style.visibility = "visible";
	}
	
	document.getElementById('btnSubmit').style.visibility = "visible";	
	document.getElementById('btnSubmit').value = "Upload";

}
