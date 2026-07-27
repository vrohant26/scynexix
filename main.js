/**
 * Scynexis Main JavaScript
 *
 * @package Scynexis
 */

(function() {
	document.addEventListener('DOMContentLoaded', function() {
		var menuToggle = document.querySelector('.menu-toggle');
		var mainNavigation = document.querySelector('.main-navigation');

		if (menuToggle && mainNavigation) {
			menuToggle.addEventListener('click', function() {
				var isOpen = mainNavigation.classList.contains('open');
				if (isOpen) {
					mainNavigation.classList.remove('open');
					menuToggle.classList.remove('active');
					menuToggle.setAttribute('aria-expanded', 'false');
				} else {
					mainNavigation.classList.add('open');
					menuToggle.classList.add('active');
					menuToggle.setAttribute('aria-expanded', 'true');
				}
			});
		}
		// Simulated Ticker Live Updates
		var stockPriceEls = document.querySelectorAll('.stock-price-val');
		var stockChangeEls = document.querySelectorAll('.stock-change');
		var changeValEls = document.querySelectorAll('.change-val');
		var indicatorEls = document.querySelectorAll('.change-indicator');

		if (stockPriceEls.length > 0 && stockChangeEls.length > 0) {
			var basePrice = parseFloat(stockPriceEls[0].textContent);
			var initialPercent = parseFloat(changeValEls[0].textContent) || 1.00;

			setInterval(function() {
				// Random minor price fluctuation between -$0.02 and +$0.02
				var delta = (Math.random() * 0.04 - 0.02);
				basePrice += delta;
				
				var formattedPrice = basePrice.toFixed(2);
				var changePercent = initialPercent + (delta * 2.2);
				var formattedPercent = (changePercent < 0 ? '' : '+') + changePercent.toFixed(2) + '%';
				var isUp = changePercent >= 0;

				stockPriceEls.forEach(function(el) {
					el.textContent = formattedPrice;
				});

				stockChangeEls.forEach(function(el) {
					el.className = 'stock-change ' + (isUp ? 'up' : 'down');
				});

				indicatorEls.forEach(function(el) {
					el.innerHTML = isUp ? '&uarr;' : '&darr;';
				});

				changeValEls.forEach(function(el) {
					el.textContent = formattedPercent;
				});
			}, 4000);
		}

		// Top Bar Slider on Mobile
		var topBarItems = document.querySelectorAll('.top-bar-ticker .top-bar-item');
		var topBarPrev = document.querySelector('.top-bar-arrow.prev');
		var topBarNext = document.querySelector('.top-bar-arrow.next');

		if (topBarItems.length > 0 && topBarPrev && topBarNext) {
			var currentSlide = 0;

			// Initialize first item as active
			topBarItems[currentSlide].classList.add('active');

			function showSlide(index) {
				topBarItems[currentSlide].classList.remove('active');
				currentSlide = (index + topBarItems.length) % topBarItems.length;
				topBarItems[currentSlide].classList.add('active');
			}

			topBarPrev.addEventListener('click', function() {
				showSlide(currentSlide - 1);
			});

			topBarNext.addEventListener('click', function() {
				showSlide(currentSlide + 1);
			});

			// Auto slide every 5 seconds on mobile
			setInterval(function() {
				if (window.innerWidth <= 768) {
					showSlide(currentSlide + 1);
				}
			}, 5000);
		}

		// News Slider Navigation Scroll Handlers
		var newsTrack = document.querySelector('.news-track');
		var newsPrevBtn = document.querySelector('.news-nav-prev');
		var newsNextBtn = document.querySelector('.news-nav-next');

		if (newsTrack && newsPrevBtn && newsNextBtn) {
			newsNextBtn.addEventListener('click', function() {
				newsTrack.scrollBy({ left: 300, behavior: 'smooth' });
			});

			newsPrevBtn.addEventListener('click', function() {
				newsTrack.scrollBy({ left: -300, behavior: 'smooth' });
			});
		}
		// FAQ Accordion Toggle Handlers
		var faqTriggers = document.querySelectorAll('.faq-trigger');

		if (faqTriggers.length > 0) {
			faqTriggers.forEach(function(trigger) {
				trigger.addEventListener('click', function() {
					var faqItem = this.parentElement;
					var isOpen = faqItem.classList.contains('open');

					// Close all open items first for a single-accordion collapse
					document.querySelectorAll('.faq-item.open').forEach(function(openItem) {
						if (openItem !== faqItem) {
							openItem.classList.remove('open');
							openItem.querySelector('.faq-trigger').setAttribute('aria-expanded', 'false');
						}
					});

					// Toggle current item
					if (isOpen) {
						faqItem.classList.remove('open');
						this.setAttribute('aria-expanded', 'false');
					} else {
						faqItem.classList.add('open');
						this.setAttribute('aria-expanded', 'true');
					}
				});
			});
		}
	});
})();
