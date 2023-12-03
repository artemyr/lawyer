<template>
    <div v-if="vars" class="admin-edit__form-control">
        <label :for="vars.id">{{ vars.name }}</label>
        <select v-model="$parent.entity[vars.id]" :id="vars.id">
            <option :value="null">-</option>
            <option v-for="item in values" :value="item.id">{{ item.title }}</option>
        </select>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'EditSelect',
    data () {
        return {
            values: []
        }
    },
    props: ['vars'],
    mounted() {
        if(this.vars.values && this.vars.values.length > 0){
            this.values = this.vars.values
        } else {
            this.get();
        }
    },
    methods: {
        async get () {
            await axios.get(`/api/admin/${this.vars.entity}`)
            .then(response => {
                this.values = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
    }
}
</script>
