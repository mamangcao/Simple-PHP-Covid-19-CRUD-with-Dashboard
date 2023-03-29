<!-- DELETE MODAL -->
<div class="modal fade" id="deletedata<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure you want to delete <br> <?php echo $row['name']; ?>'s record?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="query/delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <button type="submit" name="delete" class="btn btn-light"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>