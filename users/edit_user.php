<?php 
require '../dashboard_header.php';

$id = $_GET['id'];
$select = "SELECT * FROM users WHERE id=$id";
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
					<div class="col-lg-6 m-auto">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Update User Info</h3>
                            </div>
                            <div class="card-body">
                              <form action="update_user.php" method="post">
                                    <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="hidden" class="form-control" name="user_id" value="<?=$id?>">
                                    <input type="text" class="form-control" name="name" value="<?=$after_assoc['name']?>">
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="<?=$after_assoc['email']?>">
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                              </form>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

<?php 
require '../dashboard_footer.php';
 ?>