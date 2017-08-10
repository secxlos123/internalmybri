<div id="delete-modal" class="modal fade">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Hapus Data</h4>
           </div>
           <div class="modal-body">
               <p>Apakah yakin akan menghapus <strong id="name"></strong> ?</p>
           </div>
           <div class="modal-footer">
               <form id="destroy" method="DELETE">
                   <input type="hidden" name="id" id="id">
                   <a id="delete-modal-cancel" href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>&nbsp;
                   <input type="submit" name="delete" class="btn btn-primary">
               </form>
           </div>
       </div>
   </div>
</div>
<script>
   $(document).ready(function() {
       $('[data-tables=true]').on('click', '.btn-delete', function(e) {
           var id = $(this).attr('data-id');
           var name = $(this).attr('data-name');
           $('#destroy').attr('action', '{{ Request::url() }}/'+id+'/delete');
           $('#delete-modal').modal('show');
           $("#delete-modal #name").html(name);
           $("#delete-modal #id").val(id);
           e.preventDefault();
       });
   });
</script>