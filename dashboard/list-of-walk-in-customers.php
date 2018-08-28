<?php
include("includes/connection.php");
$_SESSION['current_page'] = "list-of-walk-in-customers";
include("includes/header.php");
include("includes/side-menu.php");
?>
     <!-- Page -->
    <div class="page">

      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item active">Customers</li>
        </ol>
        <h1 class="page-title">Walk-in Customers</h1>
        
      </div>

      <div class="page-content">
        <!-- Panel Table Tools -->
        <div class="panel">
          <header class="panel-heading">
            <h3 class="panel-title"></h3>
          </header>
          <div class="panel-body">
            
          <div class="row pb-20">
            <div class="col-md-12"> 
              <button class="btn btn-success" data-target="#addModal" data-toggle="modal" type="button">Add</button>
            </div>

          </div>


        
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">

              <thead>
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Contact Number</th>
                  <th>Building Number</th>
                  <th>Street</th>
                  <th>Barangay</th>
                  <th>City</th>
                  <th>Province</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $qry = mysqli_query($connection, "select * from customer_view where customerTypeId = 1");
                while ($res = mysqli_fetch_assoc($qry)) { ?>
                <tr>
                  <td><?php echo $res['customerId']; ?></td>
                  <td><?php echo $res['firstName']; ?></td>
                  <td><?php echo $res['middleName']; ?></td>
                  <td><?php echo $res['lastName']; ?></td>
                  <td><?php echo $res['contactNumber']; ?></td>
                  <td><?php echo $res['buildingNumber']; ?></td>
                  <td><?php echo $res['street']; ?></td>
                  <td><?php echo $res['barangay']; ?></td>
                  <td><?php echo $res['city']; ?></td>
                  <td><?php echo $res['province']; ?></td>
                  <td><button type="button" class="btn btn-floating btn-warning btn-sm waves-effect waves-classic"><i class="icon md-edit" aria-hidden="true" data-target="#updateModal<?php echo $res['customerId'] ?>" data-toggle="modal"></i></button> <button type="button" class="btn btn-floating btn-danger btn-sm waves-effect waves-classic"><i class="icon md-delete" aria-hidden="true" data-target="#deleteModal<?php echo $res['customerId'] ?>" data-toggle="modal"></i></button> </td>
                </tr>
                <?php } ?>
              </tbody>

            </table>
          

          </div>

        </div>
        <!-- End Panel Table Tools -->
      </div>
    </div>
    <!-- End Page -->


    <!-- Modal -->
    <div class="modal fade modal-fill-in" id="addModal" aria-hidden="false" aria-labelledby="addModal0"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h3 class="modal-title" id="exampleFillInModalTitle">Add walk-in customer</h3>
          </div>
          <div class="modal-body">
            <form autocomplete="off" method="POST" action="controller.php">

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="firstName">First Name</label>
                      <input type="text" class="form-control" id="firstName" name="firstName"  required="" />
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="middleName">Middle Name</label>
                      <input type="text" class="form-control" id="middleName" name="middleName"  required="" />
                      </div>
                    </div>
                  
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="lastName">Last Name</label>
                      <input type="text" class="form-control" id="lastName" name="lastName"  required="" />
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="contactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber" required="" />
                     </div>
                    </div>

                    <div class="col-md-4">
                       <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="buildingNumber">Building Number</label>
                        <input type="text" class="form-control" id="buildingNumber" name="buildingNumber"/>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="street">Street</label>
                        <input type="text" class="form-control" id="street" name="street" required="" />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="barangay">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay" required="" />
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required="" />
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="province">Province</label>
                        <input type="text" class="form-control" id="province" name="province" required="" />
                      </div>
                    </div>

                  </div>


                  <input type="text" name="from" value="add-walk-in-customer" hidden="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  <?php 
    $qry = mysqli_query($connection, "select * from customer_view where customerTypeId = 1");
    while ($res = mysqli_fetch_assoc($qry)) { ?>

    <div class="modal fade modal-fill-in" id="updateModal<?php echo $res['customerId'] ?>" aria-hidden="false" aria-labelledby="updateModal"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h3 class="modal-title" id="exampleFillInModalTitle">Update walk-in customer</h3>
          </div>
          <div class="modal-body">
            <form autocomplete="off" method="POST" action="controller.php">

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="firstName">First Name</label>
                      <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $res['firstName'] ?>"  required="" />
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="middleName">Middle Name</label>
                      <input type="text" class="form-control" id="middleName" name="middleName" value="<?php echo $res['middleName'] ?>"  required="" />
                      </div>
                    </div>
                  
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="lastName">Last Name</label>
                      <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $res['lastName'] ?>" required="" />
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="contactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber" value="<?php echo $res['contactNumber'] ?>" required="" />
                     </div>
                    </div>

                    <div class="col-md-4">
                       <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="buildingNumber">Building Number</label>
                        <input type="text" class="form-control" id="buildingNumber" name="buildingNumber" value="<?php echo $res['buildingNumber'] ?>"/>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="street">Street</label>
                        <input type="text" class="form-control" id="street" name="street" required="" value="<?php echo $res['street'] ?>"/>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="barangay">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay" required=""  value="<?php echo $res['barangay'] ?>"/>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required="" value="<?php echo $res['city'] ?>"/>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="province">Province</label>
                        <input type="text" class="form-control" id="province" name="province" required="" value="<?php echo $res['province'] ?>"/>
                      </div>
                    </div>

                  </div>


                  <input type="text" name="from" value="update-walk-in-customer" hidden="">
                  <input type="text" name="customerId" value="<?php echo $res['customerId'] ?>" hidden="">
                 
                
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

          </form>

        </div>
      </div>
    </div>

    <div class="modal fade modal-fill-in" id="deleteModal<?php echo $res['customerId'] ?>" aria-hidden="false" aria-labelledby="updateModal"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h3 class="modal-title" id="exampleFillInModalTitle">Delete walk-in customer</h3>
          </div>
          <div class="modal-body">
            <form autocomplete="off" method="POST" action="controller.php">
              <div class="row">
                <div class="col-md-12">
                  <p>Are you sure to delete?</p>
                </div>
              </div>
                
          </div>

          <div class="modal-footer">
            <form method="POST" action="controller.php">
              <input type="text" name="from" value="delete-walk-in-customer" hidden="">
              <input type="text" name="customerId" value="<?php echo $res['customerId'] ?>" hidden="">
              <button type="submit" class="btn btn-primary">Yes</button>
            </form>
              <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
          </div>

     

        </div>
      </div>
    </div>

  <?php } ?>
    <!-- End Modal -->

 
<?php 
include("includes/footer.php");
?>