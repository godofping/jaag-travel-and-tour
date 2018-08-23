<?php
include("includes/connection.php");
$_SESSION['current_page'] = "home";
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
              <button class="btn btn-success" data-target="#addModal" data-toggle="modal"
                      type="button">Add</button>
            </div>

          </div>


            <div class="row">
              <div class="col-md-12">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">

              <thead>
                <tr>
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
              <tfoot>
                <tr>
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
              </tfoot>
              <tbody>

                <?php 
                $qry = mysqli_query($connection, "select * from customer_view where customerTypeId = 1");
                while ($res = mysqli_fetch_assoc($qry)) { ?>
                <tr>
                  <td><?php echo $res['firstName']; ?></td>
                  <td><?php echo $res['middleName']; ?></td>
                  <td><?php echo $res['lastName']; ?></td>
                  <td><?php echo $res['contactNumber']; ?></td>
                  <td><?php echo $res['buildingNumber']; ?></td>
                  <td><?php echo $res['street']; ?></td>
                  <td><?php echo $res['barangay']; ?></td>
                  <td><?php echo $res['city']; ?></td>
                  <td><?php echo $res['province']; ?></td>
                  <td><button type="button" class="btn btn-floating btn-warning btn-sm waves-effect waves-classic"><i class="icon md-edit" aria-hidden="true"></i></button> <button type="button" class="btn btn-floating btn-danger btn-sm waves-effect waves-classic"><i class="icon md-delete" aria-hidden="true"></i></button> </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
              </div>
            </div>


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
            <h3 class="modal-title" id="exampleFillInModalTitle">Add Walk-in customer</h3>
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

                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-success">Submit</button>
                    </div>
                  </div>

                  <input type="text" name="from" value="add-walk-in-customer" hidden="">
                 
                </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

 
<?php 
include("includes/footer.php");
?>