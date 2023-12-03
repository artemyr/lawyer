<template>
    <div class="admin-edit__form-control">
        <label :for="vars.id">{{ vars.name }}</label>
        <input v-model="$parent.entity[vars.id]" :id="vars.id" type="date">
    </div>
</template>

<script>
import { assertExpressionStatement } from '@babel/types';
import { transliterate as tr } from 'transliteration';

export default {
    name: 'EditDate',
    props: ['vars'],
    data () {
        return {}
    }
}
</script>
