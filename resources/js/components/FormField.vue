<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <vue-signature ref="signature"
                           :h="height"
                           :w="width"
                           :disabled="disabled"
                           :sig-option="{penColor: color, backgroundColor: bgColor}"
                           class="w-full form-input-bordered p-0"
            ></vue-signature>

            <div class="py-3">
                <button type="button"
                        class="btn btn-link dim cursor-pointer text-80 mr-3"
                        @click.stop="reset"
                >{{ __('Cancel') }}</button>
                <button type="button"
                        class="btn btn-link dim cursor-pointer text-80"
                        @click.stop="save"
                        v-if="!saveOnChanges"
                >{{ __('Attach') }}</button>
            </div>

            <textarea name="signature"
                      :id="field.name"
                      style="display: none;"
                      v-model="value"
            >{{ value }}</textarea>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data() {
        return {
            height: '250px',
            width: '100%',
            color: 'black',
            bgColor: 'white',
            disabled: false,
            saveOnChanges: false,
        }
    },

    beforeMount() {
        this.width = this.field.width || this.width;
        this.height = this.field.height || this.height;
        this.color = this.field.color || this.color;
        this.bgColor = this.field.bgColor || this.bgColor;
        this.saveOnChanges = this.field.saveOnChanges || this.saveOnChanges;
    },

    mounted() {
        this.$nextTick().then(() => {
            if (this.field.value) {
                this.value = this.field.value;
                this.$refs.signature.fromDataURL(this.value);
            }
        });

		this.$watch(
			() => {
				return this.$refs.signature.sig._data;
			},
            () => {
				this.save();
			}
		);
    },

    methods: {
        setInitialValue() {
            this.value = this.field.value || null;
        },

        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        handleChange(value) {
            this.value = value
        },

        save() {
            if (this.$refs.signature.isEmpty()) {
                this.value = null;
            } else {
                this.value = this.$refs.signature.save();
            }
        },

        reset() {
            this.$refs.signature.clear();
        }
    },
}
</script>
