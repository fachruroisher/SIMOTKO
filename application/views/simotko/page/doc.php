<?php if($form!='index'){ ?>
<div class="row">
    <div class="col-lg-7">
        <div class="box">
            <header class="capitalize">
                <div class="icons"><i class="fa fa-edit"></i></div>
                <h5><?=$title?></h5>
                <div class="toolbar">
                    <a href="<?=site_url('doc_ad')?>" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>   
            <div class="body clearfix">  
                <?php include '/../menu/form_ae_doc.php'; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <?php include '/../menu/info.php'; ?>
    </div>
</div>
<?php } ?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header class="penulisan">
                <div class="icons"><i class="fa fa-list"></i></div>
                <h5><?php if($form=='index'){ ?><?=$title?><?php }else{ ?><?=$direct?><?php } ?></h5>
                <?php if($form=='index'){ ?>
                    <div class="toolbar">     
                        <a href="#<?=$id_button?>" class="butmar accordion-toggle btn btn-sm btn-primary " data-toggle="collapse"><?=$button?></a>                                       
                    </div>
                <?php } ?>
            </header>      
            <?php if($form=='index'){ ?>
                <div id="<?=$id_button?>" class="collapse out">
                    <div class="body clearfix">
                        <div class="col-lg-8">
                            <?php include '/../menu/form_ae_doc.php'; ?>
                        </div>
                    </div>
                </div> 
            <?php } ?>
            <div class="body">
                <table id="dataTable" class="table table-striped responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>  
                            <th>Title</th>
                            <th>Tanggal</th>
                            <th>Posted</th>  
                            <th>Action</th> 
                        </tr>                                            
                    </thead>
                    <tbody class="normal-text">
                    <?php $nomor=1;
                    foreach ($content as $key) { 
                        $id         = $key['id_document'];
                        $confirm    = 'Document '.$key['title'].' dari '.$key['fullname'];?>
                        <tr class="capitalize">
                            <td><?=$nomor?></td> 
                            <td><?=$key['title']?></td>
                            <td><?=$key['tanggal']?></td>
                            <td><?=$key['fullname']?></td>   
                            <td>
                                <a title="Download <?=$key['gambar']?>" target="_blank"  class='btn btn-success btn-grad btnDetail fa fa-download' href="<?=base_url('assets/document/'.$key['gambar'])?>"></a>
                                <a title="Edit" class='btn btn-primary btn-grad btnDetail glyphicon glyphicon-edit' href="<?=site_url('doc_ad/'.$id)?>"></a>
                                <a title="Delete" class='btn btn-danger btn-grad btnDetail glyphicon glyphicon-remove' href="<?=site_url('da_doc/'.$id)?>" onclick="return confirm('Yakin untuk Hapus Data <?=$confirm?> ?')"></a>
                            </td>                                                  
                        </tr>
                    <?php $nomor++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

