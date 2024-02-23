<template>
    <div class="mb-3">
        <label class="form-label">{{ fields.select.label }}</label>
        <model-list-select
            :list="options"
            v-model="value"
            option-value="id"
            option-text="label"
            id="mySelectId"
            name="mySelectName"
            placeholder="select item"
            @searchchange="printSearchText"
            @blur="handleBlur"
        />
        <div class="form-text">{{ fields.select.caption }}</div>
    </div>
</template>

<script lang="ts">
import { ModelListSelect } from "vue-search-select";
import "vue-search-select/dist/VueSearchSelect.css"

export default {
    components: {ModelListSelect},
    props: ['fields'],
    mounted() {
        this.options = this.fields.select.values
        this.value = this.fields.select.value
    },
    data() {
        return {
            value: '',

            options: [],
            objectItem: null,
            searchText: "",
        }
    },
    methods: {
        getValues() {
            return new Map([
                [this.fields.select.name, this.value]
            ])
        },
        check() {
            return true
        },
        reset() {
            this.objectItem = {}
        },
        printSearchText(searchText) {
            this.searchText = searchText
        },
        handleBlur() {
            console.log("handleBlur")
        },
    }
}
</script>

<style lang="scss" scoped>
.form-text {
    color: white;
}
</style>
