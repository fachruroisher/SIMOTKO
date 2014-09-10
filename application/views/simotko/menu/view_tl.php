<h3><i><?=$fullname?></i></h3>
<div class="minfot">
    <div class="set-pict">
        <?php if(!empty($foto)){ ?>
            <img class="profot" src="<?=base_url('assets/file/'.$foto)?>">
        <?php }else{ ?>
            <img class="profot" src="<?=base_url('assets/img/user.png')?>">
        <?php } ?>
    </div>
</div>              
<table>
    <tr><td>Phone</td><td class="spasi"> :</td><td><?=$phone?></td></tr>
    <tr><td>NIK</td><td class="spasi"> :</td><td><i><strong><?=$username?></strong></i></td></tr>
    <tr><td>Email</td><td class="spasi"> :</td><td><a href="mailto:<?=$mail?>"><?=$mail?></a></td></tr>
    <tr class="capitalize"><td>Birthday</td><td class="spasi"> :</td><td><?=$tpl?>, <?=$tgl?></td></tr>
    <tr class="capitalize"><td>Work Place</td><td class="spasi"> :</td><td><?=$wk?></td></tr>
    <tr><td>Join</td><td class="spasi"> :</td><td><?=$tgm?></td></tr>
    <tr class="capitalize"><td>Alamat</td><td class="spasi"> :</td><td><?=$alamat?></td></tr>
</table>
