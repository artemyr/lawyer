<template>
    <div>
        <h1>Редактировать категории</h1>

        <router-link :to="{name: 'admin.category.create'}" class="btn btn-success">Create</router-link>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th v-for="item in this.header" scope="col">{{ item }}</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in this.elements">
                    <td v-for="code in this.header">{{ row[code] }}</td>
                    <td>
                        <router-link :to="{name:'admin.category.edit', params:{id: row.id} }" class="btn btn-success">edit</router-link>
                    </td>
                    <td>
                        <router-link :to="{name:'admin.category.copy', params:{id: row.id} }" class="btn btn-primary">copy</router-link>
                    </td>
                    <td>
                        <button @click.prevent="deleteElement(row.id)" class="btn btn-danger">delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <ul class="pagination" v-if="pagen">
            <li class="page-item"><a @click.prevent="get(pagen.first)" class="page-link" :href="pagen.first">First</a></li>
            <li class="page-item"><a @click.prevent="get(pagen.prev)" class="page-link" :href="pagen.prev">Previous</a></li>
            <li class="page-item"><a @click.prevent="get(pagen.next)" class="page-link" :href="pagen.next">Next</a></li>
            <li class="page-item"><a @click.prevent="get(pagen.last)" class="page-link" :href="pagen.last">Last</a></li>
        </ul>
    </div>
</template>

<script lang="ts">
import axios from "axios";
export default {
    components: {},
    data() {
        return {
            elements: null,
            pagen: null,
            header: ['id','name','active','link','sort'],
            curLink: null
        }
    },
    mounted() {
        this.get('/api/admin/categories');
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
        deleteElement(id) {
            axios.delete(`/api/admin/categories/${id}`)
                .then(res => {
                    return this.get(this.curLink);
                })
                .then(res => {
                    if (this.elements.length == 0) {
                        this.get('/api/admin/categories');
                    }
                })
        }
    }
}
</script>

<style lang="scss" scoped>
    .page-item .page-link {
        background: #2c3034;
    }
</style>
