

/**
 * New Staff Login
 */
 let passBut = document.querySelector("#passBut");
 let cForm = document.querySelector("#cForm");
 let pass = document.querySelector("#new_password");
 let cpass = document.querySelector("#cpass");
 passBut.disabled = true;

 cpass.addEventListener('keyup', (evt)=>{
  let password = pass.value;
  let confirm = evt.target.value;
  if (password != confirm) {
    passBut.disabled = true;
    document.querySelector("#msg").innerHTML = "Password DO Not Match";
  }else{
    document.querySelector("#msg").innerHTML = "This field is compulsory";
    passBut.disabled = false;
  }
 });

cForm.addEventListener("submit", (e)=>{
    e.preventDefault();
        passBut.innerHTML = "Updating Password...";        
        const formData = new FormData(cForm);
        fetch("includes/updatePassword.inc", {
        method: "POST",
        body: formData
        }).then((response)=>{
        return response.text();
        }).then((text)=>{
        if (text == "Login Created") {
            passBut.innerHTML = "Update Password";        
            $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Password Updated, Logging you out <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            cForm.reset();
            window.location = "logout"; 
            setTimeout(window.location,15000);
        }
        else {
            passBut.innerHTML = "Update Password";
            $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }

        }).catch((error)=>{
            passBut.innerHTML = "Update Password";
            $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            console.error(error);
        });
  
});
