window._ = require("lodash");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

window.EditorJS = require("@editorjs/editorjs");
window.DragDrop = require("editorjs-drag-drop");
window.Tooltip = require("editorjs-tooltip");
window.Hyperlink = require("editorjs-hyperlink-upgrade");
window.HeaderEditor = require("@editorjs/header");
window.ImageTool = require("@editorjs/image");
window.Table = require("@editorjs/table");
window.TextAlign = require("@canburaks/text-align-editorjs");
window.Code = require("@groupher/editor-code");
window.Quote = require("@groupher/editor-quote");
window.Checklist = require("@demoflow/checklist");
window.BreakLine = require("editorjs-break-line");
window.List = require("@editorjs/list");
window.NestedList = require("@editorjs/nested-list");
window.Underline = require("@editorjs/underline");
window.Marker = require("@editorjs/marker");
window.edjsHTML = require("editorjs-html");
