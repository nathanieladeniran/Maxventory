
/**
 * New Book
 */
let newBookBut = document.querySelector("#newBook");
let bookName = document.querySelector('#itemname').value;
let bookForm = document.querySelector("#bookForm");
bookForm.addEventListener("submit", (e)=>{
    newBookBut.innerHTML = "Adding New book...";
    e.preventDefault(); 
    const formData = new FormData(bookForm);
    fetch("includes/bookAdd.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
      if (text == "New Book Added") {
        console.log(bookName);
        newBookBut.innerHTML = "Add New Book Details";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; added to stock <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        bookForm.reset();
      }
       else {
        newBookBut.innerHTML = "Add New Book Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Invalid Details Supplied <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

    }).catch((error)=>{
        newBookBut.innerHTML = "Add New Book Details";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
  
});