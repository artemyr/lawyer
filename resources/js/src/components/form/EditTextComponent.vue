<template>
    <div class="mb-3">
        <label :for="fields.text.name" class="form-label">{{ fields.text.label }}</label>
        <input v-model="text"
               :type="fields.text.type"
               :id="fields.text.name"
               :placeholder="fields.text.placeholder"
               class="form-control">
        <div class="form-text">{{ fields.text.caption }}</div>
    </div>
</template>

<script lang="ts">
export default {
    props: ['fields'],
    data() {
        return {
            text: '',
        }
    },
    mounted() {
        this.text = this.fields.text.value
    },
    methods: {
        getValues() {
            return new Map([
                [this.fields.text.name, this.text]
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
