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
               {!! Form::open(['id' => 'destroy', 'method' => 'DELETE']) !!}
                   <input type="hidden" name="id" id="id">
                   <a id="delete-modal-cancel" href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>&nbsp;
                  {!! Form::submit('Continue', ['class' => 'btn btn-primary']) !!}
               {!! Form::close() !!}
           </div>
       </div>
   </div>
</div>
