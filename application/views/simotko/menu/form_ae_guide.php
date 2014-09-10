<div class="body clearfix">
<form action="<?= site_url('/').$access ?>" enctype="multipart/form-data" method="post" class="form-horizontal martop" id="block-validate">
	<div class="<?php if($form=='edit'){?>col-lg-9<?php }else{?>col-lg-6<?php } ?>">
	    <div class="form-group">
            <label class="control-label col-lg-3">Keterangan</label>
            <div class="col-lg-9">
                <input type="hidden" name="kode" value="<?=$kode?>"/>
                <textarea name="isi" placeholder="Keterangan" id="autosize" class="form-control" required><?=$deskripsi;?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">File</label>
            <div class="col-lg-9">
                <input type="file" name="guide_file" class="form-control">
                <h6><i>* Format File yang diperbolehkan <strong>.PDF</strong></i></h6>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" value="<?=$submit?>" class="btn btn-primary">
            <?php if($form=='edit'){ ?>
            <a href="<?=site_url('g_ad')?>" class="btn btn-warning">Cancel</a>
            <?php } ?>
        </div>
	</div> 
</form>    
<?php if($form=='edit' AND !empty($file)){ ?>
    <div class="col-lg-3">
        <img style="width:100px;" src="<?=base_url('assets/img/pdf.png')?>"/><br/>
        <?=$file?>
    </div>  
<?php } ?>
</div>
              
