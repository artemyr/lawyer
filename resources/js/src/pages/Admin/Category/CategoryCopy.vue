<template>
    <div>
        <h1>Создать новую категорию</h1>

        <Copy :entity="'categories'" :entityOne="'category'" />
    </div>
</template>

<script lang="ts">
import Copy from "../../../components/tools/Copy.vue";

export default {
    components: {Copy}
}
</script>

<style lang="scss" scoped>

</style>
