<template>
    <svg v-html="use"></svg>
</template>

<script lang="ts">
export default {
    name: "Icon",
    props: [
        'code'
    ],
    computed: {
        use() {
            return '<use xlink:href="/svg/sprite.svg#' + this.code + '"></use>';
        }
    }
}
</script>

<style scoped>

</style>
