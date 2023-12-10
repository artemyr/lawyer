<template>
    <div>
        <h1>Редактировать категории</h1>

        <form v-if="this.entity">
            <EditNameLinkComponent
                :id="'name'"
                :name="'Город'"
                :type="'text'"
                :placeholder="'Введите город'"
                :help="'(Краснодар, Москва, ...)'"
            />

            <EditTextComponent
                :id="'icon'"
                :name="'Иконка'"
                :type="'text'"
                :placeholder="'Введите код иконки'"
                :help="'(car, house, ...)'"
            />

            <SearchSelectComponent
                :id="'city_id'"
                :name="'Город'"
                :url="'cities/all'"
            />

            <button :disabled="!isDisabled" @click.prevent="update(true)" type="submit" class="btn btn-success">Save</button>
            <button :disabled="!isDisabled" @click.prevent="update(false)" type="submit" class="btn btn-primary">Apply</button>
        </form>

    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";
import EditNameLinkComponent from "../../../components/form/EditNameLinkComponent.vue";
import EditTextComponent from "../../../components/form/EditTextComponent.vue";
import SearchSelectComponent from "../../../components/SearchSelectComponent.vue";

export default defineComponent({
    components: {SearchSelectComponent, EditNameLinkComponent, EditTextComponent,},
    mounted() {
        this.get(`/api/admin/categories/${this.$route.params.id}`);
    },
    data() {
        return {
            entity: null,
        }
    },
    methods: {
        get(link) {
            axios.get(link)
                .then(res => {
                    this.entity = res.data.data
                })
        },
        update(toIndex) {
            let data = {
                name: this.entity.name,
                link: this.entity.link,
                icon: this.entity.icon,
            }

            if (this.entity.city_id > 0) {
                data.city_id = this.entity.city_id;
            }

            axios.patch(`/api/admin/categories/${this.$route.params.id}`, data)
                .then(res => {
                    if (toIndex){
                        // this.$router.push({name:'admin.city.show', params: {id: this.$route.params.id}})
                        this.$router.push({name:'admin.category.index'})
                    } else {
                        // this.$router.push({name:'admin.review.edit', params: {id: this.$route.params.id}})
                        this.errors = {"Статус": ["Сохранено"]}
                        document.querySelector('body').scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
                    }
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                })
        },
    },
    computed: {
        isDisabled() {
            return this.entity.name && this.entity.link;
        }
    }
})
</script>

<style lang="scss" scoped>

</style>
