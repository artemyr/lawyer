<template>
    <div v-if="vars" class="admin-edit__form-control">
        <label :for="vars.id">{{ vars.name }}</label>
        <textarea v-model="$parent.entity[vars.id]" :id="vars.id" type="text"></textarea>
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';

export default {
    name: 'EditTextArea',
    data () {
        return {}
    },
    props: ['vars'],
    mounted() {
        // console.log(this.$parent);
    },
    methods: {
        
    }
}
</script>
