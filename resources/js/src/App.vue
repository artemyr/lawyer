<template>
    <div class="body">
        <div class="container">
            <PrimaryHeader />
            <router-view />
        </div>
    </div>
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

<style lang="scss">
    .body {
        background: #242424;
        height: 100vh;
        color: white;
        padding-top: 20px;

        a {
            color: white;
        }

        p {
            color: white;
        }

        .container {
            display: grid;
            grid-auto-flow: row;
            gap: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }
    }
</style>
