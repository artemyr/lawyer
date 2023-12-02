<template>
    <div>
        <h1>Редактировать города</h1>

        <Table :header="['id', 'name', 'link']" :rows="rows"></Table>

        <div class="pagen" v-if="pagen">
            <a @click.prevent="get(pagen.first)" :href="pagen.first">Первая</a>
            <a @click.prevent="get(pagen.prev)" :href="pagen.prev">Предидущая</a>
            <a @click.prevent="get(pagen.next)" :href="pagen.next">Следующая</a>
            <a @click.prevent="get(pagen.last)" :href="pagen.last">Последняя</a>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import Table from "../../components/Table.vue";
import axios from "axios";
export default defineComponent({
    components: {Table},
    data() {
        return {
            elements: null,
            pagen: null,
        }
    },
    computed: {
        rows() {
            let arRows = [];
            for (let row in this.elements) {
                let arColl = [];
                for (let coll in this.elements[row]) {
                    arColl.push(this.elements[row][coll])
                }
                arRows.push(arColl);
            }
            return arRows;
        }
    },
    mounted() {
        this.get('/api/admin/cities');
    },
    methods: {
        async get (link) {
            if (!link) return;
            this.curLink = link;
            await axios.get(link)
                .then(response => {
                    this.elements = response.data.data;
                    if (response.data.meta.last_page > 1) this.pagen = response.data.links
                    else this.pagen = null
                })
                .catch(error => {
                    console.log(error);
                })
        },
        deleteArticle(id) {
            axios.delete(`/api/admin/articles/${id}`)
                .then(res => {
                    return this.get(this.curLink);
                })
                .then(res => {
                    if (this.elements.length == 0) {
                        this.get(this.defaultLink);
                    }
                })
        }
    }
})
</script>

<style lang="scss" scoped>

</style>
