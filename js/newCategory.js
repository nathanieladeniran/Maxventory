
/**
 * New Book
 */
let newCatBut = document.querySelector("#newCat");
let catName = document.querySelector('#catname').value;
let catForm = document.querySelector("#catForm");
catForm.addEventListener("submit", (e)=>{
    newCatBut.innerHTML = "Creating New Category...";
    e.preventDefault(); 
    const formData = new FormData(catForm);
    fetch("includes/categoryAdd.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "New Category Added") {
        newCatBut.innerHTML = "Add New Book Details";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp;New Category added to stock <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        catForm.reset();
      }
       else {
        newCatBut.innerHTML = "Add New Book Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        newCatBut.innerHTML = "Add New Book Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});