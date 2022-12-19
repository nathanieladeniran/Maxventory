
/**
 * New Book
 */
let updCatBut = document.querySelector("#updCat");
let editCatForm = document.querySelector("#editCatForm");
editCatForm.addEventListener("submit", (e)=>{
    updCatBut.innerHTML = "Updating Category Details...";
    e.preventDefault(); 
    const formData = new FormData(editCatForm);
    fetch("includes/updateCategoryDetail.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "Category Details Updated") {
        updCatBut.innerHTML = "Edit Details";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Book Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }
       else {
        updCatBut.innerHTML = "Edit Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        updCatBut.innerHTML = "Edit Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});