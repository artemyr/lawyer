<template>
    <div class="mb-3">
        <label :for="fields.select.name" class="form-label">{{ fields.select.label }}</label>
        <select v-model="value" :id="fields.select.name" multiple class="form-control">
            <option v-for="value in values" :value="value.id">{{ value.label }}</option>
        </select>
        <div class="form-text">{{ fields.select.caption }}</div>

    </div>
</template>

<script>
export default {
    data () {
        return {
            value: '',
            values: []
        }
    },
    props: ['fields'],
    mounted() {
        this.values = this.fields.select.values
        this.value = this.fields.select.value
    },
    methods: {
        getValues() {
            return new Map([
                [this.fields.select.name, this.value]
            ])
        },
        check() {
            return true
        }
    }
}
</script>

<style>
.form-text {
    color: white;
}</style>
