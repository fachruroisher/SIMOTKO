<div class="row">
<?php if($part == 'setting'){ ?>
        <div class="col-lg-12">
        <!-- Haman informasi start-->
            <?php include 'info.php'; ?>
        <!-- Haman informasi end-->
        </div>
    <?php  } ?>
    <div class="col-lg-12">
    <?php if($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('ubah') || $this->session->flashdata('hapus')){
        if($this->session->flashdata('ubah')==true){ ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Selamat!</strong> Data berhasil diubah.
            </div>
        <?php }elseif($this->session->flashdata('warning')==true){ ?>
            <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Ups!</strong> Gambar melebihi 1MB atau resolusi 400 X 600cm. Silahkan coba lagi!
        </div>
    <?php }
    } ?>  
    </div>
        <div class="col-lg-6">
            <div class="box">
                <header>
                    <div class="icons"><i class="fa fa-th-large"></i></div>
                    <h5><?php echo $title ?></h5>
                    <div class="toolbar">
                        <ul class="nav">
                            <li>
                                <div class="btn-group">
                                    <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse" href="#setProf">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <div id="setProf" class="accordion-body collapse in body">
                    <form action="<?= site_url('/').$access ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal" id="block-validate">
                        <div class="form-group">
                            <label class="control-label col-lg-4">Username</label>
                            <div class="col-lg-6">
                                <input type="text" id="required2" value="<?php echo $show_nik; ?>" readonly name="nameusr" class="form-control" required>
                                <input type="hidden" value="<?php echo $kode; ?>" name="kode">
                                <input type="hidden" value="<?php echo $show_status; ?>" name="statususr">
                                <input type="hidden" value="<?php echo $show_level; ?>" name="levelusr">
                            </div>
                        </div>                    
                        <?php if($part == 'profil'){ ?> 
                            <div class="form-group">
                                <label class="control-label col-lg-4">Foto</label>
                                <div class="col-lg-6">
                                    <input type="file" name="foto_profil" class="form-control">
                                    <i><h6>* Format Gambar JPG / PNG dan maximal berukuran 1MB / 400X600cm</h6></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Fullname</label>
                                <div class="col-lg-6">
                                    <input type="text" id="required2" value="<?php echo $nama; ?>" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Phone</label>
                                <div class="col-lg-6">
                                    <input type="text" id="digits" value="<?php echo $tlp; ?>" name="digits" class="form-control" required>
                                </div>
                            </div>                        
                        <?php } ?> 
                        <div class="form-group">
                            <label class="control-label col-lg-4">E-mail</label>
                            <div class="col-lg-6">
                                <input type="email" id="email2" value="<?php echo $mailusr; ?>" name="mailusr" class="form-control" required>
                            </div>
                        </div>                   
                        <div class="form-group">
                            <label class="control-label col-lg-4">Password</label>
                            <div class="col-lg-6">
                                <input type="password" id="password2" value="<?php echo $passusr; ?>" name="passusr" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Confirm Password</label>
                            <div class="col-lg-6">
                                <input type="password" id="confirm_password2" value="<?php echo $passusr; ?>" name="confirm_password2" class="form-control">
                            </div>
                        </div>
                        <div class="form-actions no-margin-bottom">
                            <input type="submit" value="<?=$submit?>" class="btn btn-primary">
                            <?php if($part=="profil"){ ?>
                                <a href="<?=site_url('set_ad/'.$kode)?>" class="btn btn-warning">Cancel</a>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="box">
                <header>
                    <div class="icons"><i class="fa fa-list"></i></div>
                    <h5>Profil</h5>
                    <?php if($part != 'profil'){ ?>
                        <div class="toolbar">
                            <a href="<?php echo site_url().'/up_ad/'.$kode; ?>" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i>   Update Profil</a>                                       
                        </div>
                    <?php }else{ ?>
                        <div class="toolbar">
                            <a href="<?php echo site_url().'/set_ad/'.$kode; ?>" class="btn btn-sm btn-primary "><i class="fa fa-chevron-left"></i>   Back to Setting</a>                                       
                        </div>
                    <?php } ?>
                </header>
                <div class="body clearfix">
                    <h3><?php echo $nama; ?></h3>
                    
                        <div class="minfot">
                            <div class="set-pict">
                                <?php if(!empty($foto)){ ?>
                                    <img class="profot" src="<?=base_url('assets/file/'.$foto)?>">
                                <?php }else{ ?>
                                    <img class="profot" src="<?=base_url('assets/img/user.png')?>">
                                <?php } ?>
                            </div>
                        </div>
                                    
                    <table class="penulisan">
                        <tr><td>User</td><td class="spasi">:</td><td><?php echo $show_nama; ?></td></tr>
                        <tr><td>Phone</td><td class="spasi">:</td><td><?php echo $tlp; ?></td></tr>
                        <tr><td>Email</td><td class="spasi">:</td><td class="lowercase"><?php echo $mailusr; ?></td></tr>
                        <tr><td>Status</td><td class="spasi">:</td><td><?php echo $show_status; ?></td></tr>
                        <tr><td>Access</td><td class="spasi">:</td><td><?php echo $show_level; ?></td></tr>
                        <tr><td>Last Access</td><td class="spasi">:</td><td><i><?php echo $last; ?></i></td></tr>
                    </table>
                </div>
            </div>
        </div>
        </div>



            