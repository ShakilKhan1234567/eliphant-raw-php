
<?php 
require '../dashboard_header.php';

$select = "SELECT * FROM messages";
$select_result = mysqli_query($db_connect, $select);

 ?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-10 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3>All Message</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="example">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Acton</th>
                                    </tr>
                                    </thead>
                                  <tbody>
                                  <?php foreach($select_result as $sl=>$message){ ?>
                                         <tr class="bg-<?=$message['status'] == 0?'light':''?>">
                                            <td><?=$sl+1?></td>
                                            <td><?=$message['name']?></td>
                                            <td><?=$message['email']?></td>
                                            <td><?=$message['subject']?></td>
                                            <td><?=$message['message']?></td>
                                            <td>
                                                <a href="message_status.php?id=<?=$message['id']?>" class="btn btn-info">View</a>
                                            </td>
                                            <td>
                                            <a href="message_delete.php?id=<?=$message['id']?>" class="btn btn-danger ">Delete</i></a>
                                            </td>
                                         </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
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