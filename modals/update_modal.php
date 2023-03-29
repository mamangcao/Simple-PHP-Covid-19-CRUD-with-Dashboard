<div class="modal fade" id="editdata<?php echo $row['id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="query/update.php">
                <div class="modal-header">
                    <h5 class="modal-title">Covid-19 Declaration Health </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Gender</label>
                            <?php
                            if ($row['gender'] == "Male") {
                            ?>
                                <select class="form-control" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['gender'] == "Female") {
                            ?>
                                <select class="form-control" name="gender" required>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" class="form-control" name="age" value="<?php echo $row['age'] ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Body Temp</label>
                                <input type="text" class="form-control" name="body_temp" value="<?php echo $row['body_temp'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Covid-19 Diagnosed</label>
                                <?php
                                if ($row['diagnosed'] == "YES") {
                                ?>
                                    <select class="form-control" name="diagnosed" required>
                                        <option value="YES">Yes</option>
                                        <option value="NO">No</option>
                                    </select>
                                <?php
                                }
                                ?>
                                <?php
                                if ($row['diagnosed'] == "NO") {
                                ?>
                                    <select class="form-control" name="diagnosed" required>
                                        <option value="NO">No</option>
                                        <option value="YES">Yes</option>
                                    </select>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Covid-19 Encounter</label>
                                <?php
                                if ($row['encounter'] == "YES") {
                                ?>
                                    <select class="form-control" name="encounter" required>
                                        <option value="YES">Yes</option>
                                        <option value="NO">No</option>
                                    </select>
                                <?php
                                }
                                ?>
                                <?php
                                if ($row['encounter'] == "NO") {
                                ?>
                                    <select class="form-control" name="encounter" required>
                                        <option value="NO">No</option>
                                        <option value="YES">Yes</option>
                                    </select>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Vaccinated</label>
                                <?php
                                if ($row['vaccinated'] == "YES") {
                                ?>
                                    <select class="form-control" name="vaccinated" required>
                                        <option value="YES">Yes</option>
                                        <option value="NO">No</option>
                                    </select>
                                <?php
                                }
                                ?>
                                <?php
                                if ($row['vaccinated'] == "NO") {
                                ?>
                                    <select class="form-control" name="vaccinated" required>
                                        <option value="NO">No</option>
                                        <option value="YES">Yes</option>
                                    </select>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" name="mobile_no" value="<?php echo $row['mobile_no'] ?>" minlength="11" maxlength="11" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nationality</label>
                                <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality'] ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal"> Cancel</button>
                    <button type="submit" name="update" class="btn btn-warning"><i class="fas fa-edit"></i> Update</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>