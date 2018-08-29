<div class="site-menubar bg-light-blue-50">
      <ul class="site-menu">
        <li class="site-menu-item <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'home'): ?>
          active open
        <?php endif ?>">
          <a class="animsition-link" href="home.php">
                  <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                  <span class="site-menu-title">Dashboard</span>
              </a>
        </li>

        <li class="site-menu-item has-sub <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'list-of-walk-in-customers' or $_SESSION['current_page'] == 'list-of-registered-customers'): ?>
          active open
        <?php endif ?>">
          <a href="javascript:void(0)">
            <i class="site-menu-icon md-run" aria-hidden="true"></i>
            <span class="site-menu-title">Customers</span>
            <span class="site-menu-arrow"></span>
          </a>
          <ul class="site-menu-sub">
            <li class="site-menu-item <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'list-of-walk-in-customers'): ?>
              active
            <?php endif ?>">
              <a class="animsition-link" href="list-of-walk-in-customers.php">
                <span class="site-menu-title">Walk-in Customers</span>
              </a>
            </li>
            <li class="site-menu-item <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'list-of-registered-customers'): ?>
              active
            <?php endif ?>">
              <a class="animsition-link" href="list-of-registered-customers.php">
                <span class="site-menu-title">Registered Customers</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="site-menu-item has-sub <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'list-of-vans' or $_SESSION['current_page'] == 'list-of-van-rentals' ): ?>
          active open
        <?php endif ?>">
          <a href="javascript:void(0)">
            <i class="site-menu-icon md-car-taxi" aria-hidden="true"></i>
            <span class="site-menu-title">Van Rentals</span>
            <span class="site-menu-arrow"></span>
          </a>
          <ul class="site-menu-sub">
            <li class="site-menu-item <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'list-of-vans'): ?>
              active
            <?php endif ?>">
              <a class="animsition-link" href="list-of-vans.php">
                <span class="site-menu-title">Vans</span>
              </a>
            </li>

            <li class="site-menu-item <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'list-of-van-rentals'): ?>
              active
            <?php endif ?>">
              <a class="animsition-link" href="list-of-van-rentals.php">
                <span class="site-menu-title">Rentals</span>
              </a>
            </li>

          </ul>
        </li>
        

        <li class="site-menu-item <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'list-of-packages'): ?>
          active open
        <?php endif ?>">
          <a class="animsition-link" href="list-of-packages.php">
                  <i class="site-menu-icon md-flower-alt" aria-hidden="true"></i>
                  <span class="site-menu-title">Packages</span>
              </a>
        </li>

        <li class="site-menu-item has-sub <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'list-of-detinations' ): ?>
          active open
        <?php endif ?>">
          <a href="javascript:void(0)">
            <i class="site-menu-icon md-settings" aria-hidden="true"></i>
            <span class="site-menu-title">Settings</span>
            <span class="site-menu-arrow"></span>
          </a>
          <ul class="site-menu-sub">
            <li class="site-menu-item <?php if (isset($_SESSION['current_page']) and $_SESSION['current_page'] == 'list-of-detinations'): ?>
              active
            <?php endif ?>">
              <a class="animsition-link" href="list-of-destinations.php">
                <span class="site-menu-title">Destinations</span>
              </a>
            </li>

        

          </ul>
        </li>
        





 
      </ul>
    </div>