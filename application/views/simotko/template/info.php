<!-- #NotModal -->        
	<div id="NotModal" class="modal fade">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
	    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    		<h4 class="modal-title">New Information</h4>
		      </div>
		      <div class="modal-body">
			    <ol>
                    <?php foreach ($info_set as $key) { ?>
                        <li><?=$key['keterangan']?> <br/><h6><i class="fa fa-user"></i>  Posted by <i><strong><?=$key['fullname']?></strong></i> at <i><?=$key['tanggal']?></i></h6></li><br/>
                    <?php } ?>                    
                </ol>
		      </div>
		      <div class="modal-footer">
			      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->        
	<!-- /#NotModal -->