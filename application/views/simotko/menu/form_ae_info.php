<div class="body clearfix">
	<form action="<?= site_url('/').$access ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal martop" id="block-validate">
		<div class="col-lg-8">
		    <div class="form-group">
	            <label class="control-label col-lg-2">Keterangan</label>
	            <div class="col-lg-8">
	                <input type="hidden" name="kode" value="<?=$kode?>"/>
	                <input type="hidden" name="id" value="<?=$show_kode?>"/>
	                <textarea name="info" placeholder="Isi singkat dan padat..." id="autosize" class="form-control" required><?=$keterangan?></textarea>
	            </div>
	        </div>
	        <div class="form-group">
	            <label class="control-label col-lg-2">Info Status</label>
	            <div class="col-lg-5">
	                <select name="status" class="form-control" required>
					    <?php if($status == 'aktif'){ ?>
					    	<option value="Aktif">Aktif</option>
						    <option value="Tidak">Tidak</option>
					    <?php }elseif($status == 'tidak'){ ?>
					    	<option value="Tidak">Tidak</option>
						    <option value="Aktif">Aktif</option>
					    <?php }else{ ?>
					    	<option value="">Choose info status</option>
					    	<option value="Aktif">Aktif</option>
					    	<option value="Tidak">Tidak</option>
					   	<?php } ?>
				    </select>
	            </div>
	        </div>     
		    <div class="form-actions">
		        <input type="submit" value="<?=$submit?>" class="btn btn-primary">
		        <?php if($form=='edit'){ ?>
		        	<a href="<?=site_url('inf_ad')?>" class="btn btn-warning">Cancel</a>
		        <?php } ?>
		    </div>
		</div> 
	</form>     
</div>               
