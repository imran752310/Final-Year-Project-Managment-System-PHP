<?php
ob_start();
include('include/header.php');
include('include/navbar.php');
 $dept = $_SESSION['department'];
 $f_id =  $_SESSION['id'];
?>
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!--================ Insertipion Code============= -->


<?php
if (isset($_POST['group_btn'])) {
    $f_id =  $_SESSION['id'];
    $group_no = $_POST['group_no'];
    $project_title = $_POST['project_title'];
    $std_1 = $_POST['std_a'];
    $std_2 = $_POST['std_b'];
    $std_3 = $_POST['std_c'];
   

    $query = "INSERT into group_enrollment_tbl(faculty_id,group_no,project_title,std_a,std_b,std_c)
    VALUES('$f_id','$group_no','$project_title','$std_1','$std_2','$std_3')";
    $run = mysqli_query($conn, $query);
    if ($run) {
?>
     <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Hi!</strong> Panel add Successfully
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <?php
                 header("Refresh:1; url=group.php");
            }
        }
        ?>

     <!--================ Insertipion Code============= -->

     <!--================ Delete Code============= -->

     <?php
       if (isset($_GET['del_id'])) {
        $del_id = $_GET['del_id'];
    
        $del_query = "DELETE from group_enrollment_tbl where group_enrollment_id='$del_id'";
        $execute = mysqli_query($conn, $del_query);
        if ($execute) {
    ?>
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Hi!</strong> Room Delete Successfully
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <?php
                 header("Refresh:1; url=group.php");
            }
        }
        ?>

     <!--================ Delete Code============= -->

     <!--================ Edit Code ================== -->

<?php
if (isset($_POST['update'])) :
    $up_group_no = $_POST['up_group_no'];
    $up_project_title = $_POST['up_project_title'];
    $up_std_a = $_POST['up_std_a'];
    $up_std_b = $_POST['up_std_b'];
    $up_std_c = $_POST['up_std_c'];
    $id = $_POST['id'];

    $update_query = "UPDATE group_enrollment_tbl SET group_no='$up_group_no',project_title='$up_project_title',std_a='$up_std_a',std_b='$up_std_b',std_c='$up_std_c'
     WHERE group_enrollment_id='$id'";
    $run = mysqli_query($conn, $update_query); ?>
<div class="container">
    <?php if ($run) : ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Wow!</strong> Panel updated Successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
    header("Refresh:2; url=group.php");
     else : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Failed to update department, Try again!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<!--================ Edit Code end============= -->

     <div class="row">
        <div class="col-xl-12">
        <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold" style="color: rgb(127, 29 ,29)">Create Group</h6>
                     <div class="card-body">
                        <div class="row">
                         <div class="col-xl-6">
                             <form method="post" action="group.php">
                             
                             <label for="name" class="">Group No :</label>
                            <input type="text" name="group_no" placeholder="Group Number" class="form-control mb-2" />
                            <label for="name" class="">Project Title  :</label>
                            <input type="text" name="project_title" placeholder="Project Title" class="form-control mb-2" />
                            <label for="name" class="">Student 1 :</label>
                            <select name="std_a" id="" required class="form-control mb-2" >
                                <option value="select_department">Select student</option>
                                <?php
                                    $std_select_query = "SELECT * FROM student_tbl where faculty_id='$f_id'";
                                    $std_res = mysqli_query($conn, $std_select_query);
                                    while ($std_d = mysqli_fetch_array($std_res)) : ?>
                                <option value="<?php echo $std_d['std_id'] ?>"><?php echo $std_d['name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                                    </div>
                                    <div class="col-xl-6">
                            <label for="name" class="">Student 2 :</label>
                            <select name="std_b" id="" required class="form-control mb-2" >
                                <option value="select_department">Select student</option>
                                <?php
                                    $std_select_query = "SELECT * FROM student_tbl where faculty_id='$f_id'";
                                    $std_res = mysqli_query($conn, $std_select_query);
                                    while ($std_d = mysqli_fetch_array($std_res)) : ?>
                                <option value="<?php echo $std_d['std_id'] ?>"><?php echo $std_d['name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                            <label for="name" class="">Student 3 :</label>
                            <select name="std_c" id="" required class="form-control mb-2" >
                                <option value="select_department">Select student</option>
                                <?php
                                    $std_select_query = "SELECT * FROM student_tbl where faculty_id='$f_id'";
                                    $std_res = mysqli_query($conn, $std_select_query);
                                    while ($std_d = mysqli_fetch_array($std_res)) : ?>
                                <option value="<?php echo $std_d['std_id'] ?>"><?php echo $std_d['name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                            
                            <input type="hidden" name="dept" value="<?php echo $_SESSION['department']; ?>" class="p-2" />
                            
                                 <button class="btn btn mt-4"style="color:white;background: rgb(127, 29 ,29)" name="group_btn">
                                     Submit
                                 </button>
                             </form>
                             </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
        </div>
         <div class="col-xl-12">
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold" style="color: rgb(127, 29 ,29)">All Groups</h6>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table " id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                         <th>S no</th>
                                         <th>Group No</th>
                                         <th>Project Title</th>
                                         <th>Student 1 SAP</th>
                                         <th>Student 2 SAP</th>
                                         <th>Student 2 SAP</th>
                                         <th>Status</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <!---============Selection code ===========--->
                                                                <?php
                                $sno = 1;
                                $query = "SELECT * from group_enrollment_tbl where faculty_id='$f_id'";
                                $run = mysqli_query($conn, $query);
                                while ($group_data = mysqli_fetch_array($run)) {
                                ?>
                                     <tr>
                                         <td><?php echo $sno++; ?></td>
                                         <td><?php echo $group_data['2'] ?></td>
                                         <td> <?php echo $group_data['3'] ?></td>
                                         <td><?php $stda= $group_data['4'];
                                         $a = mysqli_query($conn,"SELECT * FROM student_tbl where std_id='$stda'");
                                         $d=mysqli_fetch_array($a);
                                         ?><?php  echo  $d['name']?> | <?php echo  $d['sap_id']; ?></td>
                                         <td> <?php $stdb = $group_data['5'];
                                         $ok = mysqli_query($conn,"SELECT * FROM student_tbl where std_id='$stdb'");
                                         $d=mysqli_fetch_array($ok);
                                         ?><?php  echo  $d['name']?> | <?php echo  $d['sap_id']; ?></td>
                                         <td><?php  $stdc = $group_data['6'];
                                         $ok = mysqli_query($conn,"SELECT * FROM student_tbl where std_id='$stdc'");
                                         $d=mysqli_fetch_array($ok);
                                        ?><?php  echo  $d['name']?> | <?php echo  $d['sap_id'];
                                          ?></td>
                                         <td> <?php $status = $group_data['7'];
                                         if($status==0){
                                            echo "Pending";
                                         }
                                         if($status==1){
                                            echo "Accept";
                                         }
                                         if($status==2){
                                            echo "Reject";
                                         }
                                         ?></td>
                                         <td><button class="btn btn-success btn-circle" data-toggle="modal" type="button" 
					                       data-target="#update_modal<?php echo $group_data['0']?>">
                                           <span class="glyphicon glyphicon-edit"></span> <i class='fa fa-edit'></i></button>
                                             <a href="group.php?del_id=<?php echo $group_data['0']  ?>" class="btn btn-danger btn-circle "><i
                                                     class="fa fa-trash"></i></a>
                                         </td>
                                     </tr>

                                    <!--==== Modal Start ====-->

                                <div class="modal fade" id="update_modal<?php echo $group_data['0']?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="group.php">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" style="color: rgb(127, 29 ,29)"><b>Update  Group</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name='id' value='<?php echo $group_data['0'] ?>'>
                                                    <label for="name" class="">Group No :</label>
                                                    <input type="text" name="up_group_no" value='<?php echo $group_data['2'] ?>' placeholder="Group Number" class="form-control mb-2" />
                                                    <label for="name" class="">Project Title  :</label>
                                                    <input type="text" name="up_project_title" value='<?php echo $group_data['3'] ?>' placeholder="Project Title" class="form-control mb-2" />
                                                    <label for="name" class="">Student 1 :</label>
                                                    <select name="up_std_a" id="" required class="form-control mb-2" >
                                                        <option value="<?php echo $group_data['4'] ?>">
                                                        <?php $stda = $group_data['4'];
                                                          $a = mysqli_query($conn,"SELECT * FROM student_tbl where std_id='$stda'");
                                                          $b=mysqli_fetch_array($a);
                                                          ?><?php  echo  $b['name']?></option>
                                                        <?php
                                                            $std_select_query = "SELECT * FROM student_tbl where faculty_id='$f_id'";
                                                            $std_res = mysqli_query($conn, $std_select_query);
                                                            while ($std_d = mysqli_fetch_array($std_res)) : ?>
                                                        <option value="<?php echo $std_d['std_id'] ?>"><?php echo $std_d['name'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                    <label for="name" class="">Student 2 :</label>
                                                    <select name="up_std_b" id="" required class="form-control mb-2" >
                                                    <option value="<?php echo $group_data['5'] ?>">
                                                    <?php $stdb = $group_data['5'];
                                                     $c = mysqli_query($conn,"SELECT * FROM student_tbl where std_id='$stdb'");
                                                     $d=mysqli_fetch_array($c);
                                                     ?><?php  echo  $d['name']?></option>
                                                        <?php
                                                            $std_select_query = "SELECT * FROM student_tbl where faculty_id='$f_id'";
                                                            $std_res = mysqli_query($conn, $std_select_query);
                                                            while ($std_d = mysqli_fetch_array($std_res)) : ?>
                                                        <option value="<?php echo $std_d['std_id'] ?>"><?php echo $std_d['name'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                    <label for="name" class="">Student 3 :</label>
                                                    <select name="up_std_c" id="" required class="form-control mb-2" >
                                                    <option value="<?php echo $group_data['6'] ?>"><?php $stdc = $group_data['6'];
                                                      $e = mysqli_query($conn,"SELECT * FROM student_tbl where std_id='$stdc'");
                                                      $f=mysqli_fetch_array($e);
                                                      ?><?php  echo  $f['name']?></option>
                                                        <?php
                                                            $std_select_query = "SELECT * FROM student_tbl where faculty_id='$f_id'";
                                                            $std_res = mysqli_query($conn, $std_select_query);
                                                            while ($std_d = mysqli_fetch_array($std_res)) : ?>
                                                        <option value="<?php echo $std_d['std_id'] ?>"><?php echo $std_d['name'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                                <div class="modal-footer">
                                                    <button name="update" style="color:white;background: rgb(127, 29 ,29)" class="btn"><span class="glyphicon glyphicon-edit"></span> Update</button>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- model end -->
                 
                                     <?php
                                         }
                                        ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php
include('include/scripts.php');
include('include/footer.php');
?>