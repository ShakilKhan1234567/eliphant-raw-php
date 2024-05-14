<?php
require '../dashboard_header.php'; 

$user_id = $_SESSION['id'];
$select_user = "SELECT * FROM users WHERE id = $user_id";
$select_user_result = mysqli_query($db_connect, $select_user );
$after_assoc_user = mysqli_fetch_assoc($select_user_result);
?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Profile Update</h3>
                            </div>
                            <!-- upadate message -->
                            <?php if(isset($_SESSION['update'])){ ?>
                            <div class="alert alert-success"><?=$_SESSION['update']?></div>
                            <?php }unset($_SESSION['update']) ?>
                            <!-- upadate message -->

                            <!-- wrong pass message -->
                            <?php if(isset($_SESSION['wrong_pass'])){ ?>
                            <div class="alert alert-success"><?=$_SESSION['wrong_pass']?></div>
                            <?php }unset($_SESSION['wrong_pass']) ?>
                            <!-- wrong pass message -->

                            <div class="card-body">
                          <form action="profile_update.php" method="POST">
                          <div class="mb-3">
                                <input type="hidden" class="form-control" name="user_id" value="<?=$user_id?>">
                                <input type="text" class="form-control" name="name" value="<?=$after_assoc_user['name']?>">
                                </div>
                              <div class="mb-3">
                              <input type="password" name="old_password" class="form-control" placeholder="Current Password">
                              </div>
                               <div class="mb-3">
                               <input type="password" name="password" class="form-control" placeholder="New Password">
                               </div>
                               <div class="mb-3">
                                <button class="btn btn-primary">Update Info</button>
                               </div>
                          </form>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Photo Update</h3>
                            </div>
                                 <!-- extension error message -->
                                 <?php if(isset($_SESSION['extension_err'])){ ?>
                                 <div class="alert alert-danger"><?=$_SESSION['extension_err']?></div>
                                 <?php }unset($_SESSION['extension_err']) ?>
                                <!-- extension error  message -->

                                 <!-- size error message -->
                                 <?php if(isset($_SESSION['size'])){ ?>
                                 <div class="alert alert-danger"><?=$_SESSION['size']?></div>
                                 <?php }unset($_SESSION['size']) ?>
                                <!-- size error  message -->

                            <div class="card-body">
                                   <!-- photo update message -->
                                   <?php if(isset($_SESSION['photo_update'])){ ?>
                                 <div class="alert alert-success"><?=$_SESSION['photo_update']?></div>
                                 <?php }unset($_SESSION['photo_update']) ?>
                                <!-- photo update  message -->

                                <form action="profile_photo.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="mb-3">
                                    <img width="200" id="blah" src="../upload/user/<?=$after_assoc_user['photo']?>" alt="">
                                </div>
                                <div class="mb-3">
                                <button class="btn btn-primary">Update Info</button>
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