/************************ ACCOUNT LOGIN ***************************/

/**Accoun Login Using Modal*/
let logBut = document.querySelector("#loginBut");
let loginId = document.querySelector('#loginid').value;
let loginPass = document.querySelector('#loginpass').value;
let logForm = document.querySelector("#loginForm");
logForm.addEventListener("submit", (e)=>{
    logBut.innerHTML = "Authenticating Crediential...";
    e.preventDefault();    
    //let logForm = document.querySelector("#loginForm");
    const formData = new FormData(logForm);
    fetch("includes/userLogin.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "valid") {
        logBut.innerHTML = "Authenticated Redirecting...";
        //$("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp;Login Successful, Redirecting <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        logForm.reset();
          window.location = "index";      
        
      }
       else {
        logBut.innerHTML = "Login";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        logBut.innerHTML = "Login";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});
/**Account Login with Modal Ends */