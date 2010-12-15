function body_OnLoad()
{
	message.style.visibility = "hidden";

	lblCustomer.style.visibility = "hidden";
	cboCustomer.style.visibility = "hidden";
	
	lblPartNumber.style.visibility = "hidden";
	cboPartNumber.style.visibility = "hidden";
	
	lblRevision.style.visibility = "hidden";
	cboRevision.style.visibility = "hidden";
	
	lblOperation.style.visibility = "hidden";
	cboOperation.style.visibility = "hidden";
	
	lblMachine.style.visibility = "hidden";
	cboMachine.style.visibility = "hidden";
	
	lblCodeFile.style.visibility = "hidden";
	txtCodeFile.style.visibility = "hidden";
	btnBrowseCode.style.visibility= "hidden";
	
	lblGeometryFile.style.visibility = "hidden";
	txtGeometryFile.style.visibility = "hidden";
	btnBrowseGeometry.style.visibility= "hidden";
	
	btnSubmit.style.visibility = "hidden";
}

function chooseDownload_Click()
{
	message.style.visibility = "visible";

	lblCustomer.style.visibility = "visible";
	cboCustomer.style.visibility = "visible";
	
	lblPartNumber.style.visibility = "visible";
	cboPartNumber.style.visibility = "visible";
	
	lblRevision.style.visibility = "visible";
	cboRevision.style.visibility = "visible";
	
	lblOperation.style.visibility = "visible";
	cboOperation.style.visibility = "visible";
	
	lblMachine.style.visibility = "visible";
	cboMachine.style.visibility = "visible";
	
	lblCodeFile.style.visibility = "hidden";
	txtCodeFile.style.visibility = "hidden";
	btnBrowseCode.style.visibility= "hidden";
	
	lblGeometryFile.style.visibility = "hidden";
	txtGeometryFile.style.visibility = "hidden";
	btnBrowseGeometry.style.visibility= "hidden";
	
	btnSubmit.style.visibility = "visible";
	btnSubmit.value = "Download";
}

function chooseUpload_Click()
{
	message.style.visibility = "visible";
	
	lblCustomer.style.visibility = "visible";
	cboCustomer.style.visibility = "visible";
	
	lblPartNumber.style.visibility = "visible";
	cboPartNumber.style.visibility = "visible";
	
	lblRevision.style.visibility = "visible";
	cboRevision.style.visibility = "visible";
	
	lblOperation.style.visibility = "visible";
	cboOperation.style.visibility = "visible";
	
	lblMachine.style.visibility = "visible";
	cboMachine.style.visibility = "visible";	

	lblCodeFile.style.visibility = "visible";
	txtCodeFile.style.visibility = "visible";
	btnBrowseCode.style.visibility= "visible";
	
	lblGeometryFile.style.visibility = "visible";
	txtGeometryFile.style.visibility = "visible";
	btnBrowseGeometry.style.visibility = "visible";
	
	btnSubmit.style.visibility = "visible";
	
	btnSubmit.value = "Upload";

}
