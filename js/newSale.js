
/**Add New Row for item added to sale */
let addButton = document.querySelector('#addItem');

addButton.addEventListener('click', (evt)=>{

    evt.preventDefault();
    let table = document.querySelector('#purchaseTable');
    let bookname = document.getElementById('bookname');
    let bookid = document.querySelector('#bookname').value;
    let custname = document.querySelector('#custname').value;
    let unitprice = document.querySelector('#unitprice').value;
    let qty = document.querySelector('#qty').value;
    let total = parseFloat(unitprice)*parseInt(qty);
    let paytype = document.querySelector('#paytype').value;
    let paymehtod = document.querySelector('#paymethod').value;
    let discount = document.querySelector('#discount').value;
    let availqty = document.querySelector('#availstock').value;
    

    if (bookname != "" && unitprice != "" && qty != "" && custname != "") {
        
        addButton.disabled = false;
        var bookfield = '<input type="hidden" name="bookname[]" id="bookname" class="form-control" value="'+bookid+'" placeholder="" />'+bookname.options[bookname.options.selectedIndex].text;    
        var pricefield = '<input type="hidden" name="unitprice[]" id="unitprice" class="form-control" value="'+unitprice+'" placeholder="" />'+unitprice;
        var qtyfield = '<input type="hidden" class="form-control" name="availqty[]" id="availqty" value="'+availqty+'" required /><input type="text" name="quantity[]" id="quantity" class="form-control" value="'+qty+'" onkeyup="changeItem(this)"  />';
        var totalfield = total;
        var checkfield = '<input type="checkbox" name="itemcheck[]" id="itemcheck" class="casedrg" checked="checked" style="opacity:0; position:absolute; left:9999px;">';
        var deletebut = '<button type="button" class="btn btn-danger" id="deleteitem" onclick="deleteItem(this)"><i class="fas fa-fw fa-trash"></i></button>'

        '<td>'+bookfield+'</td>'+
        '<td>'+pricefield+'</td>'+
        '<td>'+qtyfield+'</td>'+
        '<td>'+totalfield+'</td>'+
        '</tr>';
        
        var row = table.insertRow(table.rows.length-3);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = checkfield+deletebut;
        cell2.innerHTML = bookfield;
        cell3.innerHTML = pricefield;
        cell4.innerHTML = qtyfield;
        cell5.innerHTML = totalfield;
        var sumVal = 0; var grandTotal;
        for(var i = 1; i < table.rows.length-3; i++)
        {                  
            sumVal = sumVal + parseFloat(table.rows[i].cells[4].innerHTML);    
            //alert(sumVal);
        }          
        table.rows[table.rows.length-3].cells[1].innerHTML = sumVal.toFixed(2);
        if(discount == ""){total = (parseFloat(0)/100)*sumVal.toFixed(2);}else{total = (parseFloat(discount)/100)*sumVal.toFixed(2);}        
        table.rows[table.rows.length-1].cells[1].innerHTML = (sumVal-total).toFixed(2);
        document.querySelector('#amountdue').value = (sumVal-total).toFixed(2);
        document.querySelector('#unitprice').value = "";
        document.querySelector('#qty').value = "";
        document.getElementById('bookname').selectedIndex = 0;
        
    }else{
        //addButton.disabled = true;
        alert('Some Fields are empty');
    }
});


/**Delete Button */

const deleteItem = (ele)=>{

    let tab = document.querySelector('#purchaseTable');
    let rowCount = tab.rows.length;
    let discount = document.querySelector('#discount').value;
    var sumVal = 0; var grandTotal;
    if(rowCount <= 1){
        alert("There is no row available to delete!");
        return;
    }
    if(confirm("Are you sure you want to delete this Row?")){
        if(ele){
            //delete specific row
            ele.parentNode.parentNode.remove();
            for(var i = 1; i < tab.rows.length-3; i++)
            {                  
                sumVal = sumVal + parseFloat(tab.rows[i].cells[4].innerHTML);    
    
            }  
            tab.rows[tab.rows.length-3].cells[1].innerHTML = sumVal;
            total = (parseFloat(discount)/100)*sumVal;
            tab.rows[tab.rows.length-1].cells[1].innerHTML = (sumVal-total);
            document.querySelector('#amountdue').value = (sumVal-total);
            
        }else{
            //delete last row
            tab.deleteRow(rowCount-1);
           
        }
    }
   
}

/**Show Unit Price on Select of book */
let nBook = document.querySelector('#bookname');
nBook.addEventListener('change', (event)=>{

   let bookid = event.target.value;
   let formData = new FormData()
    formData.append("bookid", bookid)
   fetch("includes/getUnitPrice.inc", {
    method: "POST",
    body: formData
    }).then((response)=>{
    return response.text();
    }).then((text)=>{
        //alert(text);
        let myData = JSON.parse(text);
        //alert(myData[0].stock_sale_price);
        let price = myData[0].stock_sale_price;
        let availableQty = myData[0].stock_quantity;
        document.querySelector('#unitprice').value = price;
        document.querySelector('#availstock').value = availableQty;
    }).catch((error)=>{
        console.log(error);
    });
});

/**Add New Sale */
let nSaveBut = document.querySelector('#saveItem');
let itemForm = document.querySelector("#itemForm");
let itemTable = document.querySelector('#purchaseTable');
itemForm.addEventListener("submit", (e)=>{
    let trid = document.querySelector('#trid').value;
    let name = document.querySelector("#custname").options[document.querySelector("#custname").options.selectedIndex].text
    nSaveBut.innerHTML = "Saving Transaction...";
    e.preventDefault(); 
    const formData = new FormData(itemForm);
    fetch("includes/addSale.inc", {
      method: "POST",
      body: formData
    }).then((response)=>{
      return response.text();
    }).then((text)=>{
        if(text == 'New Sale Record Added'){
            nSaveBut.innerHTML = "Save Sale";        
            $("#message").fadeIn(2000).html('<div class="alert alert-success">&nbsp;&nbsp; New Sale Added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
            document.querySelector('#unitprice').value = "";
            document.querySelector('#qty').value = "";
            document.querySelector('#bookname').selectedIndex = 0;
            document.querySelector('#paytype').selectedIndex = 0;
            document.querySelector('#paymethod').selectedIndex = 0;
            document.querySelector('#amountpaid').value = "";            
            for (var i = itemTable.rows.length - 4; i > 0; i--) {
                itemTable.deleteRow(i);
            }
            itemTable.rows[itemTable.rows.length-3].cells[1].innerHTML = 0;
            itemTable.rows[itemTable.rows.length-1].cells[1].innerHTML = 0;
            document.querySelector('#amountdue').value = "";
            window.location = "saledetail?trid="+trid+"&name="+name; 
        }else{
            nSaveBut.innerHTML = "Save Sale";
            $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;Item Empty or Invalid <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
    }).catch((error)=>{
            nSaveBut.innerHTML = "Save Sale";
            $("#message").fadeIn(2000).html('<div class="alert alert-danger">&nbsp;&nbsp;An Error Detected, Please Check Your Network <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            console.error(error);
    });
  
  
});

/**Making Payment field uneditable if payment type is No payment */
let payT = document.querySelector('#paytype');
payT.addEventListener('change', (event)=>{
    if(payT.value == 'Full Payment'){
        table = document.querySelector('#purchaseTable');
        document.querySelector('#amountpaid').readOnly = true;
        document.querySelector('#amountpaid').value = parseFloat(table.rows[table.rows.length-1].cells[1].innerHTML).toFixed(2);
    }else if(payT.value == 'No Payment'){
        document.querySelector('#amountpaid').readOnly = true;
        document.querySelector('#amountpaid').value = parseFloat(0);
    }else{
        document.querySelector('#amountpaid').readOnly = false;
        document.querySelector('#amountpaid').value = "";
    }
});

/***DIscaount field change adjust grandtotal */
let dis = document.querySelector('#discount');
dis.addEventListener('keyup',(e)=>{
    var tabl = document.querySelector('#purchaseTable');
    var rowCount = tabl.rows.length;
    var discount = (parseInt(dis.value)/100)*parseInt(tabl.rows[rowCount-3].cells[1].innerHTML)
    var newTot = (parseInt(tabl.rows[rowCount-3].cells[1].innerHTML) - discount).toFixed(2);
    tabl.rows[rowCount-1].cells[1].innerHTML = newTot;
    document.querySelector('#amountdue').value = (parseInt(tabl.rows[rowCount-3].cells[1].innerHTML) - discount).toFixed(2);
});

/**QUantity Change */

const changeItem = (e)=>{
    var ia = e.parentNode.parentNode.rowIndex;
    var tabl = document.querySelector('#purchaseTable');
    var rowCount = tabl.rows.length;    
    var discount = document.querySelector('#discount').value;
    var sumVal = 0; var grandTotal;          
    
    let newTot =   parseFloat(tabl.rows[ia].cells[2].querySelector('#unitprice').value) * parseFloat(tabl.rows[ia].cells[3].querySelector('#quantity').value);
    tabl.rows[ia].cells[4].innerHTML = newTot;
    for(var i = 1; i < rowCount-3; i++)
    { 
        sumVal = sumVal + parseFloat(tabl.rows[i].cells[4].innerHTML);    
    } 
    tabl.rows[tabl.rows.length-3].cells[1].innerHTML = sumVal.toFixed(2);
    if (discount > 0) { 
        total = (parseFloat(discount)/100)*sumVal;
        
    } else{tabl.rows[tabl.rows.length-1].cells[1].innerHTML = (sumVal).toFixed(2);}
    tabl.rows[tabl.rows.length-1].cells[1].innerHTML = (sumVal-total).toFixed(2);
    document.querySelector('#amountdue').value = (sumVal-total).toFixed(2) ;
   
}