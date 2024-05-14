<?php 
require '../dashboard_header.php';

$select = "SELECT * FROM works";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);
?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3>Update Work Together</h3>
                            </div>
                            <div class="card-body">
                                <form action="work_together_post.php" method="POST">
                                    <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Add title" value="<?=$after_assoc['title']?>">
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label">Action Name</label>
                                    <input type="text" name="action_name" class="form-control" value="<?=$after_assoc['action_name']?>">
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label">Action Link</label>
                                    <input type="text" name="action_link" class="form-control" value="<?=$after_assoc['action_link']?>">
                                    </div>
                                    <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Info</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

<?php require '../dashboard_footer.php'; ?>
<!-- SWEET alert for update info -->
<?php if(isset($_SESSION['update_work'])){ ?>
    <script>
        Swal.fire({
        title: '<?=$_SESSION['update_work']?>',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
        })
    </script>
<?php }unset($_SESSION['update_work']) ?>
