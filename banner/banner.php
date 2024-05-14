<?php 
require '../dashboard_header.php'; 

$select_banner = "SELECT * FROM banners";
$select_banner_result = mysqli_query($db_connect, $select_banner);
$after_banner_assoc = mysqli_fetch_assoc($select_banner_result);
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
                                <h3>Update Banner</h3>
                            </div>
                            <div class="card-body">

                                <!-- text update -->
                                <?php if(isset($_SESSION['text_update'])){ ?>
                                <div class="alert alert-success"><?=$_SESSION['text_update']?></div>
                                <?php }unset($_SESSION['text_update']) ?>
                                 <!-- text update -->

                                <!-- photo update -->
                                <?php if(isset($_SESSION['photo_update'])){ ?>
                                <div class="alert alert-success"><?=$_SESSION['photo_update']?></div>
                                <?php }unset($_SESSION['photo_update']) ?>
                                 <!-- photo update -->

                                <form action="banner_post.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control" value="<?=$after_banner_assoc['sub_title']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Main Title</label>
                                    <input type="text" name="main_title" class="form-control" value="<?=$after_banner_assoc['main_title']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="5"><?=$after_banner_assoc['description']?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Action_Name</label>
                                    <input type="text" name="action_name" class="form-control" value="<?=$after_banner_assoc['action_name']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Action_link</label>
                                    <input type="text" name="action_link" class="form-control" value="<?=$after_banner_assoc['action_link']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Banner Image</label>
                                    <input type="file" name="banner_photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="mb-3">
                                    <img id="blah" width="200" src="../upload/banner/<?=$after_banner_assoc['banner_photo']?>" alt="">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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