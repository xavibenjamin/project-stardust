import { registerBlockStyle } from '@wordpress/blocks';

function registerDriverStyles() {
	registerBlockStyle('stardust/driver', [
		{
			label: 'Default',
			name: 'default',
			isDefault: true,
		},
		{
			label: 'Success',
			name: 'success',
		},
		{
			label: 'Danger',
			name: 'danger',
		},
	]);
}

wp.domReady(() => {
	registerDriverStyles();
});
