<?php 
include("dashboard/includes/connection.php");
include("includes/header.php");
 ?>
	
	<main>
		<section class="header-video">
			<div id="hero_video">
				<div class="wrapper">
				<div class="container">
					<h3>JAAG TRAVEL AND TOUR</h3>
					<p>travel while you can</p>
				
				</div>
			</div>
			</div>
			<img src="img/video_fix.png" alt="" class="header-video--media" data-video-src="video/intro.mp4" data-teaser-source="video/intro" data-provider="" data-video-width="1920" data-video-height="960">
		</section>
		<!-- /header-video -->


		<div class="container-fluid margin_80_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Our Available Package</h2>
				<p>here is some of our packages.</p>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				<?php
				$qry = mysqli_query($connection, "select * from package_view where packageStatus = 'open'");
				while ($res = mysqli_fetch_assoc($qry)) { 

					$qry1 = mysqli_query($connection, "select * from package_media_view where packageId = '" . $res['packageId'] . "' LIMIT 1");
					$res1 = mysqli_fetch_assoc($qry1);

					?>
				 <div class="item">
					<div class="box_grid">
						<figure>
					
							<a href="tour-detail.php?packageId=<?php echo $res['packageId'] ?>"><img src="<?php echo "dashboard/". $res1['mediaLocation'];?>" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
							<small><?php echo $res['packageStatus']; ?></small>
						</figure>
						<div class="wrapper">
							<h3><a href="tour-detail.html"><?php echo $res['packageName']; ?></a></h3>
							<p><?php echo $res['packageDetails']; ?></p>
							<span class="price">From <strong>₱<?php echo $res['price']; ?></strong> /per person</span>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i><?php echo $res['datePosted']; ?></li>
							<li><div class="score"><span>Package ID<em><!-- 350 Reviews --></em></span><strong><?php echo $res['packageId']; ?></strong></div></li>
						</ul>
					</div>
				</div>
				<!-- /item -->
				<?php } ?>
			
				
			</div>
			<!-- /carousel -->
			<div class="container">
				<p class="btn_home_align"><a href="tours-grid-isotope.html" class="btn_1 rounded">View all Tours</a></p>
			</div>
			<!-- /container -->
			<hr class="large">
		</div>
		<!-- /container -->
		


		<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="main_title_2">
					<span><em></em></span>
					<h3>Announcements</h3>
					<p>get updated</p>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_1.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Mark Twain</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Pri oportere scribentur eu</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_2.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Jhon Doe</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Duo eius postea suscipit ad</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_3.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Luca Robinson</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Elitr mandamus cu has</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="img/news_home_4.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Paula Rodrigez</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Id est adhuc ignota delenit</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
				</div>
				<!-- /row -->
				<p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all announcements</a></p>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->

		<div class="call_section">
			<div class="container clearfix">
				<div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
					<div class="block-reveal">
						<div class="block-vertical"></div>
						<div class="box_1">
							<h3>Enjoy a GREAT travel with us</h3>
							<p>We offer the cheapest tour packages and van rentals in the town.</p>
							<!-- <a href="#0" class="btn_1 rounded">Read more</a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/call_section-->
	</main>
	<!-- /main -->

<?php include("includes/footer.php"); ?>