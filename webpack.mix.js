const $ = require('jquery');
const mix = require("laravel-mix");

mix.styles(
    [
        "node_modules/bootstrap/dist/css/bootstrap.min.css",
        "resources/css/app.css"
    ],
    "public/css/app.css"
).version();

mix.js(
    [ 
        "resources/js/app.js"
    ], 
    "public/js"
).version();

mix.js(
    [ 
        "resources/js/app.js",
        "resources/js/dashboard.js"
    ], 
    "public/js/dashboard.js"
).version();

mix.copy("node_modules/jquery/dist/jquery.min.js", "public/js");

mix.disableNotifications();
