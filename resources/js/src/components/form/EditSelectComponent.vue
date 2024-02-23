<template>
    <div class="mb-3">
        <label :for="fields.select.name" class="form-label">{{ fields.select.label }}</label>
        <select v-model="value" :id="fields.select.name" class="form-control">
            <option :value="null">-</option>
            <option v-for="value in values" :value="value.id">{{ value.label }}</option>
        </select>
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
