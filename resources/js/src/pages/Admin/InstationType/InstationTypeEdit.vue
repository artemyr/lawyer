<template>
    <div>
        <h1>Редактировать тип инстанции</h1>

        <Edit :entity="'instation-types'" :entityOne="'instation.types'" />
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
