<template>
    <div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th v-for="item in this.header" scope="col">{{ item }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in this.rows">
                    <td v-for="coll in row">{{ coll }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";

export default defineComponent({
    components: {},
    props: ['header', 'rows']
})
</script>

<style lang="scss" scoped>

</style>
