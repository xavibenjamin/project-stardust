/**
 * PostCSS configuration
 */
const path = require('path');

module.exports = ({ file, env }) => {
	const config = {
		plugins: {
			'postcss-import': {},
			'postcss-preset-env': {
				stage: 1
			},
			'postcss-nesting': {},
		},
	};

	if (path.basename(file) === 'editor.css') {
		config.plugins['postcss-editor-styles'] = {
			scopeTo: '.editor-styles-wrapper',
			ignore: [':root', '.edit-post-visual-editor.editor-styles-wrapper', '.wp-toolbar'],
			remove: ['html', ':disabled', '[readonly]', '[disabled]', '.wp-block-code', 'code', ':selection'],
			tags: ['button', 'input', 'label', 'select', 'textarea', 'form'],
		};
	}

	config.plugins.cssnano =
		env === 'production'
			? {
				preset: 'default',
			} : false;

	return config;
};
