import { createApp } from 'vue'
import App from './views/App.vue'

/* Bootstrap CSS and JS */
import "../node_modules/bootstrap/dist/css/bootstrap.css";
import "../node_modules/bootstrap/dist/js/bootstrap.bundle";

/* Main CSS File */
import "./styles.css";

import routes from './routes/routes.js'

createApp(App).use(routes).mount('#app')
