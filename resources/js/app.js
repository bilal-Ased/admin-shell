// resources/js/app.js

import { createApp } from "vue";
import Chatbox from "./chat/Chatbox.vue";

const app = createApp({});

// Register the Chatbox component
app.component("chatbox", Chatbox);

// Mount the app to the specified element
app.mount("#app");
