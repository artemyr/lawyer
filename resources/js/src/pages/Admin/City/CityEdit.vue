<template>
    <div>
        <h1>Редактировать город</h1>

        <Edit :entity="'cities'" :entityOne="'city'" />
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
