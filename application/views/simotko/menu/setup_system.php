<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-paste"></i></div>
                <h5><?php echo $title ?></h5>
            </header>
            <div class="body clearfix">            
                <?php if($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('ubah') || $this->session->flashdata('hapus')){
                    if($this->session->flashdata('ubah')==true){ ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Selamat!</strong> Data berhasil diubah.
                        </div>
                    <?php }elseif($this->session->flashdata('warning')==true){ ?>
                        <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Ups!</strong> Gambar melebihi 500kb dan resolusi tidak 1200 X 700. Silahkan coba lagi!
                    </div>
                <?php }
                } ?> 
                <form action="<?= site_url('/').$access ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal martop" id="block-validate">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <img src="<?=base_url('assets/file/'.$bgsis)?>" class="bg_login">
                                    <div class="col-lg-12 free">
                                        <h4>Background Login</h4>
                                        <input type="file" class="form-control" name="wallpaper"/>
                                        <i><h6>* Maximal ukuran gambar 500kb dan resolusi 1200 X 700</h6></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">System Name</label>
                                <div class="col-lg-9">
                                    <input type="hidden" name="idsis" value="<?=$idsis?>"/>
                                    <input readonly type="text" class="form-control" placeholder="Nama Sistem" name="namsis" value="<?=$namsis?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Deskripsi</label>
                                <div class="col-lg-9">
                                    <textarea readonly id="autosize" placeholder="Deskripsi Sistem" name="desis" class="form-control"><?=$desis?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Tag System</label>
                                <div class="col-lg-9">
                                    <input readonly type="text" class="form-control" placeholder="Tag Sistem" name="tagsis" value="<?=$tagsis?>"/>
                                    <i><h6>* Gunakan , (koma) untuk pemisah tag</h6></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">Company</label>
                                <div class="col-lg-9">
                                    <input readonly type="text" class="form-control" placeholder="Nama Perusahaan" name="cnsis" value="<?=$cnsis?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Address</label>
                                <div class="col-lg-9">
                                    <textarea id="autosize" placeholder="Alamat Perusahaan" name="casis" class="form-control"><?=$casis?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Website</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Website Perusahaan" name="csis" value="<?=$csis?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Phone</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="No Telephone Perusahaan" name="cpsis" value="<?=$cpsis?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Welcome Page</label>
                                <div class="col-lg-9">
                                    <textarea id="autosize" placeholder="Alamat Perusahaan" name="wpsis" class="form-control"><?=$wpsis?></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="<?=$submit?>" class="btn btn-primary">
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>