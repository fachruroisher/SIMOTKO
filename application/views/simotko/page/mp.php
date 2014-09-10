<div class="row">        
    <?php if($form=='edit' AND $show_level =='admin' AND $show_level =='team leader'){
        include '/../menu/form_ev_mp.php';
    }elseif($form=='view'){ ?>
        <div class="col-lg-6">
            <?php include '/../menu/view_mp.php';  ?>
        </div>
        <div class="col-lg-6">
            <?php include '/../menu/info.php'; ?>
        </div>
    <?php } ?>         
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header class="capitalize">
                <div class="icons"><i class="fa fa-th-list"></i></div>
                <h5><?php if($form=='index'){ ?><?=$title?><?php }else{ ?><?=$direct?><?php } ?></h5>
                <?php if($form=='index' AND $show_level=='admin' OR $show_level =='team leader'){ ?>
                    <div class="toolbar">     
                        <a href="#<?=$id_button?>" class="butmar accordion-toggle btn btn-sm btn-primary " data-toggle="collapse"><?=$button?></a>                                       
                    </div>
                <?php } ?>
            </header>      
            <?php if($form=='index' AND $show_level=='admin' OR $show_level =='team leader'){ ?>
                <div id="<?=$id_button?>" class="collapse out">
                    <?php include '/../menu/form_add_mp.php'; ?>
                </div> 
            <?php } ?>
            <div class="body">
                <table id="dataTable" class="table table-striped responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>  
                            <th>Nama</th>
                            <th>Area Klien</th>
                            <th>Teamleader</th>
                            <th>Status</th>   
                            <th>Action</th> 
                        </tr>                                            
                    </thead>
                    <tbody class="normal-text">
                    <?php $nomor=1;
                    foreach ($content as $key) { 
                        $id         = $key['nik_mp'];
                        $confirm    = $key['nama_mp'];?>
                        <tr class="capitalize">
                            <td><?=$nomor?></td> 
                            <td><?=$key['nama_mp']?></td>
                            <td><?=$key['nama_area']?></td> 
                            <td><?php if($show_level!='team leader'){ ?><a href="<?=site_url('tl_vd/'.$key['id_user'])?>"><?=$key['fullname']?></a><?php }else{ ?><?=$key['fullname']?><?php } ?></td>
                            <td><?=$key['jenis_gaji']?></td> 
                            <td>
                                <a title="view" class='btn btn-success btn-grad btnDetail fa fa-search' href="<?=site_url('mp_vd/'.$id)?>"></a>
                                <?php if($show_level=='admin' OR $show_level =='team leader'){ ?>
                                    <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('mp_ed/'.$id)?>"></a>
                                    <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('da_mp/'.$id)?>" onclick="return confirm('Yakin untuk Hapus Data <?=$confirm?> ?')"></a>
                                <?php } ?>
                            </td>                                                  
                        </tr>
                    <?php $nomor++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>