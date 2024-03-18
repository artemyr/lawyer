<template>
    <div v-html="use"></div>
</template>

<script lang="ts">
export default {
    name: "Icon",
    props: [
        'code'
    ],
    computed: {
        use() {
            if (this.code && this.code.match(/\.png/)) {
                return '<img src="/image/small/' + this.code + '">';
            } else {
                return '<svg><use xlink:href="/svg/sprite.svg#' + this.code + '"></use></svg>';
            }
        }
    }
}
</script>

<style scoped>

</style>
