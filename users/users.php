<?php 
require '../dashboard_header.php';

$select = "SELECT * FROM users WHERE id != $user_id";
$all_users = mysqli_query( $db_connect, $select);

$select_role = "SELECT * FROM users WHERE id=$user_id";
$all_users_role = mysqli_query( $db_connect, $select_role);
$after_assoc_role = mysqli_fetch_assoc($all_users_role);

?>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->

<style>
      .icon-head{
        position: relative;
      }
      .icon-head i{
        position: absolute;
        top: 32px;
        right: -1px;
        height: 55px;
        width: 50px;
        line-height: 55px;
        color: #fff;
        text-align: center;
        background-color: tomato;
        cursor: pointer;
      }
    </style>

    <!-- for success msg unset start -->
  <?php
        unset($_SESSION['old_name']);
        unset($_SESSION['old_email']);
        unset($_SESSION['old_password']);
        unset($_SESSION['old_con_pass']);
        unset($_SESSION['old_gender']);
 ?>
 <!-- for success msg unset end -->

<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <!-- who is logged in -->
                    
                    <?php if($after_assoc_role['role'] == 1 || $after_assoc_role['role'] == 2){ ?>
                     <div class="col-lg-8 <?=$after_assoc_role['role'] == 2?'m-auto':''?>">
                    <div class="card">
                      <div class="card-header">
                        <h3>All Users</h3>
                         </div>
                          <div class="card-body">
                            <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach($all_users as $key=>$user){ ?>
                                <tr>
                                <td><?=$key+1?></td>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><?=$user['gender']?></td>
                                <td>
                                    <?php
                                    if($user['role'] == 2){
                                        echo '<span class="badge badge-primary">Admin</span>';
                                    }
                                    elseif($user['role'] == 3){
                                        echo '<span class="badge badge-primary">Moderator</span>';
                                    }
                                    elseif($user['role'] == 4){
                                        echo '<span class="badge badge-primary">Editor</span>';
                                    }
                                    elseif($user['role'] == 5){
                                        echo '<span class="badge badge-primary">Viewer</span>';
                                    }
                                    elseif($user['role'] == 0){
                                        echo '<span class="badge badge-primary">Not Assign</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="edit_user.php?id=<?=$user['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        <a href="delete_user.php?id=<?=$user['id']?>" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if($after_assoc_role['role'] == 1){ ?>
            <div class="col-lg-4">
            <div class="card">
                    <div class="card-header">
                        <h3>Register Form</h3>
                    </div>
                    <!-- succes msg start -->
                    <?php if(isset($_SESSION['success'])){ ?>
                        <div class="alert alert-success mt-2"><?=$_SESSION['success']?></div>
                        <?php } unset($_SESSION['success']) ?>
                         <!-- succes msg end -->

                    <div class="card-body">
                    <form action="register_post.php" method="post">

                        <!-- name field start -->
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?=(isset($_SESSION['old_name'])?$_SESSION['old_name']:'')?>" style="border-color: <?=(isset($_SESSION['name_err'])? 'red':'')?>;">

                    <?php if(isset($_SESSION['name_err'])){ ?>
                        <div class="alert alert-danger mt-2"><?=$_SESSION['name_err']?></div>
                        <?php } unset($_SESSION['name_err']) ?>
                </div>
                 <!-- name field end -->

                  <!-- email field start -->
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="text" class="form-control" name="email" value="<?=(isset($_SESSION['old_email'])?$_SESSION['old_email']:'')?>" style="border-color: <?=(isset($_SESSION['email_err'])? 'red':'')?>;">

                    <?php if(isset($_SESSION['email_err'])){ ?>
                        <div class="alert alert-danger mt-2"><?=$_SESSION['email_err']?></div>
                        <?php } unset($_SESSION['email_err']) ?>
                </div>
                 <!-- email field end -->

                  <!-- password field start -->
                <div class="mb-3 icon-head">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="input" name="password" value="<?=(isset($_SESSION['old_password'])?$_SESSION['old_password']:'')?>" style="border-color: <?=(isset($_SESSION['password_err'])? 'red':'')?>;">

                    <?php if(isset($_SESSION['password_err'])){ ?>
                        <div class="alert alert-danger mt-2"><?=$_SESSION['password_err']?></div>
                        <?php } unset($_SESSION['password_err']) ?>

                        <i class="fa fa-eye" id="show_pass"></i>
                </div>
                <!-- password field end -->

                <!-- confirm password field start -->
                <div class="mb-3 icon-head">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="con_pass" value="<?=(isset($_SESSION['old_con_pass'])?$_SESSION['old_con_pass']:'')?>" id="input2" style="border-color: <?=(isset($_SESSION['con_pass_err'])? 'red':'')?>;">

                    <?php if(isset($_SESSION['con_pass-err'])){ ?>
                        <div class="alert alert-danger mt-2"><?=$_SESSION['con_pass_err']?></div>
                        <?php } unset($_SESSION['con_pass_err']) ?>

                        <i class="fa fa-eye" id="show_pass2"></i>
                </div>
                <!-- confirm password field end -->

                <!-- gender field start -->
                <h5 style="color:yellowgreen">Select Your Gender</h5>

                <?php
                $gender = '';
                if(isset($_SESSION['old_gender'] )){
                   $gender = $_SESSION['old_gender']; 
                }
                ?>
                <div class="form-check">
                   <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male" <?=($gender == 'male')?'checked':''?>>
                    <label class="form-check-label" for="flexRadioDefault1"> Male</label>
                </div>

                <div class="form-check my-3">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female" <?=($gender == 'female')?'checked':''?>>
                <label class="form-check-label" for="flexRadioDefault2">Female</label>
                </div>

                <?php if(isset($_SESSION['gender_err'])){ ?>
                        <div class="alert alert-danger mt-2"><?=$_SESSION['gender_err']?></div>
                        <?php } unset($_SESSION['gender_err']) ?>

                <!-- gender field end -->

                <button style="height: 40px; width: 100%;" type="submit" class="btn btn-primary">Submit</button>
                </form>
                    </div>
                </div>
            </div>
            <?php } ?> 
         </div>
     </div>
 </div>

 <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

     <!-- for show pass -->
    <script>
        $('#show_pass').click(function(){
            var input = document.getElementById('input');

            if(input.type == 'password'){
                input.type = 'text';
            }
            else{
                input.type = 'password';
            }
        })
        $('#show_pass2').click(function(){
        var input2 = document.getElementById('input2');

        if(input2.type == 'password'){
           input2.type = 'text';
        }
        else{
            input2.type = 'password';
        }
       })
    </script>


  </body>
</html>

<?php
unset($_SESSION['old_name']);
unset($_SESSION['old_email']);
unset($_SESSION['old_password']);
unset($_SESSION['old_con_pass']);
unset($_SESSION['old_gender']);
?>

<?php require '../dashboard_footer.php'; ?>