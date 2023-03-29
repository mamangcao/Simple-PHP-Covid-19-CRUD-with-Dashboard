<?php
$title = $head = $bread = 'User Manual';
include 'components/header.php';
include 'components/topbar.php';
include 'components/sidebar.php';
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="timeline">

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">COVID-19 HEALTH DECLARATION</a></h3>
                            <div class="timeline-body">
                                The COVID-19 Health Declaration is a web application that aims to record and monitor
                                the incoming individual’s COVID-19 record, such body temperature, exposure, and vaccination.
                                This will enable the client to actively monitor the health declaration being submitted and create
                                visual graphics reports. This application is a simple record entry and update of an individual’s
                                health record.
                                <br><br>
                                This user manual aims to aid the users on using the said web application with the following
                                actions: record entry, record modification, record deletion, and reading the application
                                dashboard.
                            </div>
                        </div>
                    </div>


                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">A. Dashboard</a>
                                <br> <br>
                                The Dashboard displays a summary of the application’s data in a graphical display wherein it
                                is easy for the user to read and monitor the figures being recorded. There are two (2) parts of the
                                dashboard: figure boxes, and the bar chart. The Figure Boxes shows the total of individual who
                                meet the following criteria: exposure or encountered, vaccinated, fever, age group, and
                                nationality. While the Bar Chart shows a summary of the data records wherein the user can see
                                the differences from based on their age group (adult and minor) and gender (male and female).
                                <br><br>
                                The left sidebar acts as the navigation pane for the application wherein it contains the
                                application’s navigation pages.
                            </h3>
                            <div class="timeline-body">
                                <img class="img-fluid img-thumbnail" src="user_manual/dashboard.png" alt="Dashboard">
                            </div>
                            <div class="timeline-footer">
                                <a href="index.php" class="btn btn-primary btn-sm">Go to dashboard</a>
                            </div>
                        </div>
                    </div>

                    <div class="time-label">
                        <span class="bg-info">RECORD ENTRY</span>
                    </div>

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">
                                <a>This section is the step-by-step procedure on adding an individual’s record into the application.</a><br><br>
                                <a class="text-primary">1. Click on the Covid-19 button located on the left sidebar.</a>
                            </h3>
                            <div class="timeline-body">
                                <img class="img-fluid img-thumbnail" src="user_manual/B-1.png" alt="Covid 19 tab">
                            </div>
                        </div>
                    </div>

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">
                                <a class="text-primary">2. Click on “Add Data” button</a>
                            </h3>
                            <div class="timeline-body">
                                <img class="img-fluid img-thumbnail" src="user_manual/b-2.png" alt="Add new record">
                            </div>
                        </div>
                    </div>

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">
                                <a class="text-primary">3. A modal-popup will appear. Enter the individual’s information and their COVID-19
                                    history (diagnosis, exposure, vaccination).</a>
                            </h3>
                            <div class="timeline-body">
                                <img class="img-fluid img-thumbnail" src="user_manual/crud_2.jpg" alt="Add Record Modal">
                                <img class="img-fluid img-thumbnail" src="user_manual/crud_3.jpg" alt="Add Record Modal">
                                <br> Do: Click Save Data
                            </div>
                        </div>
                    </div>

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">
                                <a class="text-primary">4. The data will be displayed on the Health Declaration table.
                                </a>
                            </h3>
                            <div class="timeline-body">
                                <img class="img-fluid img-thumbnail" src="user_manual/b-4.png" alt="Health Declaration Table">
                            </div>
                            <div class="timeline-footer">
                                <a href="covid_hd.php" class="btn btn-primary btn-sm">Insert Record</a>
                            </div>
                        </div>
                    </div>

                    <div class="time-label">
                        <span class="bg-info">RECORD MODIFICATION</span>
                    </div>

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">
                                <a>This section is the step-by-step procedure on updating an individual’s record into the application.</a><br><br>
                                <a class="text-primary">1. On the Covid-19 page, click on the “Edit” button on selected individual’s record</a>
                            </h3>
                            <div class="timeline-body">
                                <img class="img-fluid img-thumbnail" src="user_manual/c-1.png" alt="Edit Button">
                            </div>
                        </div>
                    </div>

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">
                                <a class="text-primary">2. Update an individual’s field </a>
                            </h3>
                            <div class="timeline-body">
                                <img class="img fluid img-thumbnai" style="width: 45%" src="user_manual/c-2.png" alt="Edit Record Modal">
                                <img class="img-fluid img-thumbnail" style="width: 50%" src="user_manual/c-3.png" alt="Edit Record Modal">
                                <br> Do: Click Update
                            </div>
                        </div>
                    </div>

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">
                                <a class="text-primary">4. The data will be displayed on the Health Declaration table.
                                </a>
                            </h3>
                            <div class="timeline-body">
                                <img class="img-fluid img-thumbnail" src="user_manual/c-5.png" alt="Health Declaration Table">
                            </div>
                        </div>
                    </div>

                    <div class="time-label">
                        <span class="bg-info">RECORD DELETION</span>
                    </div>

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">
                                <a>This section is the step-by-step procedure on deleting an individual’s record into the application.</a><br><br>
                                <a class="text-primary">1. On the Covid-19 page, click on the “Delete” button on selected individual’s record</a>
                            </h3>
                            <div class="timeline-body">
                                <img class="img-fluid img-thumbnail" src="user_manual/d-0.png" alt="Delete Button">
                            </div>
                        </div>
                    </div>

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">
                                <a class="text-primary">2. A modal-popup will appear, asking for the user’s confirmation on deleting the record. </a>
                            </h3>
                            <div class="timeline-body">
                                <img class="img fluid img-thumbnai" style="width: 45%" src="user_manual/d-1.png" alt="Delete Record Confirmation">
                                <br> Do: Click Delete
                            </div>
                        </div>
                    </div>

                    <div>
                        <i class="fas fa-hashtag bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">
                                <a class="text-primary">4. The data will be deleted and the Health Declaration table will be updated
                                </a>
                            </h3>
                            <div class="timeline-body">
                                <img class="img-fluid img-thumbnail" src="user_manual/d-2.png" alt="Health Declaration Table list">
                            </div>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<?php
include 'components/footer.php';
?>