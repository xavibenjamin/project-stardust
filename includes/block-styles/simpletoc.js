import { registerBlockStyle } from '@wordpress/blocks';

function registerDriverStyles() {
	registerBlockStyle('simpletoc/toc', [
		{
			label: 'Default',
			name: 'simpletoc-wrapper',
			isDefault: true,
		},
	]);
}

wp.domReady(() => {
	registerDriverStyles();
});
