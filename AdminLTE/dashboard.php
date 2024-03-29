<?php
    $sql1 = "select * from upa.raw_data where address = 2300 and board_number=22 order by created_at desc limit 1";
    $result1 = mysqli_query($conn, $sql1);
    $rowline1 = mysqli_fetch_array($result1);

//    echo $row['data1'];
//    echo $row['tds_out'];
//    echo $row['pressure_in'];
//    echo $row['pressure_out'];
?>


<section class="content">
    <div class="container-fluid">
    <h4>외부 온습도</h4>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="info-box bg-info">
<!--                    <span class="info-box-icon"><i class="far fa-bookmark"></i></span>-->

                    <div class="info-box-content">
                        <span class="info-box-text">온도</span>
                        <span class="info-box-number"><?php echo $rowline1['data1'];?> °C</span>

                        <div class="progress">
                        <div class="progress-bar" style="width: <?php echo $rowline1['data1'];?>%"></div>
                        </div>
                        <span class="progress-description">
                            조회 시점 : <?php echo substr($rowline1['create_at'],5,11);?> <!-- ($row['create_at'],11,8) -->
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-12">
                <div class="info-box bg-info">
<!--                    <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>-->

                    <div class="info-box-content">
                        <span class="info-box-text">습도</span>
                        <span class="info-box-number"><?php echo $rowline1['data2'];?> %</span>

                        <div class="progress">
                        <div class="progress-bar" style="width: <?php echo $rowline1['data2'];?>%"></div>
                        </div>
                        <span class="progress-description">
                            조회 시점 : <?php echo substr($rowline1['create_at'],5,11);?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->

        </div>
        <!-- /.row -->
        <!-- Main row -->            
    
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="pt-2 px-3"><h3 class="card-title"></h3></li>
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">음수량</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false"></a>
                        </li>
                        
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                01 : 1동 음수섭취량
                                            </h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_1" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                02: 1동 시간대별 음수량
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_2" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                03 : 2동 음수섭취량
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_3" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                04 : 2동 시간대별 음수량
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_4" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                05 : 3동 음수섭취량
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_5" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                06 : 3동 시간대별 음수량
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_6" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                07 : 4동 음수섭취량
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_7" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                08 : 4동 시간대별 음수량
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_8" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                09 : 5동 음수섭취량
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_9" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                10 : 5동 시간대별 음수량
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_10" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-lg-6 col-sm-12"> -->
                                    <!-- Line chart -->
                                    <!-- <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                11 : 1(R),2(B),3(G)동 일간
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_11" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- <div class="col-lg-6 col-sm-12"> -->
                                    <!-- Line chart -->
                                    <!-- <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="far fa-chart-bar"></i>
                                                12 : 1(R),2(B),3(G)동 시간당
                                            </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="Line_Chart_12" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


         
                        </div>

                        <!-- 2번 탭 -->
                        <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                        </div>
                        <!-- 3번 탭 -->
                        <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                        </div>
                        <!-- 4번 탭- -->
                        <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>


<script src="plugins/jquery/jquery.min.js"></script>

<script>
    $(function () {
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

        $("[name='control_checkbox_1']").on('switchChange.bootstrapSwitch',function (e,data) {
            $.ajax({
                url: "../conf/Ajaxcontrol.check.php",
                dataType: 'json',
                data: {relay:'relay1', do_work:data},
                success: function (data) {
                    const do_work = data.pay_load.do_work

                    if (do_work == 1) {
                        $("[name='control_button_1']").text('작동중')

                        $("[name='control_button_1']").addClass("bg-gradient-primary");
                        $("[name='control_button_1']").removeClass("bg-gradient-danger");
                    } else if (do_work == 0) {
                        $("[name='control_button_1']").text('멈춤')

                        $("[name='control_button_1']").addClass("bg-gradient-danger");
                        $("[name='control_button_1']").removeClass("bg-gradient-primary");
                    } else {
                        $("[name='control_button_1']").text('멈춤')

                        $("[name='control_button_1']").addClass("bg-gradient-danger");
                        $("[name='control_button_1']").removeClass("bg-gradient-primary");
                    }
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        });

        $("[name='control_checkbox_2']").on('switchChange.bootstrapSwitch',function (e,data) {
            $.ajax({
                url: "../conf/Ajaxcontrol.check.php",
                dataType: 'json',
                data: {relay:'relay2', do_work:data},
                success: function (data) {
                    const do_work = data.pay_load.do_work

                    if (do_work == 1) {
                        $("[name='control_button_2']").text('작동중')

                        $("[name='control_button_2']").addClass("bg-gradient-primary");
                        $("[name='control_button_2']").removeClass("bg-gradient-danger");
                    } else if (do_work == 0) {
                        $("[name='control_button_2']").text('멈춤')

                        $("[name='control_button_2']").addClass("bg-gradient-danger");
                        $("[name='control_button_2']").removeClass("bg-gradient-primary");
                    } else {
                        $("[name='control_button_2']").text('멈춤')

                        $("[name='control_button_2']").addClass("bg-gradient-danger");
                        $("[name='control_button_2']").removeClass("bg-gradient-primary");
                    }
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        });

        Get_Line_Chart_1_Data()

        // 데이터 불러오기
        function Get_Line_Chart_1_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_1.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_1_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        // 데이터 바인딩 ( 데이터 갖고온것을 차트구조에 맡게 설정 및 html에 뿌려주기 )
        function _Line_Chart_1_update(_data) {
            const dataset = _data.pay_load.dataset
            
            $.plot('#Line_Chart_1', [dataset['daily_1building']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                  show:true,
                  content: "음수 : %yL <br /> 날짜 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }


        Get_Line_Chart_2_Data()

        function Get_Line_Chart_2_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_2.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_2_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_2_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_2', [dataset['time_in'],], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                    show:true,
                    content: "음수 : %yL<br /> 시간 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

        Get_Line_Chart_3_Data()

        function Get_Line_Chart_3_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_3.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_3_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_3_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_3', [dataset['daily_2building']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                    show:true,
                    content: "음수 : %yL <br /> 날짜 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

        Get_Line_Chart_4_Data()

        function Get_Line_Chart_4_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_4.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_4_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_4_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_4', [dataset['time_in']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                    show:true,
                    content: "음수 : %yL<br /> 시간 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }


        Get_Line_Chart_5_Data()

        function Get_Line_Chart_5_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_5.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_5_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_5_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_5', [dataset['daily_3building']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                    show:true,
                    content: "음수 : %yL <br /> 날짜 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

        Get_Line_Chart_6_Data()

        function Get_Line_Chart_6_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_6.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_6_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_6_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_6', [dataset['time_in']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                    show:true,
                    content: "음수 : %yL<br /> 시간 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }



        Get_Line_Chart_7_Data()

        function Get_Line_Chart_7_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_7.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_7_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_7_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_7', [dataset['daily_4building']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                    show:true,
                    content: "음수 : %yL<br /> 날짜 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

        Get_Line_Chart_8_Data()

        function Get_Line_Chart_8_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_8.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_8_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_8_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_8', [dataset['time_in']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                    show:true,
                    content: "음수 : %yL<br /> 시간 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }       


        Get_Line_Chart_9_Data()

        function Get_Line_Chart_9_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_9.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_9_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_9_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_9', [dataset['daily_5building']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                    show:true,
                    content: "음수 : %yL<br /> 날짜 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

        Get_Line_Chart_10_Data()

        function Get_Line_Chart_10_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_10.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_10_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_10_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_10', [dataset['time_in']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                    show:true,
                    content: "음수 : %yL<br /> 시간 : %x"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }               








        Get_Line_Chart_11_Data()

        function Get_Line_Chart_11_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_11.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_11_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_11_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_11', [dataset['daily_1building'],dataset['daily_2building'],dataset['daily_3building'],dataset['daily_4building'],dataset['daily_5building']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                    show:true,
                    content: "음수 : %yL "
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

        Get_Line_Chart_12_Data()

        function Get_Line_Chart_12_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_12.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_12_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_12_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_12', [dataset['daily_1building'],dataset['daily_2building'],dataset['daily_3building'],dataset['daily_4building'],dataset['daily_5building']], {
                grid  : {
                    hoverable  : true,
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor  : '#f3f3f3',
                },
                series: {
                    shadowSize: 0,
                    lines     : {
                        show: true
                    },
                    points    : {
                        show: false
                    }
                },
                tooltip: {
                show:true,
                content: "음수 : %yL"
                },
                lines : {
                    fill : false,
                    color: ['#3c8dbc', '#f56954']
                },
                yaxis : {
                    show: true
                },

                xaxis : {
                    ticks: _data.pay_load.create_at,
                    show: true
                }
            })
        }

    });
</script>
