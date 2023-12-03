<template>
    <div>
        <h1>Редактировать города</h1>

        {{ entity }}

    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";
export default defineComponent({
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
                title: this.entity.title,
                link: this.entity.link,
                coords: this.entity.coords,
                name_predloshniy_padesh: this.entity.name_predloshniy_padesh
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
})
</script>

<style lang="scss" scoped>

</style>
