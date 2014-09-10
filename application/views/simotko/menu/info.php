        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-bullhorn"></i></div>
                <h5>Information</h5>
            </header>            
            <div class="body clearfix">
                <blockquote class="pull-right">                    
                    <p class="text-muted">
                        <?php if($show_stinfo=='aktif'){ ?>
                            <?=$show_info?>
                            <small><?=$show_posted?></small>
                        <?php }else{ ?>
                            Selamat beraktivitas dan Selalu update info di sistem ini
                            <small>Admin</small>
                        <?php } ?>
                    </p>                    
                </blockquote>
            </div>
        </div>