<template>
    <div class="mb-3">
        <label :for="fields.number.name" class="form-label">{{ fields.number.label }}</label>
        <input v-model="value"
           :type="fields.number.type"
           :id="fields.number.name"
            class="form-control">
        <div class="form-text">{{ fields.number.caption }}</div>
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
        this.value = this.fields.number.value
    },
    methods: {
        getValues() {
            return new Map([
                [this.fields.number.name, this.value]
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
