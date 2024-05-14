
<?php 
require '../dashboard_header.php'; 

$select = "SELECT * FROM testimonials";
$select_res = mysqli_query($db_connect, $select);

?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Testimonial List</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Description</th>
                                        <th>Name</th>
                                        <th>Name About</th>
                                        <th>Image</th>
                                        <th>Staus</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($select_res as $sl=>$testimonial){ ?>
                                        <tr>
                                            <td><?=$sl+1?></td>
                                            <td><?=$testimonial['description']?></td>
                                            <td><?=$testimonial['name']?></td>
                                            <td><?=$testimonial['name_about']?></td>
                                            <td>
                                                <img width="200" src="../upload/testimonial/<?=$testimonial['photo']?>" alt="">
                                           </td>
                                            <td>
                                                <a href="testimonial_status.php?id=<?=$testimonial['id']?>" class="btn btn-<?=$testimonial['status'] == 0?'light':'success'?>"><?=$testimonial['status'] == 0?'OFF':'ON'?></a>
                                            </td>
                                            <td>
                                            <a href="delete_post.php?id=<?=$testimonial['id']?>" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Add Testimonial</h3>
                            </div>
                            <div class="card-body">
                                <!-- success message -->
                                <?php if(isset($_SESSION['success'])){ ?>
                                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                                <?php }unset($_SESSION['success']) ?>
                                <!-- success message -->
                               <form action="testimonial_post.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" name="description" class="form-control">
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Name About</label>
                                <input type="text" name="name_about" class="form-control">
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="photo" class="form-control">
                                </div>
                                <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Testimonial</button>
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
<!-- success alert -->
<?php if(isset($_SESSION['delete'])){ ?>
    <script>
        Swal.fire(
        'Deleted!',
        '<?=$_SESSION['delete']?>',
        'success'
    )
    </script>
<?php }unset($_SESSION['delete']) ?>

<!-- maximum alert -->
<?php if(isset($_SESSION['mx_test'])){ ?>
    <script>
        Swal.fire(
        'Deleted!',
        '<?=$_SESSION['mx_test']?>',
        'success'
    )
    </script>
<?php }unset($_SESSION['mx_test']) ?>

<!-- minimum alert -->
<?php if(isset($_SESSION['min_test'])){ ?>
    <script>
        Swal.fire(
        'Deleted!',
        '<?=$_SESSION['min_test']?>',
        'success'
    )
    </script>
<?php }unset($_SESSION['min_test']) ?>