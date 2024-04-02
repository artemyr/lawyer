<template>
    <div>
        <h1>Редактировать инстанцию</h1>

        <Edit :entity="'instations'" :entityOne="'instation'" />
    </div>
</template>

<script lang="ts">
import Edit from "../../../components/tools/Edit.vue";

export default {
    components: {Edit}
}
</script>

<style lang="scss" scoped>

</style>
