<?php
session_start();
require 'header.php';
require 'db.php';

// banner
$select_banner = "SELECT * FROM banners";
$select_banner_result = mysqli_query($db_connect, $select_banner);
$after_banner_assoc = mysqli_fetch_assoc($select_banner_result);
// banner

// expertise
$select_expertise = "SELECT * FROM expertises WHERE status=1";
$select_result_expertise = mysqli_query($db_connect, $select_expertise );

$select_count = "SELECT COUNT(*) as total FROM expertises WHERE status=1";
$select_count_result = mysqli_query($db_connect, $select_count);
$after_count_assoc = mysqli_fetch_assoc($select_count_result);
// expertise

// service
$select_service = "SELECT * FROM services WHERE status=1";
$select_result_service = mysqli_query($db_connect, $select_service);

$select_count = "SELECT COUNT(*) as total FROM services WHERE status=1";
$select_count_result = mysqli_query($db_connect, $select_count);
$after_count_assoc = mysqli_fetch_assoc($select_count_result); 

// Work together
$select_work = "SELECT * FROM works";
$select_result_work = mysqli_query($db_connect, $select_work);
$after_assoc_work = mysqli_fetch_assoc($select_result_work);

// portfolio
$select_portfolio = "SELECT * FROM portfolios WHERE status=1";
$select_result_portfolio = mysqli_query($db_connect, $select_portfolio);

// testimonial
$select = "SELECT * FROM testimonials";
$select_res = mysqli_query($db_connect, $select);

?>
<!-- Banner start -->

<!-- Slider Start -->
<section class="slider py-7 ">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5 col-sm-12 col-12 col-md-5">
				<div class="slider-img position-relative">
					<img src="upload/banner/<?=$after_banner_assoc['banner_photo']?>" alt="" class="img-fluid w-100">
				</div>
			</div>

			<div class="col-lg-6 col-12 col-md-7">
				<div class="ml-5 position-relative mt-5 mt-lg-0">
					<h1 class="font-weight-normal text-color text-md"><i class="ti-minus mr-2"></i><?=$after_banner_assoc['sub_title']?></h1>
					<h2 class="mt-3 text-lg mb-3 text-capitalize"><?=$after_banner_assoc['main_title']?></h2>
					<p class="animated fadeInUp lead mt-4 mb-5 text-white-50 lh-35"><?=$after_banner_assoc['description']?></p>
					<a href="<?=$after_banner_assoc['action_link']?>" class="btn btn-solid-border"><?=$after_banner_assoc['action_name']?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner End -->

<!-- Skills start -->
<section class="section bg-gray" id="skillbar" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>Skills Set</span>
					<h2 class="title">Expertise</h2>
				</div>
			</div>
		</div>
		<div class="row <?=$after_count_assoc['total'] == 5?'justify-content-center':''?>">
			<?php foreach($select_result_expertise as $expertise){ ?>
				<div class="col-lg-<?=$after_count_assoc['total'] == 5?'4':'6'?>">
				<div class="skill-bar mb-4 mb-lg-0">
					<div class="mb-4 text-right"><h4 class="font-weight-normal"><?=$expertise['topic']?></h4></div>
					<div class="progress">
						<div class="progress-bar" data-percent="<?=$expertise['percentage']?>">
							<span class="percent-text"><span class="count"><?=$expertise['percentage']?></span>%</span>
						</div>
					</div>
				</div>
			</div>
			<?php }  ?>
		</div>
	</div>
</section>	

<!-- Skills End -->

<!-- Service start -->
<section class="section bg-gray" id="service" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus mr-2"></i>What i do</span>
					<h2 class="title">Services</h2>
				</div>
			</div>
		</div>

		<div class="row no-gutters <?=$after_count_assoc['total'] == 5?'justify-content-center':''?>">
			<?php foreach($select_result_service as $service){ ?>
			<div class="col-lg-4 col-md-6">
				<div class="card p-5 rounded-0">
					<h3 class="my-4 text-capitalize">Graphics Branding Design</h3>
					<p>It can change the way we feel about a company and the products & services they offer.</p>
				</div>
			</div>
			<?php } ?>
		</div>

		<div class="row align-items-center mt-5" data-aos="fade-up">
			<div class="col-lg-6 mt-5">
				<h2 class="mb-5 text-lg-2 text-white-50"><?=$after_assoc_work['title']?></h2>
			</div>
			<div class="col-lg-4 ml-auto text-right">
				<a href="<?=$after_assoc_work['action_link']?>" class="btn btn-main text-white smoth-scroll"><?=$after_assoc_work['action_name']?></a>
			</div>
		</div>
	</div>
</section>
<!-- Service End -->

<!-- Portfolio start -->
<section class="section" id="portfolio" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"><i class="ti-minus"></i>works</span>
					<h2 class="title">Portfolio</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="post_gallery owl-carousel owl-theme">
				<?php foreach($select_result_portfolio as $portfolio){ ?>
				<div class="item">
					<div class="portfolio-item position-relative">
						<img  src="upload/portfolio/<?=$portfolio['photo']?>" alt="" class="img-fluid">

						<div class="portoflio-item-overlay">
							<a href="portfolio-single.html"><i class="ti-plus"></i></a>
						</div>
					</div>
					<div class="text mt-3">
						<h4 class="mb-1 text-capitalize"><?=$portfolio['title']?></h4>
						<p class="text-uppercase letter-spacing text-sm"><?=$portfolio['sub_title']?></p>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<!-- Portfolio End -->

<!-- Tetsimonial start -->
<section id="testimonial" class="section testomionial" data-aos="fade-up">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="section-title">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>testimonial</span>
					<h1 class="title">What People Say About me</h1>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="testimonial-slider">
					<?php foreach($select_res as $testimonial){ ?>
					<div class="testimonial-item position-relative">
						<i class="ti-quote-left text-white-50"></i>
						<div class="testimonial-content">
							<p class="text-md mt-3"><?=$testimonial['description']?></p>

							<div class="media mt-5 align-items-center">
								<img src="upload/testimonial/<?=$testimonial['photo']?>" alt="" class="img-fluid  rounded-circle align-self-center mr-4">
								<div class="media-body">
									<h3 class="mb-0"><?=$testimonial['name']?></h3>
									<span class="text-muted"><?=$testimonial['name_about']?></span>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>	
		</div>
	</div>
</section>
<!-- Tetsimonial End -->

<!-- Contact start -->
<section class="section" id="contact" data-aos="fade-up">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="section-title text-center">
					<span class="text-color mb-0 text-uppercase letter-spacing text-sm"> <i class="ti-minus mr-2"></i>Contact</span>
					<h1 class="title">Get in Touch</h1>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-8">
					<form class="contact__form form-row contact-form" method="post" action="message_post.php">
					<div class="form-group col-lg-6 mb-5">
						<input type="text" id="name" name="name" class="form-control bg-transparent" placeholder="Your Name">
					</div>
					<div class="form-group col-lg-6 mb-5">
						<input type="text" name="email" id="email" class="form-control bg-transparent" placeholder="Your Email">
					</div>
					<div class="form-group col-lg-12 mb-5">
						<input type="text" name="subject" id="subject" class="form-control bg-transparent" placeholder="Your Subject">
					</div>
					
					<div class="form-group col-lg-12 mb-5">
						<textarea id="message" name="message" cols="30" rows="6" class="form-control bg-transparent" placeholder="Your Message"></textarea>
						
						<div class="text-center">
							 <input class="btn btn-main text-white mt-5" id="submit" name="submit" type="submit" class="btn btn-hero" value="Send Message">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- Contact End -->


    <!-- 
    Essential Scripts
    =====================================-->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/nav/jquery.easing.1.3.html"></script>
    
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="plugins/owl/owl.carousel.min.js"></script>
  
    <!-- Skill COunt -->
    <script src="plugins/counto/apear.js"></script>
    <script src="plugins/counto/counTo.js"></script>
    <!-- AOS Animation -->
    <script src="plugins/aos/aos.js"></script>
    
    <script src="js/script.js"></script>
    <script src="js/ajax-contact.html"></script>

  </body>
</html>
<?php
require 'footer.php';
?>

<!-- sweet alert for send message -->
<?php if(isset($_SESSION['message'])){ ?>
	<script>
		Swal.fire({
		position: 'center',
		icon: 'success',
		title: '<?=$_SESSION['message']?>',
		showConfirmButton: false,
		timer: 1500
})
	</script>
<?php }unset($_SESSION['message']) ?>