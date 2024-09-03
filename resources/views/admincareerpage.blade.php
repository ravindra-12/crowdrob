<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="author" content="SemiColonWeb">
	<meta name="description" content="crowdrob career ">

	<!-- Font Imports -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">

	<!-- Core Style -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- Font Icons -->
<link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">

<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<title>Career</title>

</head>

<body >

    @extends('dashboardlayout')

    
    @section('content')
	
	<div class="m-2">
        <a href="careerpost"  class="btn btn-primary">
            Update
        </a>
        
    </div>
	
		<section class="page-title page-title-parallax parallax scroll-detect dark">
			<img src="{{asset('images/parallax.jpg')}}" class="parallax-bg">
			<div class="container">
				<div class="page-title-row">

					<div class="page-title-content">
						<h1>Job Openings</h1>
						<span>Join our Fabulous Team of Intelligent Individuals</span>
					</div>

				

				</div>
			</div>
		</section>

		
	
		<section id="content">
			<div class="content-wrap">
				<div class="container">

					<div class="row col-mb-50">
						<div class="col-md-7">
							<div class="fancy-title title-bottom-border">
								<h3>Senior Python Developer</h3>
							</div>

                            <p> {!! $pageContent !!}</p>

							
							<a href="#" data-scrollto="#job-apply" class="button button-3d button-black m-0">Apply Now</a>

							<div class="divider divider-sm"><i class="bi-star-fill"></i></div>

						</div>

						<div class="col-md-5">
							<div id="job-apply" class="heading-block highlight-me">
								<h2>Apply Now</h2>
								<span>And we'll get back to you within 48 hours.</span>
							</div>

							<div class="form-widget">
								<div class="form-result"></div>

								<form action="include/form.php" id="template-jobform" name="template-jobform" class="row mb-0" method="post">

									<div class="form-process">
										<div class="css3-spinner">
											<div class="css3-spinner-scaler"></div>
										</div>
									</div>

									<div class="col-md-6 form-group">
										<label for="template-jobform-fname">First Name <small>*</small></label>
										<input type="text" id="template-jobform-fname" name="template-jobform-fname" value="" class="form-control required">
									</div>

									<div class="col-md-6 form-group">
										<label for="template-jobform-lname">Last Name <small>*</small></label>
										<input type="text" id="template-jobform-lname" name="template-jobform-lname" value="" class="form-control required">
									</div>

									<div class="w-100"></div>

									<div class="col-12 form-group">
										<label for="template-jobform-email">Email <small>*</small></label>
										<input type="email" id="template-jobform-email" name="template-jobform-email" value="" class="required email form-control">
									</div>

									<div class="col-md-6 form-group">
										<label for="template-jobform-age">Age <small>*</small></label>
										<input type="text" name="template-jobform-age" id="template-jobform-age" value="" size="22" tabindex="4" class="form-control required">
									</div>

									<div class="col-md-6 form-group">
										<label for="template-jobform-city">City <small>*</small></label>
										<input type="text" name="template-jobform-city" id="template-jobform-city" value="" size="22" tabindex="5" class="form-control required">
									</div>

									<div class="w-100"></div>

									<div class="col-12 form-group">
										<label for="template-jobform-service">Position <small>*</small></label>
										<select name="template-jobform-position" id="template-jobform-position"  tabindex="9" class="form-select required">
											<option value="">-- Select Position --</option>
											<option value="Senior Python Developer">Senior Python Developer</option>
											<option value="Design Analyst">Design Analyst</option>
											<option value="Head of UX and Design">Head of UX and Design</option>
											<option value="Web &amp; Visual Designer (Marketing)">Web &amp; Visual Designer (Marketing)</option>
										</select>
									</div>

									<div class="col-md-6 form-group">
										<label for="template-jobform-salary">Expected Salary</label>
										<input type="text" name="template-jobform-salary" id="template-jobform-salary" value="" size="22" tabindex="6" class="form-control">
									</div>

									<div class="col-md-6 form-group">
										<label for="template-jobform-time">Start Date</label>
										<input type="text" name="template-jobform-start" id="template-jobform-start" value="" size="22" tabindex="7" class="form-control">
									</div>

									<div class="w-100"></div>

									<div class="col-12 form-group">
										<label for="template-jobform-website">Website (if any)</label>
										<input type="text" name="template-jobform-website" id="template-jobform-website" value="" size="22" tabindex="8" class="form-control">
									</div>

									<div class="col-12 form-group">
										<label for="template-jobform-experience">Experience (optional)</label>
										<textarea name="template-jobform-experience" id="template-jobform-experience" rows="3" tabindex="10" class="form-control"></textarea>
									</div>

									<div class="col-12 form-group">
										<label for="template-jobform-application">Application <small>*</small></label>
										<textarea name="template-jobform-application" id="template-jobform-application" rows="6" tabindex="11" class="form-control required"></textarea>
									</div>

									<div class="col-12 form-group d-none">
										<input type="text" id="template-jobform-botcheck" name="template-jobform-botcheck" value="" class="form-control">
									</div>

									<div class="col-12 form-group">
										<button class="button button-3d button-large w-100 m-0" name="template-jobform-apply" type="submit" value="apply">Send Application</button>
									</div>

									<input type="hidden" name="prefix" value="template-jobform-">

								</form>
							</div>

						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- #content end -->

	
		
        @endsection

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="uil uil-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="js/plugins.min.js"></script>
	<script src="js/functions.bundle.js"></script>

</body>
</html>