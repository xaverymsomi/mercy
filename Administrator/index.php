<?php $title = "User-dashboard" ?>

<?php include('includes/sidebar.php'); ?>

<?php

    //users
    $user = $dbconnect->prepare("SELECT * FROM user");
    $user->execute();
    $count_user = $user->rowCount();

    //driver
    $driver = $dbconnect->prepare("SELECT * FROM driver");
    $driver->execute();
    $user_count = $driver->rowCount();

    $latest_driver = $dbconnect->prepare("SELECT * FROM driver ORDER BY driverid DESC LIMIT 7");
    $latest_driver->execute();
    $driver_array = $latest_driver->fetchAll(PDO::FETCH_ASSOC);

    //vehicle
    $vehicle = $dbconnect->prepare("SELECT * FROM vehicle");
    $vehicle->execute();
    $vehicle_count = $vehicle->rowCount();

    $latest_vehicle = $dbconnect->prepare("SELECT * FROM vehicle ORDER BY veh_regdate DESC LIMIT 7");
    $latest_vehicle->execute();
    $vehicle_array = $latest_vehicle->fetchAll(PDO::FETCH_ASSOC);

    // exipanditure
    $exipanditure_type = $dbconnect->prepare("SELECT * FROM tbl_expenditure_type");
    $exipanditure_type->execute();
    $exipanditure_type_list = $exipanditure_type->fetchAll(PDO::FETCH_ASSOC);

    $sum_exipanditure = $dbconnect->prepare("SELECT sum(expenditure_amount) AS amount FROM tbl_expenditure");
    $sum_exipanditure->execute();
    $exipanditure_sum = $sum_exipanditure->fetch();

    $exipanditure = $dbconnect->prepare("SELECT * FROM tbl_expenditure");
    $exipanditure->execute();
    $exipanditure_list = $exipanditure->fetchAll(PDO::FETCH_ASSOC);

    $exipanditure_week = $dbconnect->prepare("SELECT sum(expenditure_amount) as amount FROM tbl_expenditure WHERE week(expenditure_date)=week(now())");
    $exipanditure_week->execute();
    $exipanditure_week_result = $exipanditure_week->fetch(PDO::FETCH_ASSOC);
?>

<div class="main_container">
    <?php include('includes/messages.php') ?>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                owned vehicle</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vehicle_count ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Earnings (Monthly) Card Example -->

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Expenditure per mounth</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php if( $exipanditure_sum['amount'] > 0): ?>
                                    Tsh.<span class="count"><?php echo $exipanditure_sum['amount'] ?></span>/=
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Driver
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <span class="count"><?php echo $user_count ?></span>
                                    </div>
                                </div>
                                <div class="col">
                                   <!--  <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax=""></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Registered User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <span class="count"><?php echo $count_user ?></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-7 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    New Vehicle
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Plate Number</th>
                                <th>Vehicle type</th>
                                <th>Vehicle Years</th>
                                <th>Registred Date</th>
                             </tr>
                        </thead>
                        <?php foreach($vehicle_array  as $vehicle_data): ?>
                            <tr>
                                <td><?php echo strtoupper($vehicle_data['plate_no']) ?></td>
                                <td><?php echo strtoupper($vehicle_data['veh_type']) ?></td>
                                <td>
                                    <?php
                                        $rd = date("Y", strtotime($vehicle_data['veh_regdate']));
                                        $cd = date('Y');
                                        $years = $cd - $rd;
                                        echo $years;
                                    ?>
                                </td>
                                <td><?php echo date("d-m-Y", strtotime($vehicle_data['veh_regdate'])) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-5">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <div class="d-flex justify-content-between">

                        <span>Week Expenditure <?php echo $exipanditure_week_result['amount'] ?></span>

                        <a data-toggle="modal" data-target="#expenditure-modal"><i class="fa fa-plus text-white"></i> </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Exipendiure Type</th>
                                <th>Amount</th>

                             </tr>
                        </thead>
                        <?php foreach($exipanditure_list  as $exipanditure_item): ?>
                            <?php
                                $exipanditure = $exipanditure_item['exp_id'];

                                $expenditure_type_log = $dbconnect->prepare("SELECT tbl_expenditure_type.* FROM tbl_expenditure_logs, tbl_expenditure,tbl_expenditure_type
                                    WHERE expenditure = :expenditure
                                    AND tbl_expenditure_logs.expenditure = tbl_expenditure.exp_id
                                    AND tbl_expenditure_logs.expenditure_type = tbl_expenditure_type.expenditure_type_id");

                                $expenditure_type_log->execute(["expenditure"=>$exipanditure]);

                                $expenditure_type_log_list = $expenditure_type_log->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <tr>
                                <td>
                                    <?php foreach($expenditure_type_log_list as $e_t_value): ?>
                                        <span class="badge bg-success text-white"><?php echo $e_t_value['expenditure_type_name'] ?></span>
                                    <?php endforeach ?>
                                </td>
                                <td><?php echo $exipanditure_item['expenditure_amount'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<?php include('modals/expenditure-modal.php'); ?>
<?php include('includes/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                });
            });
    })
</script>
