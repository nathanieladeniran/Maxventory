
/**
 * Edit staff
 */
let updStaffBut = document.querySelector("#editStaff");
let staffForm = document.querySelector("#staffForm");
staffForm.addEventListener("submit", (e)=>{
    updStaffBut.innerHTML = "Updating Staff Details...";
    e.preventDefault(); 
    const formData = new FormData(staffForm);
    fetch("includes/updateStaffDetail.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "Staff Details Updated") {
        updStaffBut.innerHTML = "Edit Details";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Staff Details Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }
       else {
        updStaffBut.innerHTML = "Edit Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        updStaffBut.innerHTML = "Edit Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});

/**Update Password */
let editPassBut = document.querySelector("#editPass");
 let editPassForm = document.querySelector("#editPassForm");
 let spassword = document.querySelector("#staff_password");
 let spass = document.querySelector("#spass");
 editPassBut.disabled = true;

 spass.addEventListener('keyup', (evt)=>{  
  let realpass = spassword.value;
  let confirms = evt.target.value;
  if (realpass != confirms) {
    editPassBut.disabled = true;
    document.querySelector("#cmsg").innerHTML = "Password DO Not Match";
  }else{
    document.querySelector("#cmsg").innerHTML = "This field is compulsory";
    editPassBut.disabled = false;
  }
 });

 editPassForm.addEventListener("submit", (e)=>{
    e.preventDefault();
    editPassBut.innerHTML = "Updating Password...";        
        const formData = new FormData(editPassForm);
        fetch("includes/createLogin.inc", {
        method: "POST",
        body: formData
        }).then((response)=>{
        return response.text();
        }).then((text)=>{
        if (text == "Login Created") {
          editPassBut.innerHTML = "Update Password";        
            $("#msg").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Password Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            editPassForm.reset();
        }
        else {
          editPassBut.innerHTML = "Update Password";
            $("#msg").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Can not update password now <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }

        }).catch((error)=>{
          editPassBut.innerHTML = "Update Password";
            $("#msg").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            console.error(error);
        });
  
});

/**Update Staff Image */
let editImgBut = document.querySelector("#editImg");
let imgForm = document.querySelector("#imgForm");
imgForm.addEventListener("submit", (e)=>{
    editImgBut.innerHTML = "Updating Profile Picture...";
    e.preventDefault(); 
    const formData = new FormData(imgForm);
    fetch("includes/updateStaffPics.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "Staff Picture Updated") {
        editImgBut.innerHTML = "Update Picture";        
        $("#picmsg").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Staff Picture Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }
       else {
        editImgBut.innerHTML = "Update Picture";
        $("#picmsg").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        editImgBut.innerHTML = "Update Picture";
        $("#picmsg").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});
