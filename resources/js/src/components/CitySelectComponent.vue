<template>
    <div class="city-select">
        <div>
            <model-list-select
                :list="options"
                v-model="city"
                option-value="id"
                option-text="name"
                id="mySelectId"
                name="mySelectName"
                placeholder="select item"
                @searchchange="printSearchText"
                @blur="handleBlur"
                @update:model-value="handleChange"
            />
        </div>
        <div>
            <button @click.prevent="reset">Сбросить</button>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";
import { ModelListSelect } from "vue-search-select";
import "vue-search-select/dist/VueSearchSelect.css"

export default defineComponent({
    components: {ModelListSelect},
    mounted() {
        this.get(`/api/cities/all`);
    },
    data() {
        return {
            options: [],
            city: {
                id: 0,
                name: "",
                link: "",
            },
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
            this.city = null
        },
        printSearchText(searchText) {
            this.searchText = searchText
        },
        handleBlur() {
            console.log("handleBlur")
        },
        handleChange() {
            location.href = this.city.link + '?setCity=' + this.city.link
        }
    }
})
</script>

<style lang="scss" scoped>
    .city-select {
        display: grid;
        grid-auto-flow: column;
        grid-template-columns: repeat(2, 1fr);
    }
</style>
