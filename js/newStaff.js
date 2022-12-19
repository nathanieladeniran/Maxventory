
/**Get Staff Count and generate staff rolll No */
staffid = parseInt(document.querySelector("#staffcount").value)+1;
if(staffid<=9){staffid='0000'+staffid;}
else if(staffid>=10){staffid='000'+staffid;}
else if(staffid>=100){staffid='00'+staffid;}
else if(staffid>=1000){staffid='0'+staffid;}
else if(staffid>=10000){staffid=staffid;}
else if(isNaN(staffid)==true){staffid='0000'+1;}
document.querySelector("#rollno").value = "Max"+staffid

/**
 * New Customer
 */
let newStaffBut = document.querySelector("#newStaff");
let staffForm = document.querySelector("#staffForm");
staffForm.addEventListener("submit", (e)=>{
    newStaffBut.innerHTML = "Profiling New Staff...";
    e.preventDefault(); 
    const formData = new FormData(staffForm);
    fetch("includes/staffAdd.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "New Staff Added") {
        newStaffBut.innerHTML = "Add New Staff Details";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; New Staff added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        staffForm.reset();
      }
       else {
        newStaffBut.innerHTML = "Add New Staff Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        newStaffBut.innerHTML = "Add New Staff Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});