<template>
    <div>
        <ul>
            <li><a href="/">Back to site</a></li>
            <li><router-link :to="{ name: 'home' }">Home</router-link></li>
            <li><router-link :to="{ name: 'about' }">About</router-link></li>
        </ul>
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
export default defineComponent({
    components: {}
})
</script>

<style lang="scss" scoped>
    ul {
        display: inline-grid;
        gap: 20px;
        grid-auto-flow: column;
    }
</style>
