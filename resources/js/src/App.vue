<template>
    <PrimaryHeader />
    <p>Привет {{ name }}</p>
    <router-view />
</template>

<script lang="ts">
import {defineComponent} from "vue";
import PrimaryHeader from "./components/PrimaryHeader.vue";
export default defineComponent({
    components: {PrimaryHeader},
    setup() {
        return {
            name: 'ааа'
        }
    }
})
</script>

<style lang="scss" scoped>

</style>
