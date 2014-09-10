<?php 
    if(!$this->session->userdata('namauser')) 
        redirect('index');
    else if($this->session->userdata('level')==FALSE){
        redirect('');
    }    
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?=$title?></title>
        <meta name="description" content="SIM">
        <meta name="keywords" content="TA,Skripsi,fachrur,Informatika">
        <meta name='author' content='Fachrur Rois H'/>
        <meta name="msapplication-TileColor" content="#5bc0de"/>       
        <link rel="stylesheet" href="<?=base_url('assets/lib/bootstrap/css/bootstrap.css')?>">
        <link rel="stylesheet" href="<?=base_url('assets/css/main.css')?>"/>
        <link rel="stylesheet" href="<?=base_url('assets/lib/Font-Awesome/css/font-awesome.css')?>"/>   
        <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap-timepicker.min.css')?>">          
        <link rel="stylesheet" href="<?=base_url('assets/lib/validationengine/css/validationEngine.jquery.css')?>">           
        <link rel="stylesheet" href="<?=base_url('assets/lib/datatables/css/demo_page.css')?>"> 
        <link rel="stylesheet" href="<?=base_url('assets/lib/datatables/css/DT_bootstrap.css')?>"> 
        <link rel="stylesheet" href="<?=base_url('assets/lib/gritter/css/jquery.gritter.css')?>"> 
        <link rel="stylesheet" href="<?=base_url('assets/lib/uniform/themes/default/css/uniform.default.min.css')?>"> 
        <link rel="stylesheet" href="<?=base_url('assets/lib/switch/static/stylesheets/bootstrap-switch.css')?>">        
        <script src="<?=base_url('assets/lib/modernizr-build.min.js')?>"></script>
        <script src="<?=base_url('assets/js/jquery-1.10.2.min.js')?>"></script>        
        <!-- Time Picker -->
        <script type="text/javascript" src="<?=base_url('assets/js/FusionCharts.js');?>"></script>
        <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
        <script src="<?=base_url('assets/js/bootstrap-timepicker.min.js')?>"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#add_input').click(function() {
                mix = '<div class="form-group col-lg-12"><div class="bootstrap-timepicker col-lg-2 row "><input name="mulai[]" class="timepicker5 form-control" type="text" class="input-small form-control"><i class="icon-time"></i></div> <div class="col-lg-1 jarak">s/d</div><div class="bootstrap-timepicker col-lg-2 row"><input class="timepicker5 form-control" name="selesai[]" type="text" class="input-small form-control"><i class="icon-time"></i></div><div class="col-lg-6 row"><div class="col-lg-12"><input type="text" placeholder="Keterangan" name="isi[]" class="form-control" required></div></div><div class="col-lg-2 row"><select name="status[]" class="form-control"><option value="">Status</option><option value="proses">Proses</option><option value="selesai">Selesai</option></select></div></div>';
                $('.form-test').append(mix);
                $('.timepicker5').timepicker({
                    template: false,
                    showInputs: false,
                    minuteStep: 5
                });
            });
        });
        </script>        
    </head>
        <body class="padTop53">
        <div id="wrap">
        <div id="top">
            <!-- .navbar -->
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <!-- Brand and toggle get grouped for better mobile display -->
                <header class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a href="<?=site_url('ad_home')?>" class="navbar-brand">SIMOTKO</a>
                </header>   
                <div class="topnav">
                    <div class="btn-toolbar">                        
                        <div class="btn-group">
                            <a data-toggle="modal" title="New Information" data-placement="bottom" class="btn btn-default btn-sm" href="#NotModal">
                                <i class="fa fa-bullhorn"></i>
                            </a>
                            <a data-toggle="modal" data-placement="bottom" title="New Document" href="#docModal" class="btn btn-default btn-sm">
                                <i class="fa fa-file"></i>
                            </a>                                                        
                        </div>
                        <div class="btn-group">               
                            <a data-toggle="modal" title="Account Setting" data-placement="bottom" class="btn btn-primary btn-sm" href="<?=site_url('set_ad/'.ucfirst($this->session->userdata('id_user')))?>">
                                <i class="glyphicon glyphicon-cog"></i>
                                <span><strong>Account</strong></span>
                            </a>
                        </div>
                        <div class="btn-group">               
                            <a data-toggle="modal" title="Help" data-placement="bottom" class="btn btn-info btn-sm" href="#helpModal">
                                <i class="fa fa-question"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= site_url('logout')?>" data-toggle="tooltip" title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                                <i class="fa fa-power-off"></i>
                                <span style="color:white;"> Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
    