<!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">© 2018 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">JAAG</a></div>
      <div class="site-footer-right">
        Crafted with <i class="red-600 icon md-favorite"></i> by STI
      </div>
    </footer>
    <!-- Core  -->
    <script src="global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="global/vendor/jquery/jquery.js"></script>
    <script src="global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="global/vendor/bootstrap/bootstrap.js"></script>
    <script src="global/vendor/animsition/animsition.js"></script>
    <script src="global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="global/vendor/waves/waves.js"></script>
    
    <!-- Plugins -->
    <script src="global/vendor/jquery-mmenu/jquery.mmenu.min.all.js"></script>
    <script src="global/vendor/switchery/switchery.js"></script>
    <script src="global/vendor/intro-js/intro.js"></script>
    <script src="global/vendor/screenfull/screenfull.js"></script>
    <script src="global/vendor/slidepanel/jquery-slidePanel.js"></script>
    <script src="global/vendor/chartist/chartist.min.js"></script>
    <script src="global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>
    <script src="global/vendor/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="global/vendor/matchheight/jquery.matchHeight-min.js"></script>
    <script src="global/vendor/peity/jquery.peity.min.js"></script>
        <script src="global/vendor/datatables.net/jquery.dataTables.js"></script>
        <script src="global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js"></script>
        <script src="global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js"></script>
        <script src="global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
        <script src="global/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
        <script src="global/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
        <script src="global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
        <script src="global/vendor/datatables.net-buttons/dataTables.buttons.js"></script>
        <script src="global/vendor/datatables.net-buttons/buttons.html5.js"></script>
        <script src="global/vendor/datatables.net-buttons/buttons.flash.js"></script>
        <script src="global/vendor/datatables.net-buttons/buttons.print.js"></script>
        <script src="global/vendor/datatables.net-buttons/buttons.colVis.js"></script>
        <script src="global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js"></script>
        <script src="global/vendor/asrange/jquery-asRange.min.js"></script>
        <script src="global/vendor/bootbox/bootbox.js"></script>
        <script src="global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
        <script src="global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
        <script src="global/vendor/toastr/toastr.js"></script>

    <!-- Scripts -->
    <script src="global/js/Component.js"></script>
    <script src="global/js/Plugin.js"></script>
    <script src="global/js/Base.js"></script>
    <script src="global/js/Config.js"></script>
    
    <script src="assets/js/Section/Menubar.js"></script>
    <script src="assets/js/Section/Sidebar.js"></script>
    <script src="assets/js/Section/PageAside.js"></script>
    <script src="assets/js/Section/GridMenu.js"></script>
    
    <!-- Config -->
    <script src="global/js/config/colors.js"></script>
    <script src="assets/js/config/tour.js"></script>
    <script>Config.set('assets', 'assets');</script>
    
    <!-- Page -->
    <script src="assets/js/Site.js"></script>
    <script src="global/js/Plugin/asscrollable.js"></script>
    <script src="global/js/Plugin/slidepanel.js"></script>
    <script src="global/js/Plugin/switchery.js"></script>
    <script src="assets/js/Site.js"></script>
    <script src="global/js/Plugin/matchheight.js"></script>
    <script src="global/js/Plugin/jvectormap.js"></script>
    <script src="global/js/Plugin/peity.js"></script>

    <script src="assets/examples/js/dashboard/v1.js"></script>
    <script src="global/js/Plugin/datatables.js"></script>
    <script src="assets/examples/js/tables/datatable.js"></script>
    <script src="assets/examples/js/uikit/icon.js"></script>
    <script src="global/js/Plugin/jquery-placeholder.js"></script>
    <script src="global/js/Plugin/material.js"></script>
    <script src="global/js/Plugin/jquery-placeholder.js"></script>
    <script src="global/js/Plugin/material.js"></script>
    <script src="global/js/Plugin/toastr.js"></script>



    
    <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>


    <?php if (isset($_SESSION['do'])): ?>

        <script>
          $(document).ready(function(){
           toastr["success"]("Successfully <?php 
            if ($_SESSION['do'] == 'added') {
                echo "added!";
            } elseif ($_SESSION['do'] == 'deleted') {
                echo "deleted!";
            } elseif ($_SESSION['do'] == 'updated') {
                echo "updated!";
            }

            ?>", "Message");
          });
        </script>

    <?php endif ?>



    <?php
        if (isset($_SESSION['do'])) {
            unset($_SESSION['do']);
        }
    
     ?>
    
  </body>
</html>