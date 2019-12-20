<div class="footer"></div>
<script src="../templates//vendor/jquery/jquery-3.4.1.min.js"></script>
<script src="../templates/vendor/js/bootstrap.min.js"></script>
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
