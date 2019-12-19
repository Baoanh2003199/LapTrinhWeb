function setDisplay(divName) {
    $(divName).css("display", 'block');
   
}
function closeDisplay(divName) {
    $(divName).css("display", 'none');
}
function setReadyDocument(){
    $('#btnOrder').click(function (e) { 
        setDisplay('#paymentDiv');
        
    });
    $('#closePayment').click(function (e) { 
        closeDisplay('#paymentDiv');
        
    });
    $('#btnAcount').hover(function () {
        setDisplay('#acountManager');
            
        }, function () {
            closeDisplay('#acountManager');
        }
    );
    $('#acountManager').hover(function () {
        setDisplay('#acountManager');
            
        }, function () {
            closeDisplay('#acountManager');
        }
    );
    $('#btnLogin').click(function (e) { 
        $("#loginModal").modal("show");
    });
    $('#btnDel').click(function (e) { 
        $("#loginModal").modal("hide");
    });
    $('#btnRegister').click(function (e) { 
        //setDisplay('#divRegister');
        $("#registerModal").modal("show");
    });
    $('#btnDelR').click(function (e) { 
        //closeDisplay('#divRegister');
        $("#registerModal").modal("hide");
    });
}