import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

export default new Vuetify({
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