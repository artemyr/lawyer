<template>
    <div>
        <h1>Создать новую категорию</h1>

        <Create :entity="'categories'" :entityOne="'category'" />
    </div>
</template>

<script lang="ts">
import Create from "../../../components/tools/Create.vue";

export default {
    components: {Create}
}
</script>

<style lang="scss" scoped>

</style>
