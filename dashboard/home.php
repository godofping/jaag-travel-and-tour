<?php
include("includes/connection.php");
$_SESSION['current_page'] = "home";
include("includes/header.php");
include("includes/side-menu.php");
?>

     <!-- Page -->
    <div <div class="page bg-grey-300">>
      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
          <div class="col-xl-3 col-md-6">
            <!-- Widget Linearea One-->
            <div class="card card-shadow" id="widgetLineareaOne">
              <div class="card-block p-20 pt-10">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon md-account grey-600 font-size-24 vertical-align-bottom mr-5"></i>                    User
                  </div>
                  <span class="float-right grey-700 font-size-30">1,253</span>
                </div>
                <div class="mb-20 grey-500">
                  <i class="icon md-long-arrow-up green-500 font-size-16"></i>                  15% From this yesterday
                </div>
                <div class="ct-chart h-50"></div>
              </div>
            </div>
            <!-- End Widget Linearea One -->
          </div>
          <div class="col-xl-3 col-md-6">
            <!-- Widget Linearea Two -->
            <div class="card card-shadow" id="widgetLineareaTwo">
              <div class="card-block p-20 pt-10">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon md-flash grey-600 font-size-24 vertical-align-bottom mr-5"></i>                    VISITS
                  </div>
                  <span class="float-right grey-700 font-size-30">2,425</span>
                </div>
                <div class="mb-20 grey-500">
                  <i class="icon md-long-arrow-up green-500 font-size-16"></i>                  34.2% From this week
                </div>
                <div class="ct-chart h-50"></div>
              </div>
            </div>
            <!-- End Widget Linearea Two -->
          </div>
          <div class="col-xl-3 col-md-6">
            <!-- Widget Linearea Three -->
            <div class="card card-shadow" id="widgetLineareaThree">
              <div class="card-block p-20 pt-10">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon md-chart grey-600 font-size-24 vertical-align-bottom mr-5"></i>                    Total Clicks
                  </div>
                  <span class="float-right grey-700 font-size-30">1,864</span>
                </div>
                <div class="mb-20 grey-500">
                  <i class="icon md-long-arrow-down red-500 font-size-16"></i>                  15% From this yesterday
                </div>
                <div class="ct-chart h-50"></div>
              </div>
            </div>
            <!-- End Widget Linearea Three -->
          </div>
          <div class="col-xl-3 col-md-6">
            <!-- Widget Linearea Four -->
            <div class="card card-shadow" id="widgetLineareaFour">
              <div class="card-block p-20 pt-10">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon md-view-list grey-600 font-size-24 vertical-align-bottom mr-5"></i>                    Items
                  </div>
                  <span class="float-right grey-700 font-size-30">845</span>
                </div>
                <div class="mb-20 grey-500">
                  <i class="icon md-long-arrow-up green-500 font-size-16"></i>                  18.4% From this yesterday
                </div>
                <div class="ct-chart h-50"></div>
              </div>
            </div>
            <!-- End Widget Linearea Four -->
          </div>

          <div class="col-xxl-7 col-lg-7">
            <!-- Widget Jvmap -->
            <div class="card card-shadow">
              <div class="card-block p-0">
                <div id="widgetJvmap" class="h-450"></div>
              </div>
            </div>
            <!-- End Widget Jvmap -->
          </div>

          <div class="col-xxl-5 col-lg-5">
            <!-- Widget Current Chart -->
            <div class="card card-shadow" id="widgetCurrentChart">
              <div class="p-30 white bg-green-500">
                <div class="font-size-20 mb-20">The current chart</div>
                <div class="ct-chart h-200">
                </div>
              </div>
              <div class="bg-white p-30 font-size-14">
                <div class="counter counter-lg text-left">
                  <div class="counter-label mb-5">Approve rate are above average</div>
                  <div class="counter-number-group">
                    <span class="counter-number">12,673</span>
                    <span class="counter-number-related text-uppercase font-size-14">pcs</span>
                  </div>
                </div>
                <button type="button" class="btn-raised btn btn-info btn-floating">
                  <i class="icon md-plus" aria-hidden="true"></i>
                </button>
              </div>
            </div>
            <!-- End Widget Current Chart -->
          </div>

      


        </div>
      </div>
    </div>
    <!-- End Page -->

 
<?php 
include("includes/footer.php");
?>