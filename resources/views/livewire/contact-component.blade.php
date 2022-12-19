<div>
    	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="/">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h4>Get in touch</h4>
									<h3>Write us a message</h3>
								</div>
                                @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
								<form class="form" action="" wire:submit.prevent="sendMessage">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Name<span>*</span></label>
												<input  type="text" placeholder="" wire:model="name">
                                                @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Subject<span>*</span></label>
												<input  type="text" placeholder=""  wire:model="subject">
                                                @error('subject')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Email<span>*</span></label>
												<input  type="email" placeholder=""  wire:model="email">
                                                @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Phone<span>*</span></label>
												<input  type="text" placeholder=""  wire:model="phone">
                                                @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
											</div>
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>your message<span>*</span></label>
												<textarea  placeholder=""  wire:model="comment"></textarea>
                                                @error('comment')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Send Message</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Call us Now:</h4>
									<ul>
										<li>{{$setting->phone }}</li>
                                        @if ($setting->phone2)
										<li>{{ $setting->phone2 }}</li>
                                        @endif
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">{{ $setting->email }}</a></li>
										{{-- <li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li> --}}
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">Our Address:</h4>
									<ul>
										<li>{{ $setting->address }}</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
</div>
