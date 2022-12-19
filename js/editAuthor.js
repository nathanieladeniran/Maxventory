
/**
 * New Book
 */
let updAuthorBut = document.querySelector("#editAuthor");
let authorForm = document.querySelector("#authorForm");
authorForm.addEventListener("submit", (e)=>{
    updAuthorBut.innerHTML = "Updating Author Details...";
    e.preventDefault(); 
    const formData = new FormData(authorForm);
    fetch("includes/updateAuthorDetail.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "Author Details Updated") {
        updAuthorBut.innerHTML = "Edit Details";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Author Details Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }
       else {
        updAuthorBut.innerHTML = "Edit Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        updAuthorBut.innerHTML = "Edit Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});