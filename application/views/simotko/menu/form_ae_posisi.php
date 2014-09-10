<form action="<?= site_url('/').$access ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal martop" id="block-validate">
    <div class="form-group">
        <label class="control-label col-lg-3">Posisi</label>
        <div class="col-lg-7">
            <input type="hidden" name="kode" value="<?=$kode?>"/>
            <input type="text" class="form-control" placeholder="Example: cleaning service dll" name="posi" value="<?=$posi?>"/>
        </div>
    </div> 
    <div class="form-group">
        <label class="control-label col-lg-3">Deskripsi</label>
        <div class="col-lg-7">
            <textarea id="autosize" placeholder="Deskripsi Posisi" name="deskripsi" class="form-control" required><?=$deskripsi;?></textarea>
        </div>
    </div>   
    <div class="form-actions">
    	<input type="submit" value="<?=$submit?>" class="btn btn-primary">
        <?php if($form=='edit'){ ?>
            <a href="<?=site_url('pos_ad')?>" class="btn btn-warning">Cancel</a>
        <?php } ?>
    </div>
</form>  
               
