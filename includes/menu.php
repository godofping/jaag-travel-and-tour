<nav id="menu" class="main-menu">
			<ul>
				<li><span><a href="index.php">Home</a></span></li>
				<li><span><a href="packages.php">Services</a></span>
				<ul>
					<li><a href="index.html">Tour Packages</a></li>
					<li><a href="index-2.html">Van Rentals</a></li>
				</ul></li>
				<li><span><a href="van-rentals.php">Announcements</a></span></li>
				<li><span><a href="van-rentals.php">Reviews</a></span></li>
				<li><span><a href="van-rentals.php">About</a></span></li>
				<?php if (isset($_SESSION['customerId'])): ?>
					<li><span><a href="#0">My Account</a></span>
					<ul>
						<li><a href="my-bookings.php">My Bookings</a></li>
						<li><a href="my-van-rentals.php">My Van Rentals</a></li>
						<li><a href="my-profile.php">My Profile</a></li>
					</ul>
				</li>
				<?php endif ?>

			</ul>
		</nav>