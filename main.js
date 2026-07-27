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

		if (stockPriceEls.length > 0 && stockChangeEls.length > 0) {
			var basePrice = parseFloat(stockPriceEls[0].textContent);
			var changeValElFirst = stockChangeEls[0].querySelector('.change-val');
			var initialPercent = changeValElFirst ? parseFloat(changeValElFirst.textContent) : 3.7; // Base change parsed dynamically

			setInterval(function() {
				// Random minor price fluctuation between -$0.02 and +$0.02
				var delta = (Math.random() * 0.04 - 0.02);
				basePrice += delta;
				
				// Format to 2 decimal places
				var formattedPrice = basePrice.toFixed(2);
				stockPriceEls.forEach(function(el) {
					el.textContent = formattedPrice;
				});
				
				// Update percentage change slightly
				var changePercent = initialPercent + (delta * 2.2); // Adjust multiplier for realistic fluctuation
				var isDown = changePercent < 0;
				var formattedPercent = (isDown ? '' : '+') + changePercent.toFixed(2) + '%';
				var indicatorHTML = isDown ? '&darr;' : '&uarr;';

				stockChangeEls.forEach(function(changeEl) {
					changeEl.className = 'stock-change ' + (isDown ? 'down' : 'up');
					var ind = changeEl.querySelector('.change-indicator');
					var val = changeEl.querySelector('.change-val');
					if (ind) ind.innerHTML = indicatorHTML;
					if (val) val.textContent = formattedPercent;
				});
			}, 4000);
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
