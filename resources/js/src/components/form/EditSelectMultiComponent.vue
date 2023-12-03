<template>
    <div v-if="vars" class="admin-edit__form-control">
        <label :for="vars.id">{{ vars.name }}</label>
        <select v-model="$parent.entity[vars.id]" :id="vars.id" multiple>
            <option v-for="value in values" :value="value.id">{{ value.title }}</option>
        </select>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'EditSelectMulti',
    data () {
        return {
            values: []
        }
    },
    props: ['vars'],
    mounted() {
        this.get();
        // console.log(this.$parent);
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
