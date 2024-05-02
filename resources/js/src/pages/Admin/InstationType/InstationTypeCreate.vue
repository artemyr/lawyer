<template>
    <div>
        <h1>Создать новую инстанцию</h1>

        <Create :entity="'instation-types'" :entityOne="'instation.types'" />
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
