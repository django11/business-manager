require('./bootstrap');

import { createApp } from 'vue'
import LatestCompaniesWidget from "./vue/widgets/LatestCompaniesWidget";

const app = createApp({})

app.component('latest-companies-widget', LatestCompaniesWidget)

app.mount('#app')
