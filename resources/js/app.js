require("./bootstrap");

import { createApp } from "vue";
import ProductFilter from "./components/ProductFilter";

const app = createApp({});
app.component("product-filter", ProductFilter);
app.mount("#app");
