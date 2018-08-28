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
          <li class="breadcrumb-item active">Settings</li>
        </ol>
        <h1 class="page-title">Destinations</h1>
        
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
                  <th>Place</th>
                  <th>GPS Coordinates</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $qry = mysqli_query($connection, "select * from place_view");
                while ($res = mysqli_fetch_assoc($qry)) { ?>
                <tr>
                  <td><?php echo $res['placeId']; ?></td>
                  <td><?php echo $res['placeName']; ?></td>
                  <td><?php echo $res['mapLocationCoordinate']; ?></td>
                  <td><button type="button" class="btn btn-floating btn-warning btn-sm waves-effect waves-classic"><i class="icon md-edit" aria-hidden="true" data-target="#updateModal<?php echo $res['placeId'] ?>" data-toggle="modal"></i></button> <button type="button" class="btn btn-floating btn-danger btn-sm waves-effect waves-classic"><i class="icon md-delete" aria-hidden="true" data-target="#deleteModal<?php echo $res['placeId'] ?>" data-toggle="modal"></i></button> </td>
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
            <h3 class="modal-title" id="exampleFillInModalTitle">Add place</h3>
          </div>
          <div class="modal-body">
            <form autocomplete="off" method="POST" action="controller.php">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="placeName">Place</label>
                      <input type="text" class="form-control" id="placeName" name="placeName"  required="" />
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="mapLocationCoordinate">GPS Coordinates</label>
                      <input type="text" class="form-control" id="mapLocationCoordinate" name="mapLocationCoordinate"  required="" />
                      </div>
                    </div>

                  </div>
                  
                  
            
                  <input type="text" name="from" value="add-place" hidden="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  <?php 
    $qry = mysqli_query($connection, "select * from place_view");
    while ($res = mysqli_fetch_assoc($qry)) { ?>

    <div class="modal fade modal-fill-in" id="updateModal<?php echo $res['placeId'] ?>" aria-hidden="false" aria-labelledby="updateModal"
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
                  <input type="text" name="placeId" value="<?php echo $res['placeId'] ?>" hidden="">
                 
                
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

          </form>

        </div>
      </div>
    </div>

    <div class="modal fade modal-fill-in" id="deleteModal<?php echo $res['placeId'] ?>" aria-hidden="false" aria-labelledby="updateModal"
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
              <input type="text" name="placeId" value="<?php echo $res['placeId'] ?>" hidden="">
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