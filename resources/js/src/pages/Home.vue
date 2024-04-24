<template>
    <div class="menu">
        <router-link :to="{name: 'admin.city.index'}" class="menu__item">Города</router-link>
        <router-link :to="{name: 'admin.category.index'}" class="menu__item">Категории</router-link>
        <router-link :to="{name: 'admin.article'}" class="menu__item">Статьи</router-link>
        <router-link :to="{name: 'admin.instation.types.index'}" class="menu__item">Типы инстанций</router-link>
        <router-link :to="{name: 'admin.instation.index'}" class="menu__item">Инстанции</router-link>
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
export default defineComponent({
    components: {}
})
</script>

<style lang="scss" scoped>
    .menu {
        display: grid;
        justify-content: space-between;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;

        .menu__item {
            padding: 10px;
            border-radius: 10px;
            background: #3d3d3d;
            min-height: 160px;
            display: grid;
            justify-content: center;
            align-items: center;
            cursor: pointer;

            &:hover {
                background: #5b5b5b;
            }
        }
    }
</style>
