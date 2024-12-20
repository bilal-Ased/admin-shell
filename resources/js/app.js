// resources/js/app.js
import "@fortawesome/fontawesome-free/css/all.min.css";
import flatpckr from "flatpickr";
window.flatpckr = flatpckr;

import { createApp } from "vue";
import Chatbox from "./chat/Chatbox.vue";

const app = createApp({});

// Register the Chatbox component
app.component("chatbox", Chatbox);

// Mount the app to the specified element
app.mount("#app");

import "material-components-web/dist/material-components-web.min.css";
import { MDCTextField } from "@material/textfield";

// Initialize MDC components when the page loads
document.addEventListener("DOMContentLoaded", () => {
    const textFields = [].map.call(
        document.querySelectorAll(".mdc-text-field"),
        function (el) {
            return new MDCTextField(el);
        }
    );
});
