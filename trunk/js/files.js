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
uploadElements[1] = "txtCodeFile";
uploadElements[2] = "btnBrowseCode";
uploadElements[3] = "lblGeometryFile";
uploadElements[4] = "txtGeometryFile";
uploadElements[5] = "btnBrowseGeometry";


function body_OnLoad()
{
	var element;
	
	message.style.visibility = "hidden";

	for (element in downloadElements)
	{	
		document.getElementById(downloadElements[element]).style.visibility = "hidden";
	}
	
	for (element in uploadElements)
	{	
		document.getElementById(uploadElements[element]).style.visibility = "hidden";
	}
	
	btnSubmit.style.visibility = "hidden";
}

function chooseDownload_Click()
{
	var element;
	
	message.style.visibility = "visible";

	for (element in downloadElements)
	{	
		document.getElementById(downloadElements[element]).style.visibility = "visible";
	}
	
	for (element in uploadElements)
	{	
		document.getElementById(uploadElements[element]).style.visibility = "hidden";
	}
	
	btnSubmit.style.visibility = "visible";
	btnSubmit.value = "Download";
}

function chooseUpload_Click()
{
	var element;
	message.style.visibility = "visible";
	
	for (element in downloadElements)
	{	
		document.getElementById(downloadElements[element]).style.visibility = "visible";
	}
	
	for (element in uploadElements)
	{	
		document.getElementById(uploadElements[element]).style.visibility = "visible";
	}
	
	btnSubmit.style.visibility = "visible";
	
	btnSubmit.value = "Upload";

}
