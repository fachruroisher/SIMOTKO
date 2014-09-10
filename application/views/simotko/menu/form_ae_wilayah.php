<div class="body clearfix">
    <form action="<?= site_url('/').$access ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal martop" id="block-validate">
    	<div class="col-lg-9">
    	    <div class="form-group">
                <label class="control-label col-lg-2">Nama Wilayah</label>
                <div class="col-lg-5">
                    <input type="hidden" name="kode" value="<?=$kode?>"/>
                    <input type="text" class="form-control" placeholder="Example: Yogyakarta, Tegal dll" name="wilayah" value="<?=$wilayah?>"/>
                </div>
                <div class="col-lg-5">
                 	<input type="submit" value="<?=$submit?>" class="btn btn-primary">
                    <?php if($form=='edit'){ ?>
                       <a href="<?=site_url('wm_ad')?>" class="btn btn-warning">Cancel</a>
                    <?php } ?>
                </div>
            </div>
    	</div> 
    </form>   
</div>                 
