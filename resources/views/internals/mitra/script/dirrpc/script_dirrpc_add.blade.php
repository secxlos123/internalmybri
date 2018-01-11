<script type="text/javascript">
	function getpemeriksa(formarray){
/* 		var area_level = $("input:radio[name=area_level]:checked").val();
		formarray.push({
			"name": "area_level",
			"value": area_level
		}); */
		var count = $("#countpemutus").val();
		var pemeriksa = '';
		var jabatan_pemeriksa = '';
		for(i=1;i<parseInt(count);i++){
			if(i==1){
				pemeriksa = $("#pemeriksa"+i).val();
			}else{
				pemeriksa += ';'+$("#pemeriksa"+i).val();
			}
			if(i==1){
				jabatan_pemeriksa = $("#jabatan"+i).val();
			}else{
				jabatan_pemeriksa += ';'+$("#jabatan"+i).val();
			}
		}
		formarray.push({
			"name": "pemeriksa",
			"value": pemeriksa
		});
		formarray.push({
			"name": "jabatan_pemeriksa",
			"value": jabatan_pemeriksa
		});
		
		formarray.push({
			"name": "pemutus_name",
			"value": $("#pemutus_name").val(),
		});
		formarray.push({
			"name": "jabatan",
			"value": $("#jabatan").val(),
		});
		return formarray;
	}


var counter = 1;
var table1 = $('#datatable').DataTable();
 $('#btn_add').on( 'click', function () {
        table1.row.add( [
            $("#penghasilan_minimal").val(),
            $("#penghasilan_maksimal").val(),
            $("#dir_persen").val(),
			$("input:radio[name=payroll]:checked").val(),
        ] ).draw( false );
 
        counter++;
			$("#penghasilan_minimal").val('');
            $("#penghasilan_maksimal").val('');
            $("#dir_persen").val('');
			document.getElementById("debt_name").readOnly = "true";
			
    } );
  
  
function validasi_desimal(parameter){
		var persen_bunga = $(parameter).val();
		var nilai = persen_bunga.split('.');
		var countnilai2 = nilai[1].length;
		if(parseInt(countnilai2)>2){
			var koma =nilai[1].substr(0,2);
			$(parameter).val(nilai[0]+'.'+koma);
		}
}
	
	
function addinput(){
		var countpemutus = $("#countpemutus").val();
		addpemutus(countpemutus);
		addjabatan(countpemutus);
		$("#countpemutus").val(parseInt(countpemutus)+1);
	}

function addpemutus(countpemutus){
			
			var html = '<label class="col-md-3 control-label">Pemeriksa'+countpemutus+'</label><div class="col-md-8">' + 
					   '<input type="text" class="form-control" name="pemeriksa'+countpemutus+'" id="pemeriksa'+countpemutus+'" value="" maxlength="16">'+
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group pemeriksa'+countpemutus;
			div.innerHTML = html;
			document.getElementById('div_pemutus').appendChild(div);
	}

function addjabatan(countpemutus){
			var html = '<label class="col-md-5 control-label">Jabatan Pemeriksa'+countpemutus+'</label><div class="col-md-7">' + 
					   '<input type="text" class="form-control" name="jabatan'+countpemutus+'" id="jabatan'+countpemutus+'" value="" maxlength="16">'+
					   '</div>';
			var div = document.createElement('div');
			div.className = 'form-group jabatan'+countpemutus;
			div.innerHTML = html;
			document.getElementById('div_jabatan').appendChild(div);
}

$(document).on('click', "#btn-save", function(){
	
	
	var data = table1
		.rows()
		.data();
	var length = data.length;
	length = parseInt(length)-1;
	var formdetail = [];
	var formarray = [];
	var id_header = Date.now();
	for(i=0;i<=length;i++){
	var rows = table1.rows( i ).data();
	formdetail.push(rows[0][0],rows[0][1],rows[0][2],rows[0][3],id_header
	);
	formarray.push({
		"name" : "data"+i,
		"value" : JSON.stringify(formdetail)});
	formdetail = [];
	};
	formarray.push({
			"name": "button",
			"value": 'submit'
	});
	formarray.push({
			"name": "countminus1",
			"value": length
	});
	var debt_name = $("#debt_name").val();
	formarray.push({
			"name": "debt_name",
			"value": debt_name
	});
	formarray.push({
			"name": "no",
			"value": id_header
	});
	formarray.push({
			"name": "maintance",
			"value": '<button type="button" class="btn btn-orange waves-light waves-effect w-md" id="btn-edit" name="btn-edit" data-toggle="modal">Maintance </button>'
	});
	formarray.push({
			"name": "action",
			"value": '<button type="button" class="btn btn-orange waves-light waves-effect w-md" id="btn-hapus" name="btn-hapus" data-toggle="modal">Hapus </button>'
	});
	formarray = getpemeriksa(formarray);
		sentform(formarray);

})


function radio(formarray){
		var payroll = $("input:radio[name=payroll]:checked").val();
		formarray.push({
			"name": "payroll",
			"value": payroll
		});
		return formarray;
	}
	
function selectvalue(formarray){
		var penghasilan_minimal = document.getElementById("penghasilan_minimal");
//		var area_level_value = area_level.options[area_level.selectedIndex].value;
		var penghasilan_minimal_value = $('#penghasilan_minimal').val();
		formarray.push({
			"name": "penghasilan_minimal",
			"value": penghasilan_minimal_value
		});
		var penghasilan_maksimal = document.getElementById("penghasilan_maksimal");
//		var area_level_value = area_level.options[area_level.selectedIndex].value;
		var penghasilan_maksimal_value = $('#penghasilan_maksimal').val();
		formarray.push({
			"name": "penghasilan_minimal",
			"value": penghasilan_maksimal_value
		});
		return formarray;
	}

function sentform(formdata)
    {
		var dataform = JSON.stringify(formdata);
		var k = 'm:m';
		  $.ajax({
		type: 'GET',
		url: 'DirRpcStore',
		data: $.param(formdata),
		contentType: "application/json",
		dataType: "json",
		success: function(data) {
		 console.log("Data added!", data);
		 
			var url = window.location.href;
			var url = url.replace("dir_rpc_add", "dir_rpc");
			window.location.href = url;
		}
		});
}

</script>