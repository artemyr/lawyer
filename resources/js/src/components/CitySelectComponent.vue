<template>
    <div class="city-select">
        <div class="city-select__select">
            <model-list-select
                :list="options"
                v-model="city"
                option-value="id"
                option-text="name"
                id="mySelectId"
                name="mySelectName"
                placeholder="Выберите город"
                @searchchange="printSearchText"
                @blur="handleBlur"
                @update:model-value="handleChange"
            />
        </div>
        <div class="city-select__reset">
            <button @click.prevent="reset">
                Сбросить
                <svg>
                    <use xlink:href="/svg/sprite.svg#icon-close"></use>
                </svg>
            </button>
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

<style lang="scss">
    .city-select {
        display: grid;
        grid-auto-flow: column;
        grid-template-columns: repeat(2, 1fr);
        align-items: center;

        .city-select__select {
            .search, .dropdown {
                min-height: 60px;
                cursor: pointer;
            }

            .ui.selection.active.dropdown {
                border-radius: 8px!important;
            }

            .search.selection, .ui.selection.dropdown .menu {
                border: none;
                border-radius: 8px;
            }

            .dropdown {
                display: grid;
                align-items: center;
            }

            .ui.selection.dropdown .menu {
                margin-top: 4px;
            }
        }

        .city-select__reset {
            display: grid;
            align-items: center;
            justify-content: end;

            button {
                background: transparent;
                border: none;
                color: #888CA2;
                display: grid;
                grid-auto-flow: column;
                align-items: center;

                svg {
                    height: 20px;
                    width: 20px;
                }
            }
        }
    }
</style>
