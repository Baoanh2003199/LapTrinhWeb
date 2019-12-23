function setDisplay(divName) {
    $(divName).css("display", 'block');
   
}
function closeDisplay(divName) {
    $(divName).css("display", 'none');
}

function setReadyDocument(){
   
    $('#closePayment').click(function (e) { 
        closeDisplay('#paymentDiv');

    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
        
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
    $('#btnLogin').click(function () { 
        $("#loginModal").modal('show');
    });
    $('#btnDel').click(function () { 
        $("#loginModal").modal('hide');
    });
    $('#btnRegister').click(function () { 
        //setDisplay('#divRegister');
        $("#registerModal").modal('show');
    });
    $('#btnDelR').click(function (e) { 
        //closeDisplay('#divRegister');
        $("#registerModal").modal('hide');
    });
    $('#btnCancel').click(function (e) { 
        window.location.href = 'index.php';
    });
    $('.btnUpdateCart').click(function() {
         
         parent = $(this).parent();
         txtNum = $(parent).children();
         Quantity = $(txtNum[0]).val();
         CartID = $(txtNum[1]).val();

         window.location.href = 'cart.php?updateCarID='+CartID+'&Quantity='+Quantity+'';
     }); 

    //  $(function(){
    //     $('#paymentModal').on('submit', function(e){
    //         e.preventDefault();
    //         $.ajax({
    //             url: '#', //this is the submit URL
    //             type: 'POST', //or POST
    //             data: $('#paymentModal').serialize(),
    //             success: function(data){
    //                  alert('successfully submitted');
    //             }
    //         });
    //     });
    // });
     //$('#btnPayConfirm').click(function () { 
        // window.location.href = 'order.php';
    //});
    
    // $('#txtNum').onkeyup(function(){
    //     alert("Hi there!");
    // });

    // $('#txtNum').oninput(function(){
    //     alert("Hi there!");
    // });
}
function onclickDeleteCart(cartID) {
    if(confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?')){
        window.location.href = 'cart.php?delCartID='+cartID+'';
        return true;
    }
}
