<template>
    <div class="mb-3 form-check">
        <input v-model="value"
           :type="fields.checkbox.type"
           :id="fields.checkbox.name"
            class="form-check-input">
        <label :for="fields.checkbox.name" class="form-check-label">{{ fields.checkbox.label }}</label>
        <div class="form-text">{{ fields.checkbox.caption }}</div>
    </div>
</template>

<script lang="ts">
export default {
    props: ['fields'],
    data() {
        return {
            value: false,
        }
    },
    mounted() {
        this.value = Boolean(this.fields.checkbox.value)
    },
    methods: {
        getValues() {
            return new Map([
                [this.fields.checkbox.name, this.value]
            ])
        },
        check() {
            return true
        }
    }
}
</script>

<style lang="scss" scoped>
.form-text {
    color: white;
}
</style>
