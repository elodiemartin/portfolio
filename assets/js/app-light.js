/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
const $ = require('jquery');
global.$ = global.jQuery = $;
import '../../node_modules/bootstrap/dist/css/bootstrap.min.css';
require('../../node_modules/bootstrap/dist/js/bootstrap.js');
require('../js/menu-front.js');
require('../scss/front.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery'); 