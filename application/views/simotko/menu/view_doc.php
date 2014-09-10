<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-paste"></i></div>
                <h5><?php echo $title ?></h5>
                <?php if($show_level != 'team leader'){ ?>
                <div class="toolbar">
                    <a href="<?=site_url('doc_ad')?>" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>  Manage Document</a>
                </div>
                <?php } ?>
            </header>
            <div class="body clearfix">
                <?php $num=1; foreach ($content as $key) { ?>
                <div class="col-lg-6 " style="margin-bottom:20px;">
                    <div class="col-lg-12"><span class="label label-warning user-label"><?=$num?></span>  <strong><?=$key['title']?></strong></div>
                    <div class="col-lg-1" style="margin-right:15px;">
                        <a style="float:left; margin-top:4px;" class="btn btn-lg btn-primary" target="_blank" href="<?=base_url('assets/document/'.$key['gambar'])?>" title="Download <?=$key['gambar']?>" >  <i class="fa fa-download"></i></a>
                    </div>
                    <div class="col-lg-9" >
                        <table>
                            <tr>
                                <td><?=$key['keterangan']?></td>
                            </tr>
                            <tr>
                                <td><i><h6>Posted at <?=$key['tanggal']?></h6></i></td>
                            </tr>
                        </table>
                    </div>
                </div> 
                <?php $num++; } ?>            
            </div>
            <center><?=$links?></center>            
        </div>
    </div>
</div>