<?php
include("includes/connection.php");
$_SESSION['current_page'] = "list-of-detinations";
include("includes/header.php");
include("includes/side-menu.php");
?>
     <!-- Page -->
    <div class="page">

      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      
        </ol>
        <h1 class="page-title active">Profile</h1>
        
      </div>

      <div class="page-content">
        <!-- Panel Table Tools -->
        <div class="panel">
          <header class="panel-heading">
            <h3 class="panel-title"></h3>
          </header>
          <div class="panel-body">
            
          <div class="row">
           

          </div> 

          <?php
          $accountType = "";
          if ($_SESSION['accountType'] == 'admin') {
            $qry = mysqli_query($connection, "select * from admin_view where accountId = '" . $_SESSION['accountId'] . "'");
            $accountType = 'Administrator';
          }
          elseif ($_SESSION['accountType'] == 'employee') {
          {
            $qry = mysqli_query($connection, "select * from employee_view where accountId = '" . $_SESSION['accountId'] . "'");
            $accountType = 'Employee';
          }
          $res = mysqli_fetch_assoc($qry);
          }
          
          ?>
                <div class="row">
                      <div class="col-md-12">
                        <h4>Account type: <?php echo $accountType; ?></h4>
                      </div>
                    </div> 

                  <div class="row pt-20">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="firstName">First Name</label>
                          <input type="text" class="form-control" id="firstName" name="firstName"  value="<?php echo $res['firstName'] ?>" readonly="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="middleName">Middle Name</label>
                          <input type="text" class="form-control" id="middleName" name="middleName"  value="<?php echo $res['middleName'] ?>" readonly="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="lastName">Last Name</label>
                          <input type="text" class="form-control" id="lastName" name="lastName"  value="<?php echo $res['lastName'] ?>" readonly="" />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="buildingNumber">Building Number</label>
                          <input type="text" class="form-control" id="buildingNumber" name="buildingNumber"  value="<?php echo $res['buildingNumber'] ?>" readonly="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="street">Street</label>
                          <input type="text" class="form-control" id="street" name="street"  value="<?php echo $res['street'] ?>" readonly="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="barangay">Barangay</label>
                          <input type="text" class="form-control" id="barangay" name="barangay"  value="<?php echo $res['barangay'] ?>" readonly="" />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="city">City</label>
                          <input type="text" class="form-control" id="city" name="city"  value="<?php echo $res['city'] ?>" readonly="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="province">Province</label>
                          <input type="text" class="form-control" id="province" name="province"  value="<?php echo $res['province'] ?>" readonly="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="contactNumber">Contact Number</label>
                          <input type="text" class="form-control" id="contactNumber" name="contactNumber"  value="<?php echo $res['contactNumber'] ?>" readonly="" />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="userName">Username</label>
                          <input type="text" class="form-control" id="userName" name="userName"  value="<?php echo $res['userName'] ?>" readonly="" />
                          </div>
                        </div>
                        
                      </div>

                      <div class="row">
                        <div class="col-md-12"> 
                          <div class="float-right">
                            <button class="btn btn-success" data-target="#updateProfileModal" data-toggle="modal" type="button">Update Profile</button>
                            <button class="btn btn-success" data-target="#updatePasswordModal" data-toggle="modal" type="button">Update Password</button>
                          </div>
                        </div>
                      </div>    


                    </div>


                    <div class="col-md-6"></div>
                  </div>


          </div>

        </div>
        <!-- End Panel Table Tools -->
      </div>
    </div>
    <!-- End Page -->


    <!-- Modal -->
    <div class="modal fade modal-fill-in" id="updateProfileModal" aria-hidden="false" aria-labelledby="addModal0"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h3 class="modal-title" id="exampleFillInModalTitle">Update Profile</h3>
          </div>
          <div class="modal-body">
           
            <form method="POST" action="controller.php">
                  <div class="row">
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="firstName">First Name</label>
                          <input type="text" class="form-control" id="firstName" name="firstName"  value="<?php echo $res['firstName'] ?>" required="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="middleName">Middle Name</label>
                          <input type="text" class="form-control" id="middleName" name="middleName"  value="<?php echo $res['middleName'] ?>" required="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="lastName">Last Name</label>
                          <input type="text" class="form-control" id="lastName" name="lastName"  value="<?php echo $res['lastName'] ?>" required="" />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="buildingNumber">Building Number</label>
                          <input type="text" class="form-control" id="buildingNumber" name="buildingNumber"  value="<?php echo $res['buildingNumber'] ?>" required="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="street">Street</label>
                          <input type="text" class="form-control" id="street" name="street"  value="<?php echo $res['street'] ?>" required="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="barangay">Barangay</label>
                          <input type="text" class="form-control" id="barangay" name="barangay"  value="<?php echo $res['barangay'] ?>" required="" />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="city">City</label>
                          <input type="text" class="form-control" id="city" name="city"  value="<?php echo $res['city'] ?>" required="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="province">Province</label>
                          <input type="text" class="form-control" id="province" name="province"  value="<?php echo $res['province'] ?>" required="" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="contactNumber">Contact Number</label>
                          <input type="text" class="form-control" id="contactNumber" name="contactNumber"  value="<?php echo $res['contactNumber'] ?>" required="" />
                          </div>
                        </div>
                      </div>

           

                  </div>
                  <input type="text" name="from" value="update-profile" hidden="">
                  <input type="text" name="profileId" value="<?php echo $res['profileId']; ?>" hidden="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade modal-fill-in" id="updatePasswordModal" aria-hidden="false" aria-labelledby="addModal0"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h3 class="modal-title" id="exampleFillInModalTitle">Update Password</h3>
          </div>
          <div class="modal-body">
           
            <form method="POST" action="controller.php">
                
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="oldPassword">Old Password</label>
                          <input type="password" class="form-control" id="oldPassword" name="oldPassword" required="" />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="newPassword">New Password</label>
                          <input type="password" class="form-control" id="newPassword" name="newPassword" required="" />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group form-material" data-plugin="formMaterial">
                          <label class="form-control-label" for="confirmNewPassword">Confirm New Password</label>
                          <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required="" />
                          </div>
                        </div>
                      </div>

                      

                  <input type="text" name="from" value="update-password-profile" hidden="">
                  <input type="text" name="accountId" value="<?php echo $res['accountId']; ?>" hidden="">
                  <input type="text" name="passWord" value="<?php echo $res['passWord']; ?>" hidden="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- End Modal -->

 
<?php 
include("includes/footer.php");
?>