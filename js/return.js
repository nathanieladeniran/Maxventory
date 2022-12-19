
/**
 * New Book
 */
let retBut = document.querySelector("#retBut");
let returnForm = document.querySelector("#returnForm");
returnForm.addEventListener("submit", (e)=>{
    retBut.innerHTML = "Processing Return...";
    e.preventDefault(); 
    const formData = new FormData(returnForm);
    fetch("includes/returnBook.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
        retBut.innerHTML = "Process Return";        
        $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; Return Processed Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        window.location = "return"; 
        setTimeout(window.location,30000);

    }).catch((error)=>{
        retBut.innerHTML = "Process Return";
        $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        console.error(error);
    });
  
});

/** Quantity Change */
const changeItem = (e)=>{
  var ia = e.parentNode.parentNode.rowIndex;
  var tabl = document.querySelector('#itemTable');
  var rowCount = tabl.rows.length; 
  let discount = document.querySelector('#discount').value;
  var sumVal = 0; var grandTotal;          
        
  var newTot =   parseFloat(tabl.rows[ia].cells[3].querySelector('#itemprice').value) * parseFloat(tabl.rows[ia].cells[5].querySelector('#qtyreturn').value);
  tabl.rows[ia].cells[6].innerHTML = newTot;
  
  for(var i = 1; i < rowCount-3; i++)
  { 
      sumVal = sumVal + parseFloat(tabl.rows[i].cells[6].innerHTML);    
  } 
  tabl.rows[tabl.rows.length-3].cells[1].innerHTML = sumVal;
  tabl.rows[tabl.rows.length-2].cells[1].querySelector('#subtotal').value = sumVal;
  total = (parseFloat(discount)/100)*sumVal;
  tabl.rows[tabl.rows.length-1].cells[1].innerHTML = (sumVal-total);
  tabl.rows[tabl.rows.length-2].cells[1].querySelector('#newGrandTotal').value = (sumVal-total)
  document.querySelector('#amountdue').value = (sumVal-total);
}
