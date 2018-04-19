
<script type="text/javascript">


function testbutton(){
	  setTimeout(function(){
         document.getElementById('load').style.visibility="visible";
      },1000);
}
$(document).ready(function() {
	//------------------all hidden---------------------------------
	$('#tgl_pembayaran').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });
			$('#tgl_gajian1').datepicker({
                format : "yyyy-mm-dd",
                autoclose: true,
            });
		$("#step0").show();
		$("#step1").hide();
			
		$("#fasilitas_jasa").select2().change(function () {
				var fasilitas_jasa = $("#fasilitas_jasa").val();
				if(fasilitas_jasa=='simpanan'){	
						$("#step0").show();
						$("#step1").hide();
				}else if(fasilitas_jasa=='fasilitas'){
						$("#step0").hide();
						$("#step1").show();
				}
			});
		
		//----------------------------------------------------------
});

</script>