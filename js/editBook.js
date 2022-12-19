
/**
 * New Book
 */
let updBookBut = document.querySelector("#updBook");
let editbookForm = document.querySelector("#editBookForm");
editbookForm.addEventListener("submit", (e)=>{
    updBookBut.innerHTML = "Updating Book Details...";
    e.preventDefault(); 
    const formData = new FormData(editbookForm);
    fetch("includes/updateBookDetail.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "Book Details Updated") {
        updBookBut.innerHTML = "Edit Details";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Book Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }
       else {
        updBookBut.innerHTML = "Edit Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        updBookBut.innerHTML = "Edit Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});