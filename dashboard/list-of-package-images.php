<?php
include("includes/connection.php");
$_SESSION['current_page'] = "list-of-packages";
include("includes/header.php");
include("includes/side-menu.php");
?>
     <!-- Page -->
    <div <div class="page bg-grey-300">>

      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item active"><a href="list-of-packages.php">Packages</a></li>
        </ol>
        <h1 class="page-title">Images of "<?php echo $_GET['packageName']; ?>" Package</h1>
        
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


          <div class="row">

                <?php 
                $qry = mysqli_query($connection, "select * from package_media_view where packageId = '" . $_GET['packageId'] . "'");
                while ($res = mysqli_fetch_assoc($qry)) { ?>
                  <div class="col-md-6">
                      <div class="example">
                      
                        <div class="card bg-yellow-a100">
                        <img class="card-img-top img-fluid w-full" src="<?php echo $res['mediaLocation']; ?>">
                        <div class="card-block">
                          <h4 class="card-title">ID: <?php echo $res['packageMediaId']; ?></h4>
                          <p class="card-text"><?php echo $res['mediaLocation']; ?></p>
                          <div class="float-right"><button type="button" class="btn btn-floating btn-warning btn-sm waves-effect waves-classic" data-target="#updateModal<?php echo $res['packageMediaId'] ?>" data-toggle="modal"><i class="icon md-edit" aria-hidden="true"></i></button> <button type="button" class="btn btn-floating btn-danger btn-sm waves-effect waves-classic" data-target="#deleteModal<?php echo $res['packageMediaId'] ?>" data-toggle="modal"><i class="icon md-delete" aria-hidden="true"></i></button></div>
                        </div>
                      </div>
                      </div>
                    </div>
              
                <?php } ?>
            
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
            <h3 class="modal-title" id="exampleFillExModalTitle">Add place</h3>
          </div>
          <div class="modal-body">
            <form autocomplete="off" method="POST" action="controller.php" enctype="multipart/form-data">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="exclusion">Image</label>
                      <input type="file" name="mediaLocation" id="input-file-max-fs" data-plugin="dropify" data-max-file-size="2M" required="">
                      </div>
                    </div>
                  </div>

                  <div class="row">

                   
                  </div>
                  <input type="text" name="from" value="add-package-image" hidden="">
                  <input type="text" name="packageId" value="<?php echo $_GET['packageId'] ?>" hidden="">
                  <input type="text" name="packageName" value="<?php echo $_GET['packageName'] ?>" hidden="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  <?php 
    $qry = mysqli_query($connection, "select * from package_media_view where packageId = '" . $_GET['packageId'] . "'");
    while ($res = mysqli_fetch_assoc($qry)) { ?>

    <div class="modal fade modal-fill-in" id="updateModal<?php echo $res['packageMediaId'] ?>" aria-hidden="false" aria-labelledby="updateModal"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h3 class="modal-title" id="exampleFillExModalTitle">Update exclusion</h3>
          </div>
          <div class="modal-body">
            <form autocomplete="off" method="POST" action="controller.php" enctype="multipart/form-data">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="exclusion">Image</label>
                      <input type="file" name="mediaLocation" id="input-file-max-fs" data-plugin="dropify" data-max-file-size="2M" required="" data-default-file="<?php echo $res['mediaLocation'] ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">

                   
                  </div>
                  <input type="text" name="from" value="update-package-image" hidden="">
                  <input type="text" name="packageId" value="<?php echo $_GET['packageId'] ?>" hidden="">
                  <input type="text" name="packageMediaId" value="<?php echo $res['packageMediaId'] ?>" hidden="">
                  <input type="text" name="packageName" value="<?php echo $_GET['packageName'] ?>" hidden="">
                 
                
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

          </form>

        </div>
      </div>
    </div>

    <div class="modal fade modal-fill-in" id="deleteModal<?php echo $res['packageMediaId'] ?>" aria-hidden="false" aria-labelledby="updateModal"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h3 class="modal-title" id="exampleFillExModalTitle">Delete exclusion</h3>
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
              <input type="text" name="from" value="delete-package-image" hidden="">
              <input type="text" name="packageMediaId" value="<?php echo $res['packageMediaId'] ?>" hidden="">
              <input type="text" name="packageId" value="<?php echo $_GET['packageId'] ?>" hidden="">
              <input type="text" name="packageName" value="<?php echo $_GET['packageName'] ?>" hidden="">
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