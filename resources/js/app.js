import "./bootstrap";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import Home from "@/components/Home.vue";
import { createPinia } from "pinia";

const app = createApp({});
const pinia = createPinia();

app.component("home-component", Home);

app.use(pinia);
app.mount("#app");
