
<?php 
require '../dashboard_header.php';

$select = "SELECT * FROM expertises";
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
                                <h3>Expertise List</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                    <th>SL</th>
                                    <th>Topic</th>
                                    <th>Percentage</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                    <?php foreach($select_result as $sl=> $expertise){ ?>
                                    <tr>
                                    <td><?=$sl+1?></td>
                                    <td><?=$expertise['topic']?></td>
                                    <td><?=$expertise['percentage']?></td>
                                    <td>
                                        <a href="expertise_status.php?id=<?=$expertise['id']?>" class="btn btn-<?=$expertise['status'] == 0?'light':'success'?>"><?=$expertise['status'] == 0?'OFF':'ON'?></a>
                                    </td>
                                    <td>
                                    <a href="expertise_delete.php?id=<?=$expertise['id']?>" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
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
                                <h3>Add New Expertise</h3>
                            </div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['success'])){ ?>
                                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                                <?php }unset($_SESSION['success']) ?>
                                <form action="expertise_post.php" method="post">
                                    <div class="mb-3">
                                    <input type="text" name="topic" class="form-control" placeholder="expertise list">
                                    </div>
                                    <div class="mb-3">
                                    <input type="text" name="percentage" class="form-control" placeholder="percentage">
                                    </div>
                                    <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Add Expertise</button>
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
<?php if(isset($_SESSION['max_expertise'])){ ?>
    <script>
      Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '<?=$_SESSION['max_expertise']?>',
})
    </script>
<?php }unset($_SESSION['max_expertise']) ?>

<!-- SWEET alert for minimum expertise -->
<?php if(isset($_SESSION['min_expertise'])){ ?>
    <script>
      Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '<?=$_SESSION['min_expertise']?>',
})
    </script>
<?php }unset($_SESSION['min_expertise']) ?>