<template>
    <span v-html="value"></span>
</template>

<script>
import signatureMixin from '../mixins';

export default {
    mixins: [signatureMixin],

    props: ['resourceName', 'field'],

    computed: {
        value() {
            return this.isValidImgValue(this.field.value) ? this.__('Yes') : this.__('No');
        }
    }
}
</script>
