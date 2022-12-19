
/**
 * New Customer
 */
let newCustBut = document.querySelector("#newCust");
let custForm = document.querySelector("#custForm");
custForm.addEventListener("submit", (e)=>{
    newCustBut.innerHTML = "Profiling New Customer...";
    e.preventDefault(); 
    const formData = new FormData(custForm);
    fetch("includes/custAdd.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "New Customer Added") {
        newCustBut.innerHTML = "Add New Customer Details";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; New Customer added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        custForm.reset();
      }
       else {
        newCustBut.innerHTML = "Add New Customer Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        newCustBut.innerHTML = "Add New Customer Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});