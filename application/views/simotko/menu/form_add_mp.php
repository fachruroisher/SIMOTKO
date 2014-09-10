<div class="body clearfix">
    <form action="<?= site_url('/').$access ?>" enctype="multipart/form-data" method="post" class="form-horizontal martop" id="block-validate">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-lg-3">NIK</label>
                <div class="col-lg-8">
                    <input type="text" id="nik" placeholder="N I K" name="nik" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">Fullname</label>
                <div class="col-lg-8">
                    <input type="text" placeholder="Nama Lengkap" name="nama" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">Foto</label>
                <div class="col-lg-8">
                    <input type="file" name="foto" class="form-control">
                    <i><h6>* Format image JPG/PNG, resolusi 400 X 600 atau 500kb</h6></i>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">No. KTP</label>
                <div class="col-lg-8">
                    <input type="text" id="ktp" placeholder="No KTP" name="ktp" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">Phone</label>
                <div class="col-lg-8">
                    <input type="text" id="phone" placeholder="No Telephone" name="phone" class="form-control" >
                </div>
            </div>
        </div>
        <div class="col-lg-6">            
            <div class="form-group">
                <label class="control-label col-lg-4">Alamat</label>
                <div class="col-lg-7">
                    <textarea id="autosize" placeholder="Alamat" name="alamat" class="form-control" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4">Tanggal Masuk</label>                            
                <div class="col-lg-7">
                    <input type="date" name="tgl" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4">Status</label>
                <div class="col-lg-7">
                    <select name="status" class="penulisan form-control" required>
                        <option value="">Pilih status</option>
                        <?php foreach ($status_set as $st_set) { ?>
                            <option value="<?=$st_set['id_gaji']?>"><?=$st_set['jenis_gaji']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4">Posisi</label>
                <div class="col-lg-7">
                    <input type="hidden" name="posisi" value="<?=$kode_tmp?>">
                    <input type="text" value="<?=$posisi_tmp?>" class="form-control penulisan" required readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4">pilih area</label>
                <div class="col-lg-7">
                    <select name="area" class="form-control" required>
                        <option value="">Pilih Area</option>
                        <?php foreach ($area_set as $key0) { ?>
                            <option value="<?=$key0['id_area']?>"><?=$key0['nama_area']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-10">   
            <div class="form-actions">
                <input type="submit" value="<?=$submit?>" class="btn btn-primary">
            </div>
        </div>
    </form> 
</div> 
