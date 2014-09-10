<?php if($form!='index'){ ?>
<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <header class="capitalize">
                <div class="icons"><i class="fa fa-search"></i></div>
                <h5><?=$title?></h5>
                <div class="toolbar">
                    <a href="<?=site_url('tl_ad')?>" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>   
            <div class="body clearfix">  
                <?php if ($form=='edit') {
                    include '/../menu/form_ev_tl.php';
                }elseif ($form=='view') {
                    include '/../menu/view_tl.php';
                } ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <?php include '/../menu/info.php';
        if ($form=='view') {
            include '/../menu/view_tl0.php';
        }elseif ($form='edit') { ?>
            <div class="box">
                <header class="capitalize">
                    <div class="icons"><i class="fa fa-edit"></i></div>
                    <h5><?=$title?></h5>
                </header>   
                <div class="body clearfix">  
                    <?php include '/../menu/view_tl.php'; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php } ?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-th-list"></i></div>
                <h5><?php if($form=='index'){ ?><?=$title?><?php }else{ ?><?=$direct?><?php } ?></h5>
            </header> 
            <div class="body">
                <table id="dataTable" class="table table-striped responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>  
                            <th>Name</th>
                            <th>Email</th> 
                            <th>Telephone</th>
                            <th>Status</th> 
                            <th>Action</th> 
                        </tr>                                            
                    </thead>
                    <tbody>
                    <?php $nomor=1;
                    foreach ($content as $key) { 
                        $id         = $key['id_user'];
                        $confirm    = $key['fullname'];?>
                        <tr>
                            <td><?=$nomor?></td> 
                            <td class="capitalize"><?=$key['fullname']?></td> 
                            <td><a href="mailto:<?=$key['email']?>"><?=$key['email']?></a></td>
                            <td><?=$key['telephone']?></td>
                            <td class="capitalize"><?=$key['status_user']?></td>
                            <td>
                                <a title="View" class='btn btn-success btn-grad btnDetail fa fa-search' href="<?=site_url('tl_vd/'.$id)?>"></a>
                                <?php if($show_level=='admin'){?>
                                    <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('tl_ad/'.$id)?>"></a>
                                    <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('dau_ad/'.$id)?>" onclick="return confirm('Yakin untuk Hapus Data <?=$confirm?> ?')"></a>
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
