<?php if($form!='index'){ ?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header class="capitalize">
                <div class="icons"><i class="fa fa-search"></i></div>
                <h5><?=$title?></h5>
                <div class="toolbar">
                    <a href="<?=site_url('vd_ad')?>" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>   
            <div class="body clearfix">  
                <?php if($form=='edit' AND $show_level=='team leader'){
                    include '/../menu/form_edit_daily.php';                    
                }elseif($form=='view' AND $show_level!='payroll'){
                    include '/../menu/view_dialy.php';
                } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="row">
    <div class="col-lg-12">
<div class="box">
    <header class="penulisan">
        <h5><?php if($form=='index'){ ?><?=$title?><?php }else{ ?><?=$direct?><?php } ?></h5>
        <?php if($form=='index' AND $show_level=='team leader'){ ?>
            <div class="toolbar">     
                <a href="#<?=$id_button?>" class="butmar accordion-toggle btn btn-sm btn-primary " data-toggle="collapse"><?=$button?></a>                                       
            </div>
        <?php } ?>
    </header>      
    <?php if($form=='index' AND $show_level=='team leader'){ ?>
        <div id="<?=$id_button?>" class="collapse out">
            <?php include '/../menu/form_add_daily.php'; ?>
        </div>
    <?php } ?>
    <div class="body">
        <table id="dataTable" class="table table-striped responsive-table">
            <thead>
                <tr>
                    <th>No</th>  
                    <th>Posted</th>
                    <th>Tanggal</th>   
                    <th>Action</th> 
                </tr>                                            
            </thead>
            <tbody class="normal-text">
            <?php $nomor=1;
            foreach ($content as $key) { ?>
                <tr class="capitalize">
                    <td><?=$nomor?></td> 
                    <td><?=$key['fullname']?></td>
                    <td><?=$key['tanggal']?> </td>   
                    <td>
                        <a title="View" class='btn btn-success btn-grad btnDetail fa fa-search' href="<?=site_url('vd_ed/'.$key['tanggal'].'/'.$key['id_tl'])?>"></a>
                        <?php if($show_level=='team leader'){ ?>
                        <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('vd_ad/'.$key['tanggal'].'/'.$key['id_tl'])?>"></a>
                        <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('da_vd/'.$key['tanggal'].'/'.$key['id_tl'])?>" onclick="return confirm('Yakin untuk Hapus Data <?=$key['tanggal']?> ?')"></a>
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