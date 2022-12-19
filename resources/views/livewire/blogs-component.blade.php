	<!-- Start Shop Blog  -->
	<section class="shop-blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>From Our Blog</h2>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach ($blogs as $blog)

				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
						    <img src="{{ asset('images/blogs') }}/{{ $blog->image }}" alt="{{ $blog->name }}">
                        </a>
						<div class="content">
							<p class="date">{{ $blog->created_at }}</p>
							<a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="title">{{ $blog->name }}</a>
							<a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="more-btn">{{ $blog->description }}</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>
                @endforeach

			</div>
		</div>
	</section>
	<!-- End Shop Blog  -->
