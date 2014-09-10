<!-- .col-lg-6 -->
    <div class="col-lg-7">
        <div class="box">
            <header>
                <div class="icons"><i class="fa fa-signal"></i></div>
                <h5>Grafik Jumlah Man Power </h5>
            </header>
            <div class="body">
                <div id="grafik">              
                    <div id="grafik_container" style="height:320px;"></div>
                </div>
                <script>
                    $(function() {
                        var dataGrafik1 = JSON.parse('<?= $jsonStrDataPosisi ?>');       
                        var jsonDataGrafik1 = {           
                            "data": []
                        };
                        for (var key in dataGrafik1) {
                            if (dataGrafik1.hasOwnProperty(key)) {
                                jsonDataGrafik1['data'].push({ 'label' : key, 'value': dataGrafik1[key] });
                            }
                        }
                        var myChart2 = new FusionCharts("<?=base_url('assets/Charts/Pie3D.swf')?>", "myChartId2");
                        myChart2.setJSONData(jsonDataGrafik1);
                        myChart2.render('grafik_container');
                    })
                </script>
            </div>
        </div>
    </div>
    