<div class="media user-media">
    <div class="set-pictu">
        <?php if(empty($show_foto)){ ?>
            <img class="profotu" src="<?=base_url('assets/img/user.png')?>">
        <?php }else{ ?>
            <img class="profotu" src="<?=base_url('assets/file/'.$show_foto)?>">
        <?php } ?>
    </div>
    <div class="media-body">
        <h5 class="media-heading penulisan"><?=$show_nama?></h5>
        <ul class="list-unstyled user-info">
            <li class="penulisan"><?=$show_level?></li>
            <li><i class="fa fa-calendar"></i> Last Access: <br/><i><?=$last_access?></i></li>
        </ul>
    </div>
</div>
