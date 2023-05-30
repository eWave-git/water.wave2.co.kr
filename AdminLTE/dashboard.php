<?php
    $sql1 = "select *, 
            round(1.8 * data1 + 32 -0.55*(1-data2/100)*(1.8*data1-26),0) as data8 
            from water.raw_data 
            where address = 509 and board_number=3 
            order by create_at 
            desc limit 1";

    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);

//    echo $row['data1'];
//    echo $row['tds_out'];
//    echo $row['pressure_in'];
//    echo $row['pressure_out'];
?>

<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        동별 온습도 <!------------------------------------------------------------------------------------------------------------- -->
        <div class="row">
            <div class="col-lg-auto col-12">
                <div class="info-box bg-info">
<!--                    <span class="info-box-icon"><i class="far fa-bookmark"></i></span>-->

                    <div class="info-box-content">
                        <span class="info-box-text">1동 온도</span>
                        <span class="info-box-number"><?php echo $row1['data1'];?> °C</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data1'];?>%"></div>
                        </div>
                        <span class="progress-description">
                            Last : <?php echo substr($row1['create_at'],5,11);?> <!-- ($row['create_at'],11,8) -->
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-auto col-12">
                <div class="info-box bg-info">
<!--                    <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>-->

                    <div class="info-box-content">
                        <span class="info-box-text">1동 습도</span>
                        <span class="info-box-number"><?php echo $row1['data2'];?> %</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data2'];?>%"></div>
                        </div>
                        <span class="progress-description">
                            Last : <?php echo substr($row1['create_at'],5,11);?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- ./col -->
            <div class="col-lg-auto col-12">
                <div class="info-box bg-info">
<!--                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>-->

                    <div class="info-box-content">
                        <span class="info-box-text">1동 THI</span>
                        <span class="info-box-number"><?php echo $row1['data8'];?> Point </span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data8'];?>%"></div>
                        </div>
                        <span class="progress-description">
                            Last : <?php echo substr($row1['create_at'],5,11);?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-auto col-12">
                <div class="info-box bg-success">
<!--                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>-->
                    <div class="info-box-content">
                        <span class="info-box-text">2동 온도</span>
                        <span class="info-box-number"><?php echo $row1['data2'];?> %</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data2'];?>"></div>
                        </div>
                        <span class="progress-description">
                            Last : <?php echo substr($row1['create_at'],5,11);?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-auto col-12">
                <div class="info-box bg-success">
<!--                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>-->
                    <div class="info-box-content">
                        <span class="info-box-text">2동 습도</span>
                        <span class="info-box-number"><?php echo $row1['data2'];?> %</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data2'];?>"></div>
                        </div>
                        <span class="progress-description">
                            Last : <?php echo substr($row1['create_at'],5,11);?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-auto col-12">
                <div class="info-box bg-success">
<!--                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>-->
                    <div class="info-box-content">
                        <span class="info-box-text">2동 THI</span>
                        <span class="info-box-number"><?php echo $row1['data2'];?> %</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data2'];?>"></div>
                        </div>
                        <span class="progress-description">
                            Last : <?php echo substr($row1['create_at'],5,11);?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-auto col-12">
                <div class="info-box bg-warning">
<!--                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>-->
                    <div class="info-box-content">
                        <span class="info-box-text">3동 온도</span>
                        <span class="info-box-number"><?php echo $row1['data2'];?> %</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data2'];?>"></div>
                        </div>
                        <span class="progress-description">
                            Last : <?php echo substr($row1['create_at'],5,11);?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-auto col-12">
                <div class="info-box bg-warning">
<!--                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>-->
                    <div class="info-box-content">
                        <span class="info-box-text">3동 습도</span>
                        <span class="info-box-number"><?php echo $row1['data2'];?> %</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data2'];?>"></div>
                        </div>
                        <span class="progress-description">
                            Last : <?php echo substr($row1['create_at'],5,11);?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-auto col-12">
                <div class="info-box bg-warning">
<!--                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>-->
                    <div class="info-box-content">
                        <span class="info-box-text">3동 THI</span>
                        <span class="info-box-number"><?php echo $row1['data2'];?> %</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $row1['data2'];?>"></div>
                        </div>
                        <span class="progress-description">
                            Last : <?php echo substr($row1['create_at'],5,11);?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            
            <!-- ./col -->
        </div>
        <!-- Small boxes (Stat box) -->
    </div>
        <!-- /.row -->

        <!-- Main row bg-info bg-success bg-warning bg-danger-->        <!-- Main row -->        <!-- Main row -->        <!-- Main row -->        <!-- Main row -->        <!-- Main row -->        <!-- Main row -->        <!-- Main row -->
        



        <div class="row">



            <div class="col-lg-12 col-sm-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="pt-2 px-3"><h3 class="card-title">section </h3></li>
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">매일농장1동</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">230521 수정중</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">매일농장3동</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">-</a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <!-- 송화버섯 -->
                            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    1: 오늘 음수 섭취량 시간대별 그래프
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
                                                    2: 전일 음수 섭취량 시간대별 그래프
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
                                                    3: 입식일부터 1일 음수 섭취량 그래프 (날짜별 별도/증가추세 보기)
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
                                                    4: 어제 0시~24시 음수 섭취량 누적 그래프 (오늘 그래프와 비교 필요하겠다.)
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
                                                    5: 1번 그래프 막대로 변형 (최근 24시간)
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
                                                <div id="bar_chart_1" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    6: 0시부터 24시간 그래프 어제
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
                                                <div id="bar_chart_2" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 매일농장 3-4 -->
                            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    2-1: 입식일 이후 1동 시간대별 평균 그래프 (5-13일부터)
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
                                                <div id="Line_Chart_21" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    2-2 : 오늘 1동 시간대별 평균 그래프
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
                                                <div id="Line_Chart_22" style="height: 300px;"></div>
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
                                                    2-3: 2-3: 막대 입식 이후 일간섭취량
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
                                                <div id="bar_chart_21" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                     <!-- Line chart-->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    2-4: 일간 통계 증감량 (꺽은선을 그려야 할듯 ㅠㅜ)
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
                                                <div id="bar_chart_22" style="height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 새송이버섯 -->
                            <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>

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

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>

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

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>

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

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <!-- Line chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>

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

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>



                            <!-- - -->
                            <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">

                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

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
            
            $.plot('#Line_Chart_1', [dataset['tds_in'],dataset['tds_out']], {
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
                  content: "섭취량 : %yL<br /> 시간 : %x"
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

            $.plot('#Line_Chart_2', [dataset['pressure_in'],dataset['pressure_out']], {
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
                    content: "섭취량 : %yL<br /> 시간 : %x"
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

            $.plot('#Line_Chart_3', [dataset['water_in'],dataset['water_out']], {
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
                    content: "섭취량 : %yL<br /> 시간 : %x"
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

            $.plot('#Line_Chart_4', [dataset['throughput']], {
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
                    content: "섭취량 : %yL<br /> 시간 : %x"
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


        Get_Line_Chart_21_Data()

        function Get_Line_Chart_21_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_21.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_21_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_21_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_21', [dataset['pressure_in'],dataset['pressure_out']], {
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
                    content: "섭취량 : %yL<br /> 시간 : %x"
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

        Get_Line_Chart_22_Data()

        function Get_Line_Chart_22_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_Line_Chart_22.data.php",
                dataType: 'json',
                success: function (data) {
                    _Line_Chart_22_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _Line_Chart_22_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#Line_Chart_22', [dataset['pressure_in'],dataset['pressure_out']], {
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



        Get_bar_chart_1_Data()

        function Get_bar_chart_1_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_bar_chart_1_.data.php",
                dataType: 'json',
                success: function (data) {
                    _bar_chart_1_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _bar_chart_1_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#bar_chart_1', [dataset['power']], {
                grid  : {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor  : '#f3f3f3'
                },
                series: {
                    bars: {
                        show: true, barWidth: 0.5, align: 'center',
                    },
                },
                colors: ['#3c8dbc'],
                xaxis : {
                    ticks: _data.pay_load.create_at,
                }
            })
        }

        Get_bar_chart_2_Data()

        function Get_bar_chart_2_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_bar_chart_2_.data.php",
                dataType: 'json',
                success: function (data) {
                    _bar_chart_2_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _bar_chart_2_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#bar_chart_2', [dataset['watertank']], {
                grid  : {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor  : '#f3f3f3'
                },
                series: {
                    bars: {
                        show: true, barWidth: 0.5, align: 'center',
                    },
                },
                colors: ['#3c8dbc'],
                xaxis : {
                    ticks: _data.pay_load.create_at,
                }
            })
        }

        Get_bar_chart_21_Data()

        function Get_bar_chart_21_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_bar_chart_21_.data.php",
                dataType: 'json',
                success: function (data) {
                    _bar_chart_21_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _bar_chart_21_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#bar_chart_21', [dataset['watertank']], {
                grid  : {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor  : '#f3f3f3'
                },
                series: {
                    bars: {
                        show: true, barWidth: 0.5, align: 'center',
                    },
                },
                colors: ['#3c8dbc'],
                xaxis : {
                    ticks: _data.pay_load.create_at,
                }
            })
        }

        Get_bar_chart_22_Data()

        function Get_bar_chart_22_Data() {
            $.ajaxSetup({ cache: false });
            $.ajax({
                url: "../conf/Ajax_bar_chart_22_.data.php",
                dataType: 'json',
                success: function (data) {
                    _bar_chart_22_update(data)
                },
                error: function () {
                    // setTimeout(GetData, updateInterval);
                }
            });
        }

        function _bar_chart_22_update(_data) {
            const dataset = _data.pay_load.dataset

            $.plot('#bar_chart_22', [dataset['watertank']], {
                grid  : {
                    borderWidth: 1,
                    borderColor: '#f3f3f3',
                    tickColor  : '#f3f3f3'
                },
                series: {
                    bars: {
                        show: true, barWidth: 0.5, align: 'center',
                    },
                },
                colors: ['#3c8dbc'],
                xaxis : {
                    ticks: _data.pay_load.create_at,
                }
            })
        }

    });
</script>
