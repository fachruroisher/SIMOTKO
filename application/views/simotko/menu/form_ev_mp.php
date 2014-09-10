    <div class="col-lg-6">
        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-edit"></i></div>
                <h5>Edit Mp</h5>
            </header>            
            <div class="body clearfix">
                <form action="<?= site_url('/').$access ?>" enctype="multipart/form-data" method="post" class="form-horizontal martop" id="block-validate">
                    <div class="form-group">
                        <label class="control-label col-lg-4">NIK</label>
                        <div class="col-lg-7">
                            <input type="text" <?=$read?> id="nik" placeholder="N I K" value="<?=$nik?>" name="nik" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Fullname</label>
                        <div class="col-lg-7">
                            <input type="text" placeholder="Nama Lengkap" value="<?=$nama?>" name="nama" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Foto</label>
                        <div class="col-lg-7">
                            <input type="file" name="foto" class="form-control">
                            <i><h6>* Format image JPG/PNG, resolusi 400 X 600 atau 500kb</h6></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Alamat</label>
                        <div class="col-lg-7">
                            <textarea id="autosize" placeholder="Alamat Man Power" name="alamat" class="form-control" required><?=$alamat?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Phone</label>
                        <div class="col-lg-7">
                            <input type="text" placeholder="Phone Man Power" value="<?=$phone?>" name="phone" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">No. KTP</label>
                        <div class="col-lg-7">
                            <input type="text" id="ktp" placeholder="No KTP" value="<?=$ktp?>" name="ktp" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Tanggal Masuk</label>                            
                        <div class="col-lg-7">
                            <input type="date" name="tgl" value="<?=$tgl?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Status</label>
                        <div class="col-lg-7">
                            <select name="status" class="penulisan form-control" required>                        
                                <?php if(empty($status)){?>
                                    <option value="">Pilih status</option>
                                    <?php foreach ($status_set as $st_set) { ?>
                                        <option value="<?=$status_set['id_gaji']?>"><?=$st_set['jenis_gaji']?></option>
                                    <?php } 
                                }else{ ?>
                                    <option value="<?=$status_set[0]['id_gaji']?>"><?=$status;?></option>
                                    <?php foreach ($status_set as $st_set) { ?>
                                        <option value="<?=$st_set['id_gaji']?>"><?=$st_set['jenis_gaji']?></option>
                                    <?php } 
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Posisi</label>
                        <div class="col-lg-7">
                            <select name="posisi" class="form-control" required>
                            <?php 
                                if(empty($posisi)){?>
                                    <option value="">Choose Posisi</option>
                                    <?php 
                                    foreach ($posisi_set as $key0) { ?>
                                        <option value="<?=$key0['id_posisi']?>"><?=$key0['nama_posisi']?></option>
                                    <?php } 
                                }else{ ?>
                                    <option value="<?=$id_posisi;?>"><?=$posisi;?></option>
                                    <?php foreach ($posisi_set as $key0) { ?>                                
                                        <option value="<?=$key0['id_posisi']?>"><?=$key0['nama_posisi']?></option>
                                    <?php } 
                                } ?>   
                            </select>                                       
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Area Klien</label>
                        <div class="col-lg-7">
                            <select name="area" class="form-control" required>
                                <?php 
                                if(empty($area)){?>
                                    <option value="">Choose Area</option>
                                    <?php 
                                    foreach ($area_set as $key0) { ?>
                                        <option value="<?=$key0['id_area']?>"><?=$key0['nama_area']?></option>
                                    <?php } 
                                }else{ ?>
                                    <option value="<?=$id_area;?>"><?=$area;?></option>
                                    <?php foreach ($area_set as $key0) { ?>
                                      
                                        <option value="<?=$key0['id_area']?>"><?=$key0['nama_area']?></option>
                                    <?php } 
                                } ?>                   
                            </select>
                        </div>
                    </div>   
                    <div class="form-actions">
                        <input type="submit" value="<?=$submit?>" class="btn btn-primary">
                        <?php if($form=='edit'){ ?>
                            <a href="<?=site_url('mp_ad/'.$id_posisi)?>" class="btn btn-warning">Cancel</a>
                        <?php } ?>
                    </div>
                </form>  
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <?php include '/../menu/info.php'; ?>
    </div>
    <div class="col-lg-6">
        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-user"></i></div>
                <h5 class="uppercase"><?=$nama?></h5>
            </header>            
            <div class="body clearfix">
                                   
                <div class="set-pict-mp">
                <?php if(!empty($foo)){ ?>
                    <img class="profot-mp" src="<?=base_url('assets/file/'.$foo)?>">
                <?php }else{ ?>
                    <img class="profot-mp" src="<?=base_url('assets/img/user.png')?>">
                <?php } ?>
                </div>                    
                
                <table class="penulisan">
                    <tr><td>NIK</td><td class="spasi">:</td><td><?=$nik; ?></td></tr>
                    <tr><td>Alamat</td><td class="spasi">:</td><td><?=$alamat; ?></td></tr>
                    <tr><td>Phone</td><td class="spasi">:</td><td><?=$phone; ?></td></tr>
                    <tr><td>No. KTP</td><td class="spasi">:</td><td><?=$ktp; ?></td></tr>
                    <tr><td>Join</td><td class="spasi">:</td><td><?=$tgl; ?></td></tr>
                    <tr><td>Status</td><td class="spasi">:</td><td><?=$status; ?></td></tr>
                    <tr><td>Posisi</td><td class="spasi">:</td><td><?=$posisi; ?></td></tr>
                    <tr><td>Area Klien</td><td class="spasi">:</td><td><?=$area; ?></td></tr>
                    <tr><td>Teamleader</td><td class="spasi">:</td><td><?=$tl; ?></td></tr>
                </table>
            </div>
        </div>
    </div>
