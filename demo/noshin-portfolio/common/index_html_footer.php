<!-- index footer -->




		<footer id="footer" class="footer bg-overlay">
			<div class="footer-main">
				<div class="container">
					<div class="row">
					
					
					
						<div class="col-md-4 col-sm-12 footer-widget footer-about">
							<h3 class="widget-title">Parent Organization</h3>
							<img class="footer-logo" src="images/footer-logo.png" alt="" />
							<p><?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT metadata FROM fyd_metadata WHERE title='footer_parentorg_text'"))['metadata']; ?></p>
							<div class="footer-social">
								<ul>
									<li><a target="_blank" href="https://facebook.com/<?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT metadata FROM fyd_metadata WHERE title='facebookpage_username'"))['metadata']; ?>"><i class="fa fa-facebook"></i></a></li>
									<li><a target="_blank" href="https://twitter.com/<?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT metadata FROM fyd_metadata WHERE title='twitter_username'"))['metadata']; ?>"><i class="fa fa-twitter"></i></a></li>
									<li><a target="_blank" href="https://instagram.com/<?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT metadata FROM fyd_metadata WHERE title='instagram_username'"))['metadata']; ?>"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div><!-- Footer social end -->
						</div><!-- Col end -->




						<div class="col-md-4 col-sm-12 footer-widget">
							<h3 class="widget-title">Working Hours</h3>
							<div class="working-hours">
								We are 7 days a week, every day excluding major holidays. Contact us if you have an emergency, with our
								Hotline and Email.
								<br><br> Phone: <span class="text-right"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT metadata FROM fyd_metadata WHERE title='phone_number'"))['metadata']; ?></span>
								<br> Email: <span class="text-right"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT metadata FROM fyd_metadata WHERE title='email'"))['metadata']; ?></span>
							</div>
						</div><!-- Col end -->




						<div class="col-md-4 col-sm-12 footer-widget">
							<h3 class="widget-title">Quick Links</h3>
							<ul class="list-arrow">
								<li><a href="blog">News & Blogs</a></li>
								<li><a href="partners">Partners</a></li>
								<li><a href="reviews">Reviews and Testimonials</a></li>
								<li><a href="about">Our Team</a></li>
								<li><a href="voulanteers">Our Voulanteers</a></li>
							</ul>
						</div><!-- Col end -->


					</div><!-- Row end -->
				</div><!-- Container end -->
			</div><!-- Footer main end -->

			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="copyright-info">
								<span>Copyright © 2019 | Developed with <img style="transform: rotate(-22deg); vertical-align: middle; height: 13px;" alt="love" src="images/black-heart-shaped.svg"/> by <a target="_blank" href="https://facebook.com/torabistudio">Torabi's Studio</a></span>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6">
							<div class="footer-menu">
								<ul class="nav unstyled">
									<li><a href="about">About | </a></li>
									<li><a href="organizers">Our Team |</a></li>
									<li><a href="faq">Faq | </a></li>
									<li><a href="blog">Blog | </a></li>
									<li><a href="voulanteers">Voulanteers | </a></li>
									<li><a href="registration/voulanteer.php">Be A Voulanteer</a></li>
								</ul>
							</div>
						</div>
					</div><!-- Row end -->

					<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
						<button class="btn btn-primary" title="Back to Top">
							<i class="fa fa-angle-double-up"></i>
						</button>
					</div>

				</div><!-- Container end -->
			</div><!-- Copyright end -->

		</footer>
