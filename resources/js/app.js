import { createApp } from "vue";
import App from "./src/App.vue";
import Router from "./src/router/router.js";
import Store from "./src/store/store.js";
import CitySelectComponent from "./src/components/CitySelectComponent.vue";

import './bootstrap';

createApp(App)
    .use(Router)
    .use(Store)
    .mount('App')

createApp(CitySelectComponent)
    .mount('city-select-component')
