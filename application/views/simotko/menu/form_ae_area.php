<form action="<?= site_url('/').$access ?>" method="post" class="form-horizontal martop" id="block-validate">
    <input type="hidden" name="kode" value="<?=$kode;?>">
    <div class="form-group">
        <label class="control-label col-lg-2">Area</label>
        <div class="col-lg-8">
            <input type="text" placeholder="Nama Area Klien" value="<?=$area;?>" name="area" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-2">Alamat</label>
        <div class="col-lg-9">
            <textarea id="autosize" placeholder="Alamat Area Klien" name="alamat" class="form-control" required><?=$alamat;?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-2">Phone</label>
        <div class="col-lg-7">
            <input type="text" placeholder="Ex: +62 274 Area Phone" value="<?=$phone;?>" id="digits" name="digits" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-2">TL Area</label>
        <div class="col-lg-6">
            <select name="user" class="form-control" required>
                <?php if(empty($user)){?>
                <option value="">Pilih Teamleader</option>
                <?php foreach ($tl_area as $key0) { ?>
	                <option value="<?=$key0['id_tl']?>"><?=$key0['fullname']?></option>
	            <?php } }else{ ?>
                	<option value="<?=$id;?>"><?=$user;?></option>
                <?php foreach ($tl_area as $key0) { ?>
	                <option value="<?=$key0['id_tl']?>"><?=$key0['fullname']?></option>
	            <?php } } ?>					
            </select>
        </div>
    </div>
    <div class="form-actions no-margin-bottom">
        <input type="submit" value="<?=$submit?>" class="btn btn-primary">
        <?php if($form=='edit'){ ?>
            <a href="<?=site_url('am_ad')?>" class="btn btn-warning">Cancel</a>
        <?php } ?>
    </div>
</form>
