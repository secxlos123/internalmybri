     <div id="sign-out" class="modal fade">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title"><b>Keluar Aplikasi</b></h4>
                   </div>
                   <div class="modal-body">
                       <p>Yakin untuk keluar?</p>
                   </div>
                   <div class="modal-footer">
                        {!! Form::open(['id' => 'out', 'method' => 'DELETE']) !!}
                           <a id="delete-modal-cancel" class="btn btn-default" data-dismiss="modal">Batal</a>
                          {!! Form::submit('Keluar', ['class' => 'btn btn-success', 'id' => 'btn-logout']) !!}
                        {!! Form::close() !!}
                   </div>
               </div>
           </div>
        </div>