<template>
    <div class="mb-3">
        <label class="form-label">{{ name }}</label>
        <model-list-select
            :list="options"
            v-model="$parent.entity[id]"
            option-value="id"
            option-text="name"
            id="mySelectId"
            name="mySelectName"
            placeholder="select item"
            @searchchange="printSearchText"
            @blur="handleBlur"
        />
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";
import { ModelListSelect } from "vue-search-select";
import "vue-search-select/dist/VueSearchSelect.css"

export default defineComponent({
    components: {ModelListSelect},
    props: ['id', 'name', 'url'],
    mounted() {
        this.get(`/api/admin/${this.url}`);
    },
    data() {
        return {
            options: [],
            objectItem: null,
            searchText: "",
        }
    },
    methods: {
        get(link) {
            axios.get(link)
                .then(res => {
                    this.options = res.data.data
                })
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
})
</script>

<style lang="scss" scoped>

</style>
