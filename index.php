<?php
session_start();
$title = $head = $bread = 'Dashboard';
include('components/header.php');
include('components/topbar.php');
include('components/sidebar.php');
?>
<div class="content">
    <!-- CONNECT DB -->
    <?php include('connect.php'); ?>
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <?php
                    // COUNT INFO WITH ENCOUNTER
                    $encounter_query = "SELECT * From declaration where `encounter` = 'YES'";
                    $encounter_query_run = mysqli_query($conn, $encounter_query);

                    if ($encounter_total = mysqli_num_rows($encounter_query_run)) {
                        echo '<h3>' . $encounter_total . '</h3>';
                    } else {
                        echo '<h3>No Data</h3>';
                    }
                    ?>
                    <p>COVID-19 ENCOUNTER</p>
                </div>
                <div class="icon">
                    <i class="fas fa-retweet"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <?php
                    // COUNT INFO WITH VACCINATED
                    $vaccinated_query = "SELECT * From declaration where `vaccinated` = 'YES'";
                    $vaccinated_query_run = mysqli_query($conn, $vaccinated_query);

                    if ($vaccinated_total = mysqli_num_rows($vaccinated_query_run)) {
                        echo '<h3>'  . $vaccinated_total . '</h3>';
                    } else {
                        echo '<h3>No Data</h3>';
                    }
                    ?>
                    <p>VACCINATED</p>
                </div>
                <div class="icon">
                    <i class="fas fa-syringe"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <?php
                    // COUNT INFO WITH BODY TEMP GREATER THAN 37.2
                    $fever_query = "SELECT * From declaration where `body_temp` > '37.2'";
                    $fever_query_run = mysqli_query($conn, $fever_query);

                    if ($fever_total = mysqli_num_rows($fever_query_run)) {
                        echo '<h3>' . $fever_total . '</h3>';
                    } else {
                        echo '<h3>No Data</h3>';
                    }
                    ?>
                    <p>FEVER</p>
                </div>
                <div class="icon">
                    <i class="fas fa-temperature-high"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-maroon">
                <div class="inner">
                    <?php
                    // COUNT INFO WITH AGE GREATER THAN OR EQUAL TO 18
                    $adult_query = "SELECT * From declaration where `age` >= '18'";
                    $adult_query_run = mysqli_query($conn, $adult_query);

                    if ($adult_total = mysqli_num_rows($adult_query_run)) {
                        echo '<h3>' . $adult_total . '</h3>';
                    } else {
                        echo '<h3>No Data</h3>';
                    }
                    ?>
                    <p>ADULT</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-alt"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-pink">
                <div class="inner">
                    <?php
                    //COUNT INFO WITH AGE LESS THAN 18
                    $minor_query = "SELECT * From declaration where `age` < '18'";
                    $minor_query_run = mysqli_query($conn, $minor_query);

                    if ($minor_total = mysqli_num_rows($minor_query_run)) {
                        echo '<h3>' . $minor_total . '</h3>';
                    } else {
                        echo '<h3>No Data</h3>';
                    }
                    ?>
                    <p>MINOR</p>
                </div>
                <div class="icon">
                    <i class="fas fa-child"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-fuchsia">
                <div class="inner">
                    <?php
                    //COUNT INFO WITH NATIONALITY OTHER THAN FILIPINO
                    $foreinger_query = "SELECT * From declaration where `nationality` != 'Filipino'";
                    $foreinger_query_run = mysqli_query($conn, $foreinger_query);

                    if ($foreinger_total = mysqli_num_rows($foreinger_query_run)) {
                        echo '<h3>' . $foreinger_total . '</h3>';
                    } else {
                        echo '<h3>No Data</h3>';
                    }
                    ?>
                    <p>FORIEGNER</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- BAR CHART -->
    <div class="card card-gray-dark">
        <div class="card-header">
            <h3 class="card-title">Bar Chart</h3>

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
            <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<script>
    $(function() {


        // BAR CHART

        // Get context with jQuery - using jQuery's .get() method.
        var barChartCanvas = $('#barChart').get(0).getContext('2d')

        var barChartData = {
            <?php

            // SELECT VACCINATED ADULT
            $adultvax_query = "SELECT * From declaration where `age` >= '18' and `vaccinated` = 'YES'";
            $adultvax_query_run = mysqli_query($conn, $adultvax_query);
            $adultvax = mysqli_num_rows($adultvax_query_run);

            //SELECT VACCINATED MALE
            $malevax_query = "SELECT * From declaration where `gender` >= 'Male' and `vaccinated` = 'YES'";
            $malevax_query_run = mysqli_query($conn, $malevax_query);
            $malevax = mysqli_num_rows($malevax_query_run);

            //SELECT VACCINATED FEMALE
            $femalevax_query = "SELECT * From declaration where `gender` >= 'Female' and `vaccinated` = 'YES'";
            $femalevax_query_run = mysqli_query($conn, $femalevax_query);
            $femalevax = mysqli_num_rows($femalevax_query_run);

            // SELECT UNVACCINATED ADULT
            $adultnovax_query = "SELECT * From declaration where `age` >= '18' and `vaccinated` = 'NO'";
            $adultnovax_query_run = mysqli_query($conn, $adultnovax_query);
            $adultnovax = mysqli_num_rows($adultnovax_query_run);

            //SELECT UNVACCINATED MALE
            $malenovax_query = "SELECT * From declaration where `gender` >= 'Male' and `vaccinated` = 'NO'";
            $malenovax_query_run = mysqli_query($conn, $malenovax_query);
            $malenovax = mysqli_num_rows($malenovax_query_run);

            //SELECT UNVACCINATED FEMALE
            $femalenovax_query = "SELECT * From declaration where `gender` >= 'Female' and `vaccinated` = 'NO'";
            $femalenovax_query_run = mysqli_query($conn, $femalenovax_query);
            $femalenovax = mysqli_num_rows($femalenovax_query_run);

            // SELECT VACCINATED MINOR
            $minorvax_query = "SELECT * From declaration where `age` < '18' and `vaccinated` = 'YES'";
            $minorvax_query_run = mysqli_query($conn, $minorvax_query);
            $minorvax = mysqli_num_rows($minorvax_query_run);

            // SELECT UNVACCINATED MINOR
            $minornovax_query = "SELECT * From declaration where `age` < '18' and `vaccinated` = 'NO'";
            $minornovax_query_run = mysqli_query($conn, $minornovax_query);
            $minornovax = mysqli_num_rows($minornovax_query_run);

            // SELECT ADULT WITH FEVER
            $adultfever_query = "SELECT * From declaration where `age` >= '18' and `body_temp` > '37.2'";
            $adultfever_query_run = mysqli_query($conn, $adultfever_query);
            $adultfever = mysqli_num_rows($adultfever_query_run);

            // SELECT MALE WITH FEVER
            $malefever_query = "SELECT * From declaration where `gender` = 'Male' and `body_temp` > '37.2'";
            $malefever_query_run = mysqli_query($conn, $malefever_query);
            $malefever = mysqli_num_rows($malefever_query_run);

            // SELECT FEMALE WITH FEVER
            $femalefever_query = "SELECT * From declaration where `gender` = 'Female' and `body_temp` > '37.2'";
            $femalefever_query_run = mysqli_query($conn, $femalefever_query);
            $femalefever = mysqli_num_rows($femalefever_query_run);

            // SELECT MALE W/o FEVER
            $malenofever_query = "SELECT * From declaration where `gender` = 'Male' and `body_temp` <= '37.2'";
            $malenofever_query_run = mysqli_query($conn, $malenofever_query);
            $malenofever = mysqli_num_rows($malenofever_query_run);

            // SELECT FEMALE W/o FEVER
            $femalenofever_query = "SELECT * From declaration where `gender` = 'Female' and `body_temp` <= '37.2'";
            $femalenofever_query_run = mysqli_query($conn, $femalenofever_query);
            $femalenofever = mysqli_num_rows($femalenofever_query_run);

            // SELECT ADULT W/0 FEVER
            $adultnofever_query = "SELECT * From declaration where `age` >= '18' and `body_temp` <= '37.2'";
            $adultnofever_query_run = mysqli_query($conn, $adultnofever_query);
            $adultnofever = mysqli_num_rows($adultnofever_query_run);

            // SELECT MINOR WITH FEVER
            $minorfever_query = "SELECT * From declaration where `age` < '18' and `body_temp` > '37.2'";
            $minorfever_query_run = mysqli_query($conn, $minorfever_query);
            $minorfever = mysqli_num_rows($minorfever_query_run);

            // SELECT MINOR W/O FEVER
            $minornofever_query = "SELECT * From declaration where `age` < '18' and `body_temp` <= '37.2'";
            $minornofever_query_run = mysqli_query($conn, $minornofever_query);
            $minornofever = mysqli_num_rows($minornofever_query_run);


            ?>
            labels: ['Adult', 'Minor', 'Male', 'Female'],
            datasets: [{
                    label: 'Vaccinated',
                    backgroundColor: 'rgb(0,128,0)',
                    borderColor: 'rgb(0,128,0)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: '	rgb(0,128,0)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgb(0,128,0)',
                    data: [<?php echo $adultvax ?>, <?php echo $minorvax ?>, <?php echo $malevax ?>, <?php echo $femalevax ?>, 0]
                },
                {
                    label: 'Unvaccinated',
                    backgroundColor: 'rgb(255,0,0)',
                    borderColor: 'rgb(255,0,0)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgb(255,0,0)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgb(255,0,0)',
                    data: [<?php echo $adultnovax ?>, <?php echo $minornovax ?>, <?php echo $malenovax ?>, <?php echo $femalenovax ?>]
                },
                {
                    label: 'Fever',
                    backgroundColor: 'rgb(255,204,0)',
                    borderColor: 'rgb(255,204,0)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgb(255,204,0))',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgb(255,204,0)',
                    data: [<?php echo $adultfever ?>, <?php echo $minorfever ?>, <?php echo $malefever ?>, <?php echo $femalefever ?>]
                },
                {
                    label: 'No Fever',
                    backgroundColor: 'rgb(0,0,255)',
                    borderColor: 'rgb(0,0,255)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgb(0,0,255)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgb(0,0,255)',
                    data: [<?php echo $adultnofever ?>, <?php echo $minornofever ?>, <?php echo $malenofever ?>, <?php echo $femalenofever ?>]
                },
            ]
        }

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

    })
</script>

<?php
include('components/footer.php');
?>