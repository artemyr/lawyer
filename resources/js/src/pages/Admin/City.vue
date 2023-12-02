<template>
    <div>
        <h1>Редактировать города</h1>

        <Table :header="['id', 'name', 'link']" :rows="rows"></Table>

        <ul class="pagination" v-if="pagen">
            <li class="page-item"><a @click.prevent="get(pagen.first)" class="page-link" :href="pagen.first">First</a></li>
            <li class="page-item"><a @click.prevent="get(pagen.prev)" class="page-link" :href="pagen.prev">Previous</a></li>
            <li class="page-item"><a @click.prevent="get(pagen.next)" class="page-link" :href="pagen.next">Next</a></li>
            <li class="page-item"><a @click.prevent="get(pagen.last)" class="page-link" :href="pagen.last">Last</a></li>
        </ul>
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
    .page-item .page-link {
        background: #2c3034;
    }
</style>
