<div class="site-menubar">
      <ul class="site-menu">
        <li class="site-menu-item <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'home'): ?>
          active open
        <?php endif ?>">
          <a class="animsition-link" href="home.php">
                  <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                  <span class="site-menu-title">Dashboard</span>
              </a>
        </li>

        <li class="site-menu-item has-sub <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'van_rental'): ?>
          active open
        <?php endif ?>">
          <a href="javascript:void(0)">
            <i class="site-menu-icon md-book" aria-hidden="true"></i>
            <span class="site-menu-title">Customers</span>
            <span class="site-menu-arrow"></span>
          </a>
          <ul class="site-menu-sub">
            <li class="site-menu-item">
              <a class="animsition-link" href="list-of-walk-in-customers.php">
                <span class="site-menu-title">Walk-in Customers</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="list-of-registered-customers.php">
                <span class="site-menu-title">Registered Customers</span>
              </a>
            </li>
          </ul>
        </li>
        
         <li class="site-menu-item has-sub <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'van_rental'): ?>
          active open
        <?php endif ?>">
          <a href="javascript:void(0)">
            <i class="site-menu-icon md-book" aria-hidden="true"></i>
            <span class="site-menu-title">Van Rental</span>
            <span class="site-menu-arrow"></span>
          </a>
          <ul class="site-menu-sub">
            <li class="site-menu-item">
              <a class="animsition-link" href="list-of-booking-schedules.php">
                <span class="site-menu-title">List of Vans</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="site-menu-item <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'booked'): ?>
          active open
        <?php endif ?>">
          <a class="animsition-link" href="booked.php">
                  <i class="site-menu-icon md-assignment-o" aria-hidden="true"></i>
                  <span class="site-menu-title">Booked</span>
              </a>
        </li>

        <li class="site-menu-item has-sub <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'reports'): ?>
          active open
        <?php endif ?>">
          <a href="javascript:void(0)">
            <i class="site-menu-icon md-book" aria-hidden="true"></i>
            <span class="site-menu-title">Reports</span>
            <span class="site-menu-arrow"></span>
          </a>
          <ul class="site-menu-sub">
            <li class="site-menu-item">
              <a class="animsition-link" href="list-of-booking-schedules.php">
                <span class="site-menu-title">List of Booking Schedules</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="list-of-customer-information.php">
                <span class="site-menu-title">List of Customer Information</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="list-of-unattended-customer.php">
                <span class="site-menu-title">List of Unattended Customer</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="list-of-cancellation.php">
                <span class="site-menu-title">List of Cancellation</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="list-of-payment-transaction.php">
                <span class="site-menu-title">List of Payment Transaction</span>
              </a>
            </li>
            <li class="site-menu-item">
              <a class="animsition-link" href="statistical-report.php">
                <span class="site-menu-title">Statistical Report</span>
              </a>
            </li>

          </ul>
        </li>




 
      </ul>
    </div>