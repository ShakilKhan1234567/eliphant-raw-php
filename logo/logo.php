<?php 
require '../dashboard_header.php'; 

$select = "SELECT * FROM logos";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

$select_footer = "SELECT * FROM footer_logos";
$select_result_footer = mysqli_query($db_connect, $select_footer);
$after_assoc_footer = mysqli_fetch_assoc($select_result_footer);

$select_role = "SELECT * FROM users WHERE id=$user_id";
$all_users_role = mysqli_query( $db_connect, $select_role);
$after_assoc_role = mysqli_fetch_assoc($all_users_role);
?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                <?php if($after_assoc_role['role'] == 1 || $after_assoc_role['role'] == 2 || $after_assoc_role['role'] == 3){ ?>
					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Main Logo</h3>
                            </div>
                            <div class="card-body">
                                <!-- extension error -->
                                <?php if(isset($_SESSION['logo_err'])){ ?>
                                    <div class="alert alert-danger"><?= $_SESSION['logo_err']?></div>
                                <?php }unset($_SESSION['logo_err'])?>
                                <!-- extension error -->

                                <!-- size error -->
                                <?php if(isset( $_SESSION['logo_size_err'])){ ?>
                                    <div class="alert alert-danger"><?= $_SESSION['logo_size_err'] ?></div>
                                <?php }unset( $_SESSION['logo_size_err'])?>
                                <!-- size error -->

                                <!-- logo update -->
                                <?php if(isset( $_SESSION['logo_success'])){ ?>
                                    <div class="alert alert-success"><?= $_SESSION['logo_success'] ?></div>
                                <?php }unset( $_SESSION['logo_success'])?>
                                <!-- logo update -->

                                <form action="logo_post.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="main_logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="my-2">
                                <img id="blah" width="150" height="70" src="../upload/logo/<?=$after_assoc['logo']?>" alt="">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Footer Logo</h3>
                            </div>
                            <div class="card-body">
                                <!-- extension error -->
                                <?php if(isset($_SESSION['footerlogo_err'])){ ?>
                                    <div class="alert alert-danger"><?= $_SESSION['footerlogo_err']?></div>
                                <?php }unset($_SESSION['footerlogo_err'])?>
                                <!-- extension error -->

                                <!-- size error -->
                                <?php if(isset( $_SESSION['footerlogo_size_err'])){ ?>
                                    <div class="alert alert-danger"><?= $_SESSION['footerlogo_size_err'] ?></div>
                                <?php }unset( $_SESSION['footerlogo_size_err'])?>
                                <!-- size error -->

                                <!-- logo update -->
                                <?php if(isset( $_SESSION['footerlogo_success'])){ ?>
                                    <div class="alert alert-success"><?= $_SESSION['footerlogo_success'] ?></div>
                                <?php }unset( $_SESSION['footerlogo_success'])?>
                                <!-- logo update -->

                                <form action="footerlogo_post.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="footer_logo" onchange="document.getElementById('blahh').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="my-2">
                                <img id="blahh" width="150" height="70" src="../upload/logo/<?=$after_assoc_footer['logo']?>" alt="">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php }else{ ?>
                        <h3 class="text-red" style="margin:auto;">Tera Wakath Nehi Heh This Page Dekhne k liye</h3>
                    <?php } ?>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

<?php require '../dashboard_footer.php'; ?>