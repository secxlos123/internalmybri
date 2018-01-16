<script type="text/javascript">
  $('#plus').click(function(){
    var index = $('.upload').length;
    index++;
    if(index <= 10){
      $('#div_other_doc').append(
        '<div class="col-md-12 docs" style="margin-bottom:10px;">'
            +'<div class="col-md-5">'
              +'<div class="form-group">'
                +'<label class="col-md-4 control-label">Nama Dokumen :</label>'
                  +'<div class="col-md-7">'
                    +'<input type="text" class="form-control numericOnly" name="doc_name['+index+']" maxlength="12">'
                +'</div>'
              +'</div>'
            +'</div>'
            +'<div class="col-md-7">'
              +'<div class="form-group">'
                +'<label class="col-md-5 control-label">Upload Dokumen Pendukung :</label>'
                  +'<div class="col-md-6">'
                    +'<input type="file" class="filestyle-upload" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="doc_upload['+index+']" accept="image/*,application/pdf">'
                  +'</div>'
                +'<span class="btn btn-danger col-md-1 delete-photo"><i class="fa fa-trash"></i></span>'
              +'</div>'
            +'</div>'
        +'</div>'
        );
      $('.filestyle-upload').filestyle({
        buttonText : "Unggah",
        htmlIcon : '<span class="icon-span-filestyle fa fa-cloud-upload"></span>',
        placeholder: "Tidak ada file"
      });
    } else{
      alert('Hanya dapat mengunggah maksimal 10 file')
    }
  });

$('#div_other_doc').on('click', '.delete-photo', function () {
  console.log('no');
  $(this).closest('div.docs').remove();
})
</script>