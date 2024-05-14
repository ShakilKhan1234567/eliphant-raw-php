<?php 
require '../dashboard_header.php';

$select = "SELECT * FROM menus";
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
                                <h3>Menu List</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Menu Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($select_result as $sl=>$menu){?>            
                                    <tr>
                                        <td><?=$sl+1?></td>
                                        <td><?=$menu['menu_name']?></td>
                                        <td>
                                        <a href="menu_update.php?id=<?=$menu['id']?>" class="btn btn-<?=$menu['status'] == 0?'light':'success'?>"><?=$menu['status'] == 0?'OFF':'ON'?></a>
                                        </td>
                                        <td>
                                        <a href="menu_delete.php?id=<?=$menu['id']?>" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
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
                                <h3>Add Menu</h3>
                            </div>
                            <div class="card-body">
                                <form action="menu_post.php" method="POST">
                                    <div class="mb-3">
                                        <input type="text" name="menu_name" class="form-control" placeholder="Menu Name">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update Menu</button>
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