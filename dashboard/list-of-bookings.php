<?php
include("includes/connection.php");
$_SESSION['current_page'] = "list-of-bookings";
include("includes/header.php");
include("includes/side-menu.php");
?>
     <!-- Page -->
    <div <div class="page bg-grey-300">>

      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      
        </ol>
        <h1 class="page-title active">Bookings</h1>
        
      </div>

      <div class="page-content">
        <!-- Panel Table Tools -->
        <div <div class="panel bg-grey-100">
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
                  <td><?php echo $res['latitude']; ?>, <?php echo $res['longtitude']; ?></td>
                  <td><button type="button" class="btn btn-floating btn-warning btn-sm waves-effect waves-classic" data-target="#updateModal<?php echo $res['placeId'] ?>" data-toggle="modal"><i class="icon md-edit" aria-hidden="true"></i></button> <button type="button" class="btn btn-floating btn-danger btn-sm waves-effect waves-classic" data-target="#deleteModal<?php echo $res['placeId'] ?>" data-toggle="modal"><i class="icon md-delete" aria-hidden="true"></i></button> </td>
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

                    <div class="col-md-6">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="latitude">Latitude</label>
                      <input type="number" step="any" class="form-control" id="latitude" name="latitude"  required="" />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="longtitude">Longtitude</label>
                      <input type="number" step="any" class="form-control" id="longtitude" name="longtitude"  required="" />
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
            <h3 class="modal-title" id="exampleFillInModalTitle">Update place</h3>
          </div>
          <div class="modal-body">
            <form autocomplete="off" method="POST" action="controller.php">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="placeName">Place</label>
                      <input type="text" class="form-control" id="placeName" name="placeName" value="<?php echo $res['placeName'] ?>"  required="" />
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="latitude">Latitude</label>
                      <input type="number" step="any" class="form-control" id="latitude" name="latitude" value="<?php echo $res['latitude'] ?>"  required="" />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="longtitude">Longtitude</label>
                      <input type="number" step="any" class="form-control" id="longtitude" name="longtitude" value="<?php echo $res['longtitude'] ?>"  required="" />
                      </div>
                    </div>

                  </div>

                  <input type="text" name="from" value="update-place" hidden="">
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
            <h3 class="modal-title" id="exampleFillInModalTitle">Delete place</h3>
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
              <input type="text" name="from" value="delete-place" hidden="">
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