<template>
    <panel-item :field="field">
        <template v-slot:value>
            <div v-if="isValidImgValue(field.value)">
                <img :src="field.value" class="img-responsive">
            </div>
            <p v-else>&mdash;</p>
        </template>
    </panel-item>
</template>

<script>
import signatureMixin from '../mixins';

export default {
    mixins: [signatureMixin],

    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
