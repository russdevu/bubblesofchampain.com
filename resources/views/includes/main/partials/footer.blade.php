<footer id="footer" class="section bg-gray-800 px-10" data-scroll-section>
	<div class="container">
		<div class="footer__inner">
			<div>
				<!-- Copyright -->
				<div class="footer__section copyright">
					<h3 class="footer__section--title">&times;&times;&times;</h3>
					<div class="copyright">
						<h3 class="copyright__brand">
							{{ config('app.name') }}
						</h3>
						<p class="copyright__copy">
							&copy; 2014-2021
							<br>
							{{ __('All rights reserved.') }}
						</p>
						<img class="copyright__img" src="{{asset('images/transparent/logo-circle.png')}}" alt="">
					</div>
				</div>

				<!-- Ctas -->
				<div class="footer__section footer__ctas">
					<h3 class="footer__section--title">&times;&times;&times;</h3>
					<ul class="footer__section--list">
						<li>
							<button type="button" id="backToTop" class="footer__ctas--item back-to-top">
								<svg class="footer__ctas--svgs">
									<use xlink:href="/sprite.svg#backToTop"></use>
								</svg>
								{{ __('Back to top') }}
							</button>
						</li>
						<li>
							<a href="#" class="footer__ctas--item cta-poms">
								<svg class="footer__ctas--svgs">
									<use xlink:href="/sprite.svg#search"></use>
								</svg>
								{{ __('Browse poms') }}
							</a>
						</li>
					</ul>
				</div>
				
				<!-- Social -->
				<div class="footer__section">
					<h3 class="footer__section--title">&times;&times;&times;</h3>
					<ul class="footer__section--list social">
						<li>
							<a href="#" class="social__item">
								<svg>
									<use xlink:href="/sprite.svg#inst"></use>
								</svg>
							</a>
						</li>
						<li>
							<a href="#" class="social__item">
								<svg>
									<use xlink:href="/sprite.svg#fb"></use>
								</svg>
							</a>
						</li>
						<li>
							<a href="#" class="social__item">
								<svg>
									<use xlink:href="/sprite.svg#wp"></use>
								</svg>
							</a>
						</li>
					</ul>
				</div>
				
				<!-- Navigation -->
				<div class="footer__section">
					<h3 class="footer__section--title">&times;&times;&times;</h3>
					<ul class="footer__section--list">
						<li>
							<a href="#" class="social__item">{{ __('pomeranian') }}</a>
						</li>
						<li>
							<a href="#" class="social__item">{{ __('gallery') }}</a>
						</li>
						<li>
							<a href="#" class="social__item">{{ __('news') }}</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="text-red-500">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, dolore!
			</div>
		</div>
	</div>
</footer>