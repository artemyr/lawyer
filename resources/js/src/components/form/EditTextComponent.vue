<template>
    <div class="mb-3">
        <label :for="id" class="form-label">{{ name }}</label>
        <input v-model="$parent.entity[id]" :type="type" :id="id" :placeholder="placeholder" class="form-control">
        <div class="form-text">{{ help }}</div>
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";

export default defineComponent({
    props: ['id', 'name', 'type', 'help', 'value', 'placeholder'],

})
</script>

<style lang="scss" scoped>
.form-text {
    color: white;
}
</style>
