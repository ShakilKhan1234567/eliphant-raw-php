
<?php 
require '../dashboard_header.php'; 

$select = "SELECT * FROM services";
$select_result = mysqli_query($db_connect, $select);
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
                                <h3>Services List</h3>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Main Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($select_result as $sl=> $service){?>
                                    <tr>
                                        <td><?=$sl+1?></td>
                                        <td><?=$service['main_title']?></td>
                                        <td><?=$service['description']?></td>
                                        <td>
                                            <a href="service_status.php?id=<?=$service['id']?>" class="btn btn-<?=$service['status'] == 0?'light':'success'?>"><?=$service['status'] == 0?'OFF':'ON'?></a>
                                        </td>
                                        <td>
                                        <a href="service_delete.php?id=<?=$service['id']?>" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php }  ?>
                                </table>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Update Services</h3>
                            </div>
                            <div class="card-body">
                             
                                <form action="service_post.php" method="POST">
                                    <div class="mb-3">
                                    <input type="text" name="main_title" class="form-control" placeholder="Update Title">
                                    </div>
                                    <div class="mb-3">
                                    <input type="text" name="description" class="form-control" placeholder="Update Description">
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
<!-- SWEET alert for maximum expertise -->
<?php if(isset($_SESSION['max_service'])){ ?>
    <script>
      Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '<?=$_SESSION['max_service']?>',
})
    </script>
<?php }unset($_SESSION['max_service']) ?>

<!-- SWEET alert for minimum expertise -->
<?php if(isset($_SESSION['min_service'])){ ?>
    <script>
      Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '<?=$_SESSION['min_service']?>',
})
    </script>
<?php }unset($_SESSION['min_service']) ?>