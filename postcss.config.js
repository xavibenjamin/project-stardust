/**
 * PostCSS configuration
 */

module.exports = ({ env }) => ({
  plugins: {
    'postcss-import': {},
    'postcss-preset-env': {
      stage: 1
    },
    'postcss-nesting': {},

    // Minify style on production using cssano.
    cssnano: 'production' === env ?
      {
        preset: 'default',
      } : false,
  },
});
