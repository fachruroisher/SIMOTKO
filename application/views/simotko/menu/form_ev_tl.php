<form action="<?= site_url('/').$access ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal martop" id="block-validate">
    <div class="form-group">
        <label class="control-label col-lg-4">Fullname</label>
        <div class="col-lg-8">
            <input type="text" placeholder="Fullname" value="<?=$fullname?>" name="nama" class="form-control" required>
            <input type="hidden" value="<?=$kode?>" name="kode">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Email</label>
        <div class="col-lg-8">
            <input type="email" placeholder="example@domain.com" value="<?=$mail?>" name="email" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Phone</label>
        <div class="col-lg-8">
            <input type="text" placeholder="your Phone" value="<?=$phone?>" id="digits" name="digits" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Foto</label>
        <div class="col-lg-8">
            <input type="file" name="foto" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Tanggal Lahir</label>                            
        <div class="col-lg-3">
            <input type="text" placeholder="Tempat" value="<?=$tpl?>" name="born" class="form-control" required>
        </div>
        <div class="col-lg-5">
            <input type="date" id="date2" name="birth" value="<?=$tgl?>" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Alamat</label>
        <div class="col-lg-8">
            <textarea id="autosize" placeholder="Alamat" name="alamat" class="form-control"><?=$alamat?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Tanggal Masuk</label>
        <div class="col-lg-8">
            <input type="date" id="date2" name="masuk"value="<?=$tgm?>"  class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-lg-4">Wilayah Kerja</label>
        <div class="col-lg-8">                                
            <select name="wilayah" class="form-control" required>
                <?php if(!empty($wk_id)){ ?>
                    <option value="<?=$wk_id?>"><?=$wk?></option>
                    <?php foreach ($wilayah_set as $key) { ?>
                        <option value="<?=$key['id_wilayah']?>"><?=$key['nama_wilayah']?></option>
                    <?php } ?>
                <?php } else{ ?>
                    <option value="">Pilih wilayah</option>
                    <?php foreach ($wilayah_set as $key) { ?>
                        <option value="<?=$key['id_wilayah']?>"><?=$key['nama_wilayah']?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-actions">
        <input type="submit" value="<?=$submit?>" class="btn btn-primary">
        <?php if($form=='edit'){ ?>
            <a href="<?=site_url('tl_ad')?>" class="btn btn-warning">Cancel</a>
        <?php } ?>
    </div>
</form>
