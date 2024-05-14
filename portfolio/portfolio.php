
<?php 
require '../dashboard_header.php'; 

$select = "SELECT * FROM portfolios";
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
                                <h3>Portfolio List</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                  <?php foreach($select_result as $sl=>$portfolio){?>
                                  <tr>
                                        <td><?=$sl+1?></td>
                                        <td><?=$portfolio['title']?></td>
                                        <td><?=$portfolio['sub_title']?></td>
                                        <td>
                                            <img width="200" src="../upload/portfolio/<?=$portfolio['photo']?>" alt="">
                                        </td>
                                        <td>
                                        <a href="portfolio_status.php?id=<?=$portfolio['id']?>" class="btn btn-<?=$portfolio['status'] == 0?'light':'success'?>"><?=$portfolio['status'] == 0?'OFF':'ON'?></a>
                                        </td>
                                        <td>
                                        <button data-link="portfolio_delete.php?id=<?=$portfolio['id']?>" class="btn btn-danger del-btn"><i class="fa fa-trash"></i></button>
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
                                <h3>Add New Portfolio</h3>
                            </div>
                            <div class="card-body">
                                <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label">Photo</label>
                                    <input type="file" name="photo" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Add Portfolio</button>
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
<?php if(isset($_SESSION['success'])){ ?>
    <script>
        Swal.fire({
        title: '<?=$_SESSION['success']?>',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
        })
    </script>
<?php }unset($_SESSION['success']) ?>

<!-- SWEET alert for min port -->
<?php if(isset($_SESSION['min_port'])){ ?>
    <script>
        Swal.fire({
        title: '<?=$_SESSION['min_port']?>',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
        })
    </script>
<?php }unset($_SESSION['min_port']) ?>

<!-- ARE YOU SURE DELETE ALERT -->
<script>
    $('.del-btn').click(function(){
        var link = $(this).attr('data-link');
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
        window.location.href = link;
    }
    })
    })
</script>

<?php if(isset($_SESSION['delete'])){ ?>
    <script>
        Swal.fire(
        'Deleted!',
        '<?=$_SESSION['delete']?>',
        'success'
    )
    </script>
<?php }unset($_SESSION['delete']) ?>
