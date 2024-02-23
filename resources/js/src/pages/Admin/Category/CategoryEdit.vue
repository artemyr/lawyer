<template>
    <div>
        <h1>Редактировать категорию</h1>

        <Edit :entity="'categories'" :entityOne="'category'" />
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
