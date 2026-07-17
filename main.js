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
	});
})();
