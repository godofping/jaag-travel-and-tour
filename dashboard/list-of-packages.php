<?php
include("includes/connection.php");
$_SESSION['current_page'] = "list-of-packages";
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
                  <th>Package Name</th>
                  <th>Destinations</th>
                  <th>Pax</th>
                  <th>Price</th>
                  <th>Package Details</th>
                  <th>Inclusions</th>
                  <th>Exclusions</th>
                  <th>Images</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $qry = mysqli_query($connection, "select * from package_view");
                while ($res = mysqli_fetch_assoc($qry)) { ?>
                <tr>
                  <td><?php echo $res['packageId']; ?></td>
                  <td><?php echo $res['packageName']; ?></td>
                  <td>
                  	<?php 
                  	$qry1 = mysqli_query($connection, "select * from destination_view where packageId = '" . $res['packageId'] . "'");
                  	while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
                  		<li><?php echo $res1['placeName']; ?></li>
                  	<?php } ?>
                  </td>
                  <td><?php echo $res['pax']; ?></td>
                  <td><?php echo $res['price']; ?></td>
                  <td><?php echo $res['packageDetails']; ?></td>
                  <td><?php echo $res['inclusion']; ?></td>
                  <td><?php echo $res['exclusion']; ?></td>

                  <td><a href="list-of-package-images.php?packageId=<?php echo $res['packageId'];?>&packageName=<?php echo $res['packageName'] ?>"><button type="button" class="btn btn-info btn-xs">MANAGE</button></a></td>

                  <td><button type="button" class="btn btn-floating btn-warning btn-sm waves-effect waves-classic" data-target="#updateModal<?php echo $res['packageId'] ?>" data-toggle="modal"><i class="icon md-edit" aria-hidden="true"></i></button> <button type="button" class="btn btn-floating btn-danger btn-sm waves-effect waves-classic" data-target="#deleteModal<?php echo $res['packageId'] ?>" data-toggle="modal"><i class="icon md-delete" aria-hidden="true"></i></button> </td>
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
            <h3 class="modal-title" id="exampleFillInModalTitle">Add package</h3>
          </div>
          <div class="modal-body">
            <form autocomplete="off" method="POST" action="controller.php">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="packageName">Package Name</label>
                      <input type="text" class="form-control" id="packageName" name="packageName"  required="" />
                      </div>
                    </div>
                   </div>

                   <div class="row">
                    <div class="col-md-12">
	                  <div class="form-group form-material" data-plugin="formMaterial">
	                    <label class="form-control-label" for="select">Destinations</label>
	                    <select class="form-control" multiple name="places[]" data-plugin="select2" style="width: 100%;" required="">
	                  	<?php $qry = mysqli_query($connection, "select * from place_view order by placeName asc");
	                  	while ($res = mysqli_fetch_assoc($qry)) { ?>
	                  		<option value="<?php echo $res['placeId'] ?>"><?php echo $res['placeName']; ?></option>
	                  	<?php }?>
	                    </select>
	                  </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="pax">Pax</label>
                        <input type="number" class="form-control" id="pax" name="pax" required="" />
                     </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="price">Price</label>
                        <input type="number" step="any" class="form-control" id="price" name="price" required="" />
                     </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="inclusion">Inclusion</label>
                        <textarea class="form-control" id="inclusion" name="inclusion" rows="2" required=""></textarea>
                      </div>
                    </div>
          
                    <div class="col-md-6">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="exclusion">Exclusion</label>
                        <textarea class="form-control" id="exclusion" name="exclusion" rows="2" required=""></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  	<div class="col-md-12">
                  		<div class="form-group form-material" data-plugin="formMaterial">
	                    	<label class="form-control-label" for="packageDetails">Package Details</label>
	                    	<textarea class="form-control" id="packageDetails" name="packageDetails" rows="3" required=""></textarea>
	                  	</div>
                  	</div>
                  </div>

                  <input type="text" name="from" value="add-package" hidden="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>



  <?php 
    $qry = mysqli_query($connection, "select * from package_view");
    while ($res = mysqli_fetch_assoc($qry)) { ?>

    <div class="modal fade modal-fill-in" id="updateModal<?php echo $res['packageId'] ?>" aria-hidden="false" aria-labelledby="updateModal"
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
                    <div class="col-md-12">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="packageName">Package Name</label>
                      <input type="text" class="form-control" id="packageName" name="packageName" value="<?php echo $res['packageName'] ?>"  required="" />
                      </div>
                    </div>
                   </div>

                   <div class="row">
                    <div class="col-md-12">
	                  <div class="form-group form-material" data-plugin="formMaterial">
	                    <label class="form-control-label" for="select">Destinations</label>
	                    <select class="form-control" multiple name="places[]" data-plugin="select2" style="width: 100%;" required="">
	                  	<?php $qry1 = mysqli_query($connection, "select * from place_view order by placeName asc");
	                  	while ($res1 = mysqli_fetch_assoc($qry1)) { ?>
	                  		<option <?php 
	                  		$qry2 = mysqli_query($connection,"select * from destination_view where packageId = '" . $res['packageId'] . "' and placeId = '" . $res1['placeId'] . "'");
	                  		if (mysqli_num_rows($qry2) > 0): ?>
	                  			selected
	                  		<?php endif ?> value="<?php echo $res1['placeId'] ?>"><?php echo $res1['placeName']; ?></option>
	                  	<?php }?>
	                    </select>
	                  </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="pax">Pax</label>
                        <input type="number" class="form-control" id="pax" name="pax" value="<?php echo $res['pax'] ?>" required="" />
                     </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="price">Price</label>
                        <input type="number" step="any" class="form-control" id="price" name="price" value="<?php echo $res['price'] ?>" required="" />
                     </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="inclusion">Inclusion</label>
                        <textarea class="form-control" id="inclusion" name="inclusion" rows="2" required=""><?php echo $res['inclusion'] ?></textarea>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="exclusion">Exclusion</label>
                        <textarea class="form-control" id="exclusion" name="exclusion" rows="2" required=""><?php echo $res['exclusion'] ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  	<div class="col-md-12">
                  		<div class="form-group form-material" data-plugin="formMaterial">
	                    	<label class="form-control-label" for="packageDetails">Package Details</label>
	                    	<textarea class="form-control" id="packageDetails" name="packageDetails" rows="3" required=""><?php echo $res['packageDetails'] ?></textarea>
	                  	</div>
                  	</div>
                  </div>

                  <input type="text" name="from" value="update-package" hidden="">
                  <input type="text" name="packageId" value="<?php echo $res['packageId'] ?>" hidden="">
                  <input type="text" name="priceId" value="<?php echo $res['priceId'] ?>" hidden="">
                
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

          </form>

        </div>
      </div>
    </div>

    <div class="modal fade modal-fill-in" id="deleteModal<?php echo $res['packageId'] ?>" aria-hidden="false" aria-labelledby="updateModal"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h3 class="modal-title" id="exampleFillInModalTitle">Delete package</h3>
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
              <input type="text" name="from" value="delete-package" hidden="">
              <input type="text" name="packageId" value="<?php echo $res['packageId'] ?>" hidden="">
              <input type="text" name="priceId" value="<?php echo $res['priceId'] ?>" hidden="">
              <button type="submit" class="btn btn-primary">Yes</button>
            </form>
              <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
          </div>

     

        </div>
      </div>
    </div>

    <div class="modal fade modal-fill-in" id="addInclusionModal<?php echo $res['packageId'] ?>" aria-hidden="false" aria-labelledby="addModal0"
      role="dialog" tabindex="-1">
      <div class="modal-dialog modal-simple">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h3 class="modal-title" id="exampleFillInModalTitle">Add inclusion</h3>
          </div>
          <div class="modal-body">
            <form autocomplete="off" method="POST" action="controller.php">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-material" data-plugin="formMaterial">
                      <label class="form-control-label" for="inclusion">Inclusion</label>
                      <input type="text" class="form-control" id="inclusion" name="inclusion"  required="" />
                      </div>
                    </div>
                   </div>

                  <input type="text" name="from" value="add-inclusion" hidden="">
                  <input type="text" name="packageId" value="<?php echo $res['packageId'] ?>" hidden>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  <?php } ?>
    <!-- End Modal -->

 
<?php 
include("includes/footer.php");
?>