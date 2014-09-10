<?php if ($form=='view' OR $form=='edit' OR $form=='add') { ?>
<div class="box">
    <header class="penulisan">
        <div class="icons"><i class="fa fa-refresh"></i></div>
        <h5><?=$title?></h5>
    </header> 
    <div class="body">
       <div class="collapse in">
        <?php if ($form=='view') { ?>
            <?php include '/../menu/view_presensi.php'; ?>
        <?php }elseif ($form=='edit' AND $show_level=='team leader') { ?>
            <?php include '/../menu/form_edit_presensi.php'; ?>
        <?php }elseif ($form=='add' AND $show_level=='team leader') { ?>
            <?php include '/../menu/form_add_presensi.php'; ?>
        <?php } ?>
        </div> 
    </div>
</div>
<?php } ?>

<div class="box">
    <header class="capitalize">
        <div class="icons"><i class="fa fa-th-list"></i></div>
        <h5><?php if($form=='index' OR $form=='add'){ ?><?=$title?><?php }else{ ?><?=$direct?><?php } ?></h5>
        <?php if($form=='index' AND $show_level=='team leader'){ ?>
            <div class="toolbar">     
                <a href="#<?=$id_button?>" class="butmar accordion-toggle btn btn-sm btn-primary " data-toggle="collapse"><?=$button?></a>                                       
            </div>
        <?php } ?>
    </header>      
    <?php if($form=='index' AND $show_level=='team leader'){ ?>
        <div id="<?=$id_button?>" class="collapse out">
            <?php include '/../menu/form_ae_presensi.php'; ?>
        </div>    
    <?php } ?>
    <div class="body">
        <table id="dataTable" class="table table-striped responsive-table">
            <thead>
                <tr>
                    <th>No</th>  
                    <th>Tanggal</th>
                    <th>Posisi</th>
                    <th>Area</th>
                    <th>Shift</th> 
                    <th>Action</th> 
                </tr>                                            
            </thead>
            <tbody class="normal-text">
            <?php $nomor=1;
            foreach ($content as $key) { ?>
                <tr class="capitalize">
                    <td><?=$nomor?></td> 
                    <td><?=$key['tanggal']?></td>
                    <td><?=$key['nama_posisi']?></td>
                    <td><?=$key['nama_area']?></td>
                    <td><?=$key['nama_shift']?></td>
                    <td>
                        <a title="View" class='btn btn-success btn-grad btnDetail fa fa-search' href="<?=site_url('pm_vd/'.$key['tanggal'].'/'.$key['id_area'])?>"></a>
                        <?php if($show_level=='team leader'){ ?>
                        <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('pm_ad/'.$key['tanggal'].'/'.$key['id_area'])?>"></a>
                        <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('da_pm/'.$key['tanggal'].'/'.$key['id_area'])?>" onclick="return confirm('Yakin untuk Hapus Data <?=$key['tanggal']?> ?')"></a>
                        <?php } ?>
                    </td>                                                  
                </tr>
            <?php $nomor++; } ?>
            </tbody>
        </table>
    </div>
</div>