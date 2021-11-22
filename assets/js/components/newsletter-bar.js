/**
 * Newsletter Bar
 */

const newsletterBar = document.getElementById('js-newsletter-bar');
const closeButton = document.getElementById('js-newsletter-bar-close');
let isHidden = localStorage.getItem('hide_newsletter_bar') ? true : false;

/**
 * Show the Newsletter Bar
 */
const showNewsletterBar = () => {
	newsletterBar.classList.add('newsletter-bar--is-active');
	newsletterBar.classList.remove('newsletter-bar--is-hidden');
	newsletterBar.setAttribute('aria-hidden', 'false');
	document.body.style.paddingBottom = newsletterBar.offsetHeight + 'px';
}

/**
 * Hide the Newsletter Bar
 */
const hideNewsletterBar = () => {
	newsletterBar.classList.add('newsletter-bar--is-hidden');
	newsletterBar.classList.remove('newsletter-bar--is-active');
	newsletterBar.setAttribute('aria-hidden', 'true');
	document.body.style.paddingBottom = 0;
}

/**
 * Close the Newsletter Bar
 */
const closeNewsletterBar = () => {
	newsletterBar.classList.remove('newsletter-bar--is-active');
	newsletterBar.classList.remove('newsletter-bar--is-hidden');
	newsletterBar.setAttribute('aria-hidden', 'false');
	localStorage.setItem('hide_newsletter_bar', 'true');
	document.body.style.paddingBottom = 0;
	isHidden = true;
}

/**
 * Handle the Window Scroll
 */
const handleWindowScroll = () => {
	if (isHidden === true) { return; }
	if (window.scrollY >= 100) {
		showNewsletterBar();
	} else {
		hideNewsletterBar();
	}
}

export default function init() {
	if (!newsletterBar && !closeButton || isHidden === true) { return; }
	closeButton.addEventListener('click', closeNewsletterBar);
	window.addEventListener('scroll', handleWindowScroll);
}
