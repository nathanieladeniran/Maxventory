

/**
 * New Staff Login
 */
 let cLoginBut = document.querySelector("#cLogin");
 let cForm = document.querySelector("#cForm");
 let pass = document.querySelector("#staff_password");
 let cpass = document.querySelector("#cpass");
 cLoginBut.disabled = true;

 cpass.addEventListener('keyup', (evt)=>{
  let password = pass.value;
  let confirm = evt.target.value;
  if (password != confirm) {
    cLoginBut.disabled = true;
    document.querySelector("#msg").innerHTML = "Password DO Not Match";
  }else{
    document.querySelector("#msg").innerHTML = "This field is compulsory";
    cLoginBut.disabled = false;
  }
 });

cForm.addEventListener("submit", (e)=>{
    e.preventDefault();
        cLoginBut.innerHTML = "Setting Up Login...";        
        const formData = new FormData(cForm);
        fetch("includes/createLogin.inc", {
        method: "POST",
        body: formData
        }).then((response)=>{
        return response.text();
        }).then((text)=>{
        if (text == "Login Created") {
            cLoginBut.innerHTML = "Create Staff Login";        
            $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Login Created <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            cForm.reset();
        }
        else {
            cLoginBut.innerHTML = "Create Staff Login";
            $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }

        }).catch((error)=>{
            cLoginBut.innerHTML = "Create Staff Login";
            $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            console.error(error);
        });
  
});
