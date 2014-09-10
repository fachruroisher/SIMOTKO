<div class="box">
    <header>
        <div class="icons"><i class="fa fa-user"></i></div>
        <h5><?php echo $fullname; ?></h5>
    </header>            
    <div class="body clearfix">
        <div class="set-pict"  style="float:left; margin-right:15px;">
            <?php if(!empty($foto)){ ?>
                <img class="profot" src="<?=base_url('assets/file/'.$foto)?>">
            <?php }else{ ?>
                <img class="profot" src="<?=base_url('assets/img/user.png')?>">
            <?php } ?> 
        </div>
        <table class="capitalize">
            <tr><td>NIK</td><td class="spasi">:</td><td><?=$username?></td></tr>
            <tr><td>Posisi</td><td class="spasi">:</td><td><?=$level?></td></tr>
            <tr><td>Status</td><td class="spasi">:</td><td><?=$status?></td></tr>
            <tr><td>Phone</td><td class="spasi">:</td><td><?=$phone?></td></tr>
            <tr><td>Email</td><td class="spasi">:</td><td class="lowercase"><a href="mailto:<?=$email?>"><?=$email?></a></td></tr> 
        </table>   
    </div>
</div>