<template>
    <div>
        <h1>Редактировать города</h1>

        <form v-if="this.entity">
            <EditNameLink
                :id="'name'"
                :name="'Город'"
                :type="'text'"
                :placeholder="'Введите город'"
                :help="'(Краснодар, Москва, ...)'"
            />

            <button :disabled="!isDisabled" @click.prevent="update(true)" type="submit" class="btn btn-success">Save</button>
            <button :disabled="!isDisabled" @click.prevent="update(false)" type="submit" class="btn btn-primary">Apply</button>
        </form>

    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";
import EditNameLink from "../../../components/form/EditNameLinkComponent.vue";
import EditTextComponent from "../../../components/form/EditTextComponent.vue";
export default defineComponent({
    components: {EditNameLink, EditTextComponent},
    mounted() {
        this.get(`/api/admin/cities/${this.$route.params.id}`);
    },
    data() {
        return {
            entity: null
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
            axios.patch(`/api/admin/cities/${this.$route.params.id}`, {
                name: this.entity.name,
                link: this.entity.link,
            })
                .then(res => {
                    if (toIndex){
                        // this.$router.push({name:'admin.city.show', params: {id: this.$route.params.id}})
                        this.$router.push({name:'admin.city.index'})
                    } else {
                        // this.$router.push({name:'admin.review.edit', params: {id: this.$route.params.id}})
                        this.errors = {"Статус": ["Сохранено"]}
                        document.querySelector('body').scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
                    }
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                })
        }
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
