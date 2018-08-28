<?php
include("includes/connection.php");
$_SESSION['current_page'] = "packages";
include("includes/header.php");
include("includes/side-menu.php");
?>
     <!-- Page -->
    <div class="page">

      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>

        </ol>
        <h1 class="page-title">Packages</h1>
        
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
                  <th>Make</th>
                  <th>Model</th>
                  <th>Model Year</th>
                  <th>Plate Number</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $qry = mysqli_query($connection, "select * from van_view");
                while ($res = mysqli_fetch_assoc($qry)) { ?>
                <tr>
                  <td><?php echo $res['vanId']; ?></td>
                  <td><?php echo $res['make']; ?></td>
                  <td><?php echo $res['model']; ?></td>
                  <td><?php echo $res['modelYear']; ?></td>
                  <td><?php echo $res['plateNumber']; ?></td>
                  <td><button type="button" class="btn btn-floating btn-warning btn-sm waves-effect waves-classic"><i class="icon md-edit" aria-hidden="true" data-target="#updateModal<?php echo $res['vanId'] ?>" data-toggle="modal"></i></button> <button type="button" class="btn btn-floating btn-danger btn-sm waves-effect waves-classic"><i class="icon md-delete" aria-hidden="true" data-target="#deleteModal<?php echo $res['vanId'] ?>" data-toggle="modal"></i></button> </td>
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
            <h3 class="modal-title" id="exampleFillInModalTitle">Add van</h3>
          </div>
          <div class="modal-body">
            <form autocomplete="off" method="POST" action="controller.php">

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="make">Make</label>
                      <input type="text" class="form-control" id="make" name="make"  required="" />
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="model">Model</label>
                      <input type="text" class="form-control" id="model" name="model"  required="" />
                      </div>
                    </div>
                  
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="modelYear">Model Year</label>
                      <input type="text" class="form-control" id="modelYear" name="modelYear"  required="" />
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="plateNumber">Plate Number</label>
                        <input type="text" class="form-control" id="plateNumber" name="plateNumber" required="" />
                     </div>
                    </div>
                  </div>

                  <input type="text" name="from" value="add-van" hidden="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  <?php 
    $qry = mysqli_query($connection, "select * from van_view");
    while ($res = mysqli_fetch_assoc($qry)) { ?>

    <div class="modal fade modal-fill-in" id="updateModal<?php echo $res['vanId'] ?>" aria-hidden="false" aria-labelledby="updateModal"
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
                      <label class="form-control-label" for="make">Make</label>
                      <input type="text" class="form-control" id="make" name="make" value="<?php echo $res['make'] ?>" required="" />
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="model">Model</label>
                      <input type="text" class="form-control" id="model" name="model" value="<?php echo $res['model'] ?>" required="" />
                      </div>
                    </div>
                  
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="modelYear">Model Year</label>
                      <input type="text" class="form-control" id="modelYear" name="modelYear" value="<?php echo $res['modelYear'] ?>" required="" />
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="plateNumber">Plate Number</label>
                        <input type="text" class="form-control" id="plateNumber" name="plateNumber" value="<?php echo $res['plateNumber'] ?>" required="" />
                     </div>
                    </div>
                  </div>

                  <input type="text" name="from" value="update-van" hidden="">
                  <input type="text" name="vanId" value="<?php echo $res['vanId'] ?>" hidden="">
                 
                
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

          </form>

        </div>
      </div>
    </div>

    <div class="modal fade modal-fill-in" id="deleteModal<?php echo $res['vanId'] ?>" aria-hidden="false" aria-labelledby="updateModal"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h3 class="modal-title" id="exampleFillInModalTitle">Delete van</h3>
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
              <input type="text" name="from" value="delete-van" hidden="">
              <input type="text" name="vanId" value="<?php echo $res['vanId'] ?>" hidden="">
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