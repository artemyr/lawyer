<template>
    <div class="mb-3">
        <label class="form-label">{{ fields.select.label }}</label>
        <multi-list-select
            :list="options"
            :selected-items="value"
            option-value="id"
            option-text="label"
            @select="onSelect"
        />
        <div class="form-text">{{ fields.select.caption }}</div>
    </div>
</template>

<script lang="ts">
import {ModelListSelect, MultiListSelect} from "vue-search-select";
import "vue-search-select/dist/VueSearchSelect.css"

export default {
    components: {ModelListSelect, MultiListSelect},
    props: ['fields'],
    mounted() {
        this.options = this.fields.select.values
        if (this.fields.select.value) {

            this.fields.select.value.map(function (id) {

                let label = this.options.find(function(el){
                    return el.id == id
                }).label

                this.value.push({
                    id: id,
                    label: label
                })
            }.bind(this))
        }
    },
    data() {
        return {
            value: [],
            options: [],
            objectItem: null,
            searchText: "",
            lastSelectItem: {}
        }
    },
    methods: {
        onSelect (items, lastSelectItem) {
            this.value = items
            this.lastSelectItem = lastSelectItem
        },
        getValues() {
            let result = [];
            this.value.map(function (item) {
                if (item.id) {
                    result.push(item.id)
                }
            }.bind(this))

            return new Map([
                [this.fields.select.name, result]
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
