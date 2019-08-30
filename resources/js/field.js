import vueSignature from 'vue-signature'

Nova.booting((Vue, router, store) => {
    Vue.use(vueSignature)
    Vue.component('index-nova-signature', require('./components/IndexField'))
    Vue.component('detail-nova-signature', require('./components/DetailField'))
    Vue.component('form-nova-signature', require('./components/FormField'))
})
