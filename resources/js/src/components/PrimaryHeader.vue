<template>
    <div class="menu-row">
        <ul>
            <li><router-link :to="{ name: 'home' }">Home</router-link></li>
            <li><router-link :to="{ name: 'about' }">About</router-link></li>
        </ul>
        <ul>
            <li><a href="/">Back to site</a></li>
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
    .menu-row {
        display: grid;
        grid-auto-flow: column;
        justify-content: space-between;
    }
</style>
