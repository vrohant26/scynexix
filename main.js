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
	});
})();
