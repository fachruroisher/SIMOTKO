<!-- #helpModal -->        
	<div id="helpModal" class="modal fade">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
	    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    		<h4 class="modal-title">User Guide</h4>
		      </div>
		      <div class="modal-body">
                <ol>
                    <?php foreach ($guide_set as $key) { ?>
                        <li><?=$key['ket_guide']?> 
                        	<?php if(!empty($key['file'])){ ?>
                        	<a target="_blank" href="<?=base_url('assets/document/'.$key['file'])?>" title="Download File" >  <i class="fa fa-download"></i></a>
                        	<?php } ?>
                        </li>
                    <?php } ?>                    
                </ol>
		      </div>
		      <div class="modal-footer">
			      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		</div>
	</div>