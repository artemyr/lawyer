<template>
    <p>Store {{ counter }}</p>
    <button @click="increment">Increment</button>
</template>

<script lang="ts">
import {defineComponent, computed} from "vue";
import {useStore} from "vuex";
export default defineComponent({
    components: {},
    setup () {
        const store = useStore();
        const counter = computed(() => {
            return store.state.count
        })
        const increment = () => {
            store.commit('increment')
        }
        return {
            counter,
            increment
        }
    }
})
</script>

<style lang="scss" scoped>

</style>
