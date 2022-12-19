
/**
 * New Book
 */
let updPayBut = document.querySelector("#updPay");
let editPayForm = document.querySelector("#editPayForm");
editPayForm.addEventListener("submit", (e)=>{
    updPayBut.innerHTML = "Updating Payment...";
    e.preventDefault(); 
    const formData = new FormData(editPayForm);
    fetch("includes/updatePayStatus.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "Payment Updated") {
        updPayBut.innerHTML = "Edit Payment Status";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Payment Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        document.querySelector('#amount_sent').value = "";
        document.querySelector('#paytype').selectedIndex = 0;
        document.querySelector('#paymethod').selectedIndex = 0;
      }
       else {
        updPayBut.innerHTML = "Edit Payment Status";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp; Payment Can Not Be Updated Now <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        updPayBut.innerHTML = "Edit Payment Status";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
});

/**Making Payment field uneditable if payment type is No payment */
let payT = document.querySelector('#paytype');
payT.addEventListener('change', (event)=>{
    if(payT.value == 'Full Payment'){
        document.querySelector('#amount_sent').readOnly = true;
        document.querySelector('#amount_sent').value = document.querySelector('#amtdue').value;
    }else{
        document.querySelector('#amount_sent').readOnly = false;
        document.querySelector('#amount_sent').value = "";
    }
});