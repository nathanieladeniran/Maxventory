
/**
 * New Book
 */
let newAuthorBut = document.querySelector("#newAuthor");
let authorForm = document.querySelector("#authorForm");
authorForm.addEventListener("submit", (e)=>{
    newAuthorBut.innerHTML = "Adding New Author...";
    e.preventDefault(); 
    const formData = new FormData(authorForm);
    fetch("includes/authorAdd.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{        
      if (text == "New Author Added") {
        newAuthorBut.innerHTML = "Add New Author Details";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; New Author <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        authorForm.reset();
      }
       else {
        newAuthorBut.innerHTML = "Add New Author Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        newAuthorBut.innerHTML = "Add New Author Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});