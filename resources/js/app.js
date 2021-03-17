require('./bootstrap');
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

// components
// Vue.component('counter-component', require('./components/CounterComponent.vue').default);
Vue.component('image-component', require('./components/ImageComponent.vue').default);
Vue.component('car-component', require('./components/CarComponent.vue').default);


const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        theme: {
            themes: {
                light: {
                    primary: '#283D3B',
                    secondary: '#197278',
                    accent: '#D7D9CE',
                    error: '#E63946',
                },
            },
        },
    })
});
