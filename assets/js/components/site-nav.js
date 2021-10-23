/**
 * Site Nav
 * - seen in the header of the site
 */

const navigation = document.getElementById('js-site-nav-menu');
const toggle = document.getElementById('js-site-navigation-toggle');
const scrim = document.getElementById('js-site-nav-scrim');

/**
 * Handle Click
 */
const handleClick = () => {
	const isHidden = navigation.getAttribute('aria-hidden');

	if (isHidden === "true") {
		showNavigation();
	} else {
		hideNavigation();
	}
}

/**
 * Handle Escape Key
 *
 * @param {object} e the event
 */
const handleEscapeKey = (e) => {
	const { key } = e;

	if (key === "Escape") {
		hideNavigation();
		toggle.focus();
	}
}

/**
 * Show Navigation
 */
const showNavigation = () => {
	toggle.classList.add('site-nav__toggle--active');
	toggle.setAttribute('aria-expanded', 'true');
	navigation.setAttribute('aria-hidden', 'false');
	scrim.classList.add('site-nav__scrim--active');
	document.body.classList.add('site-navigation-is-open');
}

/**
 * Hide Navigation
 */
const hideNavigation = () => {
	toggle.classList.remove('site-nav__toggle--active');
	toggle.setAttribute('aria-expanded', 'false');
	navigation.setAttribute('aria-hidden', 'true');
	scrim.classList.remove('site-nav__scrim--active');
	document.body.classList.remove('site-navigation-is-open');
}

/**
 * Setup Event Listeners
 */
const addEventListeners = () => {
	toggle.addEventListener('click', handleClick);
	document.addEventListener('keyup', handleEscapeKey);
}

/**
 * Initializing Function
 */
export default function init() {
	if (!navigation && !toggle) { return; }
	addEventListeners();
}
