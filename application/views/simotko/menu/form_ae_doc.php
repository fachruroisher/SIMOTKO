<form action="<?= site_url('/') . $access ?>" enctype="multipart/form-data" method="post" class="form-horizontal martop" id="block-validate">
    <div class="col-lg-9">
        <div class="form-group">
            <label class="control-label col-lg-3">Title</label>
            <div class="col-lg-9">
                <input type="hidden" name="kode" <?php if ($form != 'index') { ?>value="<?= $kode ?>"<?php } ?>/>
                <input type="hidden" name="id" value="<?= $show_kode ?>"/>
                <input type="text" placeholder="Nama Document" <?php if ($form != 'index') { ?>value="<?= $judul ?>"<?php } ?> name="judul" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">Deskripsi</label>
            <div class="col-lg-9">
                <textarea name="isi" placeholder="Deskripsi Document" id="autosize" class="form-control" required><?php if ($form != 'index') { ?><?= $isi ?><?php } ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3">File</label>
            <div class="col-lg-9">
                <input type="file" name="doc_file" class="form-control" <?php if ($form == 'index') { ?>required<?php } ?>>
                <i><h6>* Format yang diperbolehkan pdf / doc / docx / xlsx</h6></i>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" value="<?= $submit ?>" class="btn btn-primary">
            <?php if ($form == 'edit') { ?>
                <a href="<?= site_url('doc_ad') ?>" class="btn btn-warning">Cancel</a>
            <?php } ?>
        </div>
    </div> 
</form>    
<?php if ($form != 'index') { ?>
    <div class="col-lg-3">
        <img title="<?= $file ?>" style="width:100px;" src="<?= base_url('assets/img/folder.png') ?>"/><br/>
    </div>  
<?php } ?>
              
