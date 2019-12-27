<div class="footer"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></body>
<script src="../templates/resource/admin/myjs.js"></script>
<script>
  $(document).ready(function() {
    expandChildUL();
    closeMenu();
    expandMenu();
   	$('#uploadImg').change(function(event ) {
   		var url = $('#uploadImg')[0].files[0].name;
   		console.log(url);
   		if (url != "") {
   			var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
            }
            reader.readAsDataURL($('#uploadImg')[0].files[0]);
   		}
   		
   	});
  });
</script>
</body>

</html>``
