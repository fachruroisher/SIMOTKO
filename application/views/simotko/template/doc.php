       
	<div id="docModal" class="modal fade">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
	    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    		<h4 class="modal-title">New Document Upload</h4>
		      </div>
		      <div class="modal-body">
                    <?php foreach ($doc_set as $key) { ?>
                        <div class="body clearfix">
                        	<div class="col-lg-1" style="margin-right:12px;">
                        		<a style="float:left; margin-top:7px;" class="btn btn-lg btn-primary" target="_blank" href="<?=base_url('assets/document/'.$key['gambar'])?>" title="Download <?=$key['gambar']?>" >  <i class="fa fa-download"></i></a>
                        	</div>
                        	<div class="col-lg-10">
	                        	<strong><?=$key['title']?></strong> <br/>
	                        	<?=$key['keterangan']?><br/>
	                        	<i><h6>Posted at <?=$key['tanggal']?></h6></i>
                        	</div>
                        </div><br/>
                    <?php } ?> 
		      </div>
		      <div class="modal-footer">
		      	<a href="<?=site_url('doc_vd')?>"class="btn btn-primary">More Document</a>
			      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		</div>
	</div>