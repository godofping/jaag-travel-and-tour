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
            <div class="col-md-12"> <button type="button" class="btn btn-success"><i class="icon md-edit" aria-hidden="true"></i>Add Walk-in Customer</button></div>

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

 
<?php 
include("includes/footer.php");
?>