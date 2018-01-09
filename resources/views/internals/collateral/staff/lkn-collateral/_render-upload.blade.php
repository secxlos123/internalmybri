<script type="text/javascript">
$('#add_photo').click(function(){
  console.log('this');
  var index = $('.photo').length;
  index++;
    $('#photos').append(
        '<input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" name="other[image_condition_area]">'
      );
  });

  $('#photos').on('click', '.delete-photo', function () {
      $(this).closest('div.panel-body').remove();
  })

</script>