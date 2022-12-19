
/**
 * New Book
 */
let updCustBut = document.querySelector("#editCust");
let custForm = document.querySelector("#custForm");
custForm.addEventListener("submit", (e)=>{
    updCustBut.innerHTML = "Updating Customer Details...";
    e.preventDefault(); 
    const formData = new FormData(custForm);
    fetch("includes/updateCustomerDetail.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "Customer Details Updated") {
        updCustBut.innerHTML = "Edit Details";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Customer Details Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }
       else {
        updCustBut.innerHTML = "Edit Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        updCustBut.innerHTML = "Edit Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});