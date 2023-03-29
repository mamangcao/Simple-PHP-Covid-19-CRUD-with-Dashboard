<?php
session_start();
$title = $head = $bread = 'Covid-19 Health Declaration';
include('components/header.php');
include('components/topbar.php');
include('components/sidebar.php');
?>

<div class="col-12">
    <div class="card">
        <?php
        if (isset($_SESSION['status'])) {
        ?>
            <div id="toast-container" class="toast-top-right" role="alert">
                <div class="toast toast-success" aria-live="polite">
                    <div class="toast-message"><?php echo $_SESSION['status']; ?></div>
                </div>
            </div>
        <?php
            unset($_SESSION['status']);
        }
        ?>
        <div class="card-header">
            <h3 class="card-title">*
                <span class="badge badge-success">SAFE</span>
                <span class="badge badge-warning">WARNING</span>
                <span class="badge badge-danger">DANGER</span>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adddata">
                <i class="fas fa-user-plus"></i> Add Data
                </button>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Mobile No.</th>
                        <th>Body Temp</th>
                        <th>Diagnosed</th>
                        <th>Encounter</th>
                        <th>Vaccinated</th>
                        <th>Nationality</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'connect.php';

                    //Pagination
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 7;
                    $offset = ($pageno-1) * $no_of_records_per_page;
                    $total_pages_sql = "SELECT COUNT(*) FROM declaration";
                    $result = mysqli_query($conn,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);
                    $sql = "SELECT * FROM declaration LIMIT $offset,$no_of_records_per_page";
                    $query_run = mysqli_query($conn,$sql);


                    // $query_run = mysqli_query($conn, "SELECT * FROM `declaration`");
                    while ($row = mysqli_fetch_array($query_run)) {
                    ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['mobile_no']; ?></td>
                            <td><?php echo $row['body_temp']; ?></td>
                            <?php
                            if ($row['diagnosed'] == "YES") {
                            ?>
                                <td><span class="badge badge-danger"><?php echo $row['diagnosed']; ?></span></td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['diagnosed'] == "NO") {
                            ?>
                                <td><span class="badge badge-success"><?php echo $row['diagnosed']; ?></span></td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['encounter'] == "YES") {
                            ?>
                                <td><span class="badge badge-warning"><?php echo $row['encounter']; ?></span></td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['encounter'] == "NO") {
                            ?>
                                <td><span class="badge badge-success"><?php echo $row['encounter']; ?></span></td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['vaccinated'] == "YES") {
                            ?>
                                <td><span class="badge badge-success"><?php echo $row['vaccinated']; ?></span></td>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['vaccinated'] == "NO") {
                            ?>
                                <td><span class="badge badge-danger"><?php echo $row['vaccinated']; ?></span></td>
                            <?php
                            }
                            ?>
                            <td><?php echo $row['nationality']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editdata<?php echo $row['id'] ?>">
                                    <i class="fas fa-edit"></i> Edit</button>&nbsp;
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletedata<?php echo $row['id'] ?>">
                                    <i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php
                        include 'modals/update_modal.php';
                        include 'modals/delete_modal.php';
                    }
                    // mysqli_close($conn);
                    ?>
                </tbody>

            </table>
        </div>

    </div>

</div>


<!-- Add Data Modal -->
<div class="modal fade" id="adddata" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Covid-19 Declaration Health </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="query/create.php" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Full name" maxlength="50" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Gender</label>
                            <select class="form-control" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" class="form-control" name="age" placeholder="Enter Age" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Body Temp</label>
                                <input type="text" class="form-control" name="body_temp" placeholder="Enter Body Temp" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Covid-19 Diagnosed</label>
                                <select class="form-control" name="diagnosed" required>
                                    <option value="">Select Y/N</option>
                                    <option value="YES">Yes</option>
                                    <option value="NO">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Covid-19 Encounter</label>
                                <select class="form-control" name="encounter" required>
                                    <option value="">Select Y/N</option>
                                    <option value="YES">Yes</option>
                                    <option value="NO">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Vaccinated</label>
                                <select class="form-control" name="vaccinated" required>
                                    <option value="">Select Y/N</option>
                                    <option value="YES">Yes</option>
                                    <option value="NO">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" name="mobile_no" placeholder="Mobile Number" minlength="11" maxlength="11" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nationality</label>
                                <input type="text" class="form-control" name="nationality" placeholder="nationality" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="insertdata" class="btn btn-success"><i class="fas fa-save"></i> Save Data</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    setTimeout(function() {

        // Closing the alert
        $('#toast-container').fadeOut('slow');
    }, 2000);
</script>


<!-- Pagination -->
<div class="row justify-content-between container-fluid">
        <p class="text-gray">&nbsp; &nbsp; Showing <?php echo $no_of_records_per_page ?> of <?php echo $total_rows ?> entries</p>
<nav>
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
        <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <?php
             for ($i=1; $i<=$total_pages; $i++) {    
                if($pageno == $i){
                    echo "<li class='page-item active'><span class='page-link'>".$i."<span class='sr-only'>(current)</span></span></li>";
                } else { 
                  echo "<li class='page-item'><a class ='page-link' href='?pageno=".$i."'>".$i."</a></li>";
                }
            };     
        ?>
        <li class="page-item  <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</nav>
</div>


<?php
include('components/footer.php');
?>