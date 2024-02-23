<template>
    <div>
        <h1>Создать новый город</h1>

        <Create :entity="'cities'" :entityOne="'city'" />
    </div>
</template>

<script lang="ts">
import axios from "axios";
import EditNameLink from "../../../components/form/EditNameLinkComponent.vue";
import EditText from "../../../components/form/EditTextComponent.vue";
import Create from "../../../components/tools/Create.vue";

export default {
    components: {Create}
}
</script>

<style lang="scss" scoped>

</style>
