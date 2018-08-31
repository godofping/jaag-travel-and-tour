	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-5 col-md-12 p-r-5">
					<p><img src="img/logo_2x.png" width="150" height="36" data-retina="true" alt=""></p>
					<p>JAAG Travel and Tour and Van Rentals offers the cheapest tour packages and van rentals in the town!</p>
					<div class="follow_us">
						<ul>
							<li>Follow us</li>
							<li><a href="https://www.facebook.com/jaagtravelandtour23/"><i class="ti-facebook"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ml-lg-auto">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="about.php">About</a></li>
						<li><a href="login.php">Login</a></li>
						<li><a href="register.php">Register</a></li>
						<li><a href="announcement.php">Announcements</a></li>
			
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
						<li><a href="mailto:info@Panagea.com"><i class="ti-email"></i> info@Panagea.com</a></li>
					</ul>
					<div id="newsletter">
					<h6>Newsletter</h6>
					<div id="message-newsletter"></div>
					<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
						<div class="form-group">
							<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
							<input type="submit" value="Submit" id="submit-newsletter">
						</div>
					</form>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<ul id="footer-selector">
						<li>
							<div class="styled-select" id="lang-selector">
								<select>
									<option value="English" selected>English</option>
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
							</div>
						</li>
						<li>
							<div class="styled-select" id="currency-selector">
								<select>
									<option value="US Dollars" selected>US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
							</div>
						</li>
						<li><img src="img/cards_all.svg" alt=""></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© 2018 Panagea</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- Sign In Popup -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Sign In</h3>
		</div>
		<form method="POST" action="controller.php">
			<div class="sign-in-wrapper">

			
				<div class="form-group">
					<label>UserName</label>
					<input type="text" class="form-control" name="UserName" id="UserName" required="">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="passWord" id="passWord" required="">
					<i class="icon_lock_alt"></i>
				</div>

				<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
				<div class="text-center">
					Don’t have an account? <a href="register.php">Sign up</a>
				</div>
				
			</div>
			<input type="text" name="from" value="login" hidden="">
		</form>
		<!--form -->
	</div>
	<!-- /Sign In Popup -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/video_header.js"></script>
	<script>
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>
	
	
	
</body>
</html>