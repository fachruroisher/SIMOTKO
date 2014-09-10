                <div class="collapse navbar-collapse navbar-ex1-collapse">    
                    <ul class="nav navbar-nav">
                        <li class="<?php if($part=='home'){ ?>active<?php } ?>"><a href="<?= site_url('ad_home')?>"><i class="fa fa-home"></i> Home</a></li>
                        <?php if ($show_level=='admin') { ?>
                                <li class="<?php if($part=='user'){ ?>active<?php } ?>"><a href="<?= site_url('user_ad')?>"><i class="fa fa-user"></i> Manage Users</a></li>
                        <?php } ?>
                        <?php if ($show_level != 'team leader') { ?>
                               <li class="<?php if($part=='doc'){ ?>active<?php } ?>"><a href="<?= site_url('doc_ad')?>"><i class="fa fa-book"></i> Documents</a></li>
                        <?php } ?>   
                    </ul>
                </div>
            </nav>
            <header class="head">
                <?php include 'menu/search.php';?>
                <div class="main-bar">
                    <h5><i class="fa fa-home"></i>  <a href="<?=site_url('ad_home')?>">Home</a> / 
                    <?php if($form!='index' AND $form!='add') { ?>
                        <a href="<?=site_url($link_direct)?>"><?=$direct?></a> / 
                    <?php } ?>
                    <?=$title?>
                    </h5>
                </div>
            </header>
        </div>
        
        <div id="left">
            <?php include 'menu/user_pict.php';?>             
            <ul id="menu" class="collapse">
                <li class="nav-header">Menu</li>
                <li class="nav-divider"></li>
                <li <?php if($part=='home'){ ?>class="active"<?php } ?>><a href="<?= site_url('ad_home')?>"><i class="fa fa-home"></i>  Home</a></li>   
                <?php if ($show_level!='payroll') { ?>
                    <li <?php if($part=='dr'){ ?>class="active"<?php } ?>><a href="<?= site_url('vd_ad')?>"><i class="fa fa-font"></i>  Daily Report</a></li>
                <?php } ?>
                <?php if ($show_level != 'team leader') { ?>
                    <li <?php if($part=='info'){ ?>class="active"<?php } ?>><a href="<?= site_url('inf_ad')?>"><i class="fa fa-list"></i>  Information</a></li>
                <?php } ?>
                <?php if ($show_level!='team leader') { ?>
                    <li <?php if($part=='tl'){ ?>class="active"<?php } ?>><a href="<?= site_url('tl_ad')?>"><i class="fa fa-user"></i>  Team Leader</a></li>
                <?php } ?>
                <li <?php if($part=='area'){ ?>class="active"<?php } ?>><a href="<?= site_url('am_ad')?>"><i class="fa fa-coffee"></i>  Area Klien</a></li>
                <li <?php if($part=='presensi'){ ?>class="active"<?php } ?>><a href="<?= site_url('pm_ad')?>"><i class="glyphicon glyphicon-ok"></i>  Presensi</a></li>                        
                <li class="panel <?php if ($sub_part=='mp_sub') { ?>active<?php } ?>">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#man_power">
                        <i class="fa fa-table"></i>  Man Power<span class="pull-right"><i class="fa fa-angle-left"></i></span>
                    </a>
                    <ul class="collapse <?php if($sub_part=='mp_sub'){?>in<?php } ?>" id="man_power">
                    <?php foreach ($ps as $key) { ?>
                        <li <?php if($id_button==$key['id_posisi']){ ?>class="active"<?php } ?>><a href="<?= site_url('mp_ad/'.$key['id_posisi'])?>" class="penulisan"><i class="fa fa-angle-right"></i> <?=$key['nama_posisi']?></a></li>
                    <?php } ?>
                    </ul>
                </li>
                <?php if ($show_level=='admin') { ?>
                    <li class="panel <?php if ($sub_part=='sistem') { ?>active<?php } ?>">
                        <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#sistem">
                            <i class="fa fa-cogs"></i> Setting Sistem<span class="pull-right"><i class="fa fa-angle-left"></i></span>
                        </a>
                        <ul class="collapse <?php if($sub_part=='sistem'){?>in<?php } ?>" id="sistem">
                            <li <?php if($part=='guide') { ?>class="active" <?php } ?> ><a href="<?= site_url('g_ad')?>"><i class="fa fa-angle-right"></i> User Guide</a></li>
                            <li <?php if($part=='prosis'){ ?>class="active"<?php } ?>><a href="<?= site_url('sis_ad')?>"><i class="fa fa-angle-right"></i> System Profil</a></li>
                            <li <?php if($part=='posisi') { ?>class="active" <?php } ?> ><a href="<?= site_url('pos_ad')?>"><i class="fa fa-angle-right"></i> Posisi Man Power</a></li>
                            <li <?php if($part=='gaji'){ ?>class="active"<?php } ?>><a href="<?= site_url('sm_ad')?>"><i class="fa fa-angle-right"></i> jenis Gaji Man Power</a></li>
                            <li <?php if($part=='shift'){ ?>class="active"<?php } ?>><a href="<?= site_url('sf_ad')?>"><i class="fa fa-angle-right"></i> Shift Kerja Man Power</a></li>
                            <li <?php if($part=='wilayah'){ ?>class="active"<?php } ?>><a href="<?= site_url('wm_ad')?>"><i class="fa fa-angle-right"></i> Wilayah Kerja</a></li>
                        </ul>
                    </li>                        
                <?php } ?>
                <?php if ($show_level == 'admin' OR $show_level == 'payroll') { ?>
                    <li <?php if($part=='record gaji'){ ?>class="active"<?php } ?>><a href="<?= site_url('rg_ad')?>"><i class="fa fa-list"></i> Record Gaji</a></li>
                <?php } ?>                   
                <li class="nav-divider"></li>                      
            </ul>
        </div>
        
        <div id="content">
            <div class="outer">
                <div class="inner"> 
                    <?php if($part=='home'){ ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Welcome to <i><b>Operational Management System</b><sup></sup></i></h3>
                        </div>
                            <?php include 'menu/home_left.php'; ?>
                            <div class="col-lg-5">                                
                                <?php include 'menu/info.php'; ?>
                            </div>
                            <?php include 'menu/home_right.php'; ?>                                
                    </div>
                    <?php }elseif($part=='setting' OR $part =='profil') {
                        include 'menu/setting.php';
                    }elseif($part=='doc' AND $sub_part=='view'){ 
                        include 'menu/info.php';
                        include'menu/view_doc.php'; 
                    }elseif($part=='prosis' AND $show_level=='admin'){
                        include'menu/setup_system.php';
                    }elseif($part=='search'){ 
                        include 'menu/info.php';
                        include'page/search.php';
                    }elseif($part=='record gaji'){
                        if($show_level=='admin' OR $show_level=='payroll'){ 
                            if ($form!='hasil') {
                            include 'menu/info.php';
                            }
                            include'template/notif.php';                             
                            include'page/recgaji.php'; 
                        }else{
                            redirect('404_override');
                        } 
                        
                    }elseif($part=='user'){ 
                        if($show_level=='admin'){ 
                            if ($form=='index') {
                                include 'menu/info.php';
                            }  
                            include'template/notif.php'; 
                            include'page/user.php'; 
                        }else{
                            redirect('404_override');
                        } 
                    }elseif ($part=='doc'){
                        if($show_level!='team leader'){ 
                            if ($form=='index') {
                                include 'menu/info.php';
                            }  
                            include'template/notif.php'; 
                            include'page/doc.php'; 
                        }else{
                            redirect('404_override');
                        }
                    }elseif ($part=='dr') { 
                        if($show_level!='payroll'){ 
                            include 'menu/info.php';
                            include'template/notif.php'; 
                            include'page/daily.php'; 
                        }else{
                            redirect('404_override');
                        }
                    }elseif ($part=='shift') { 
                        if($show_level=='admin'){ 
                            if ($form=='index') {
                                include 'menu/info.php';
                            }                                
                            include'template/notif.php'; 
                            include'page/shift.php'; 
                        }else{
                            redirect('404_override');
                        }
                    }elseif ($part=='info') { 
                        if($show_level!='team leader'){ 
                            include 'menu/info.php';
                            include'template/notif.php'; 
                            include'page/info.php'; 
                        }else{
                            redirect('404_override');
                        }
                    }elseif ($part=='guide') { 
                        if($show_level=='admin'){
                            if($form=='index'){
                                include 'menu/info.php'; 
                            }                                    
                            include'template/notif.php'; 
                            include'page/guide.php'; 
                        }else{
                            redirect('404_override');
                        }
                    }elseif ($part=='tl') { 
                        if($show_level!='team leader'){
                            if($form=='index'){
                                include 'menu/grafik_tl.php';
                            }
                            include'template/notif.php'; 
                            include'page/tl.php'; 
                        }else{
                            redirect('404_override');
                        }
                    }elseif ($part=='area') { 
                        if($form=='index'){
                            include 'menu/info.php'; 
                        }
                        include'template/notif.php'; 
                        include'page/area.php';
                    }elseif ($part=='presensi') {
                        include 'menu/info.php';
                        include'template/notif.php'; 
                        include'page/presensi.php';
                    }elseif ($part=='mp') { 
                        if($form=='index'){
                            include 'menu/grafik_mp.php';
                        }
                        include'template/notif.php';  
                        include'page/mp.php';
                    }elseif ($part=='gaji') { 
                        if($show_level=='admin'){ 
                            if($form=='index'){
                                include 'menu/info.php'; 
                            }
                            include'template/notif.php'; 
                            include'page/gaji.php'; 
                        }else{
                            redirect('404_override');
                        }
                    }elseif ($part=='posisi') { 
                        if($show_level=='admin'){ 
                            if($form=='index'){
                                include 'menu/info.php'; 
                            }
                            include'template/notif.php'; 
                            include'page/posisi.php'; 
                        }else{
                            redirect('404_override');
                        }
                    }elseif ($part=='wilayah') { 
                        if($show_level=='admin'){ 
                            include 'menu/info.php';
                            include'template/notif.php'; 
                            include'page/wilayah.php'; 
                        }else{
                            redirect('404_override');
                        }
                    }else{
                        redirect('404_override');
                    } ?>
                </div>
            </div>
        </div>                 
    </div>