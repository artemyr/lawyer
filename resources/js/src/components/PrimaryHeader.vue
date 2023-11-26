<template>
    <ul>
        <li><router-link :to="{ name: 'home' }">Home</router-link></li>
        <li><router-link :to="{ name: 'about' }">About</router-link></li>
    </ul>
</template>

<script lang="ts">
import {defineComponent} from "vue";
export default defineComponent({
    components: {}
})
</script>

<style lang="scss" scoped>

</style>
