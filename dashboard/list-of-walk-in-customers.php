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
            <h3 class="panel-title">Table Tools</h3>
          </header>
          <div class="panel-body">
            <table class="table table-hover dataTable table-striped w-full" id="exampleTableTools">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Kate</td>
                  <td>5516 Adolfo Rode</td>
                  <td>Littelhaven</td>
                  <td>26</td>
                  <td>2014/06/13</td>
                  <td>$635,852</td>
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>
        <!-- End Panel Table Tools -->
      </div>
    </div>
    <!-- End Page -->

 
<?php 
include("includes/footer.php");
?>