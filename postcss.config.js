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

	config.plugins.cssnano =
		env === 'production'
			? {
				preset: 'default',
			} : false;

	return config;
};
