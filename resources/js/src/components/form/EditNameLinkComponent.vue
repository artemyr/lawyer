<template>
    <div>
        <div class="mb-1">
            <label :for="id" class="form-label">{{ name }}</label>
            <input v-model="$parent.entity.name" @input="transliterate" :type="type" :id="id"
                   :placeholder="placeholder"
                   :class="{'is-invalid': !errorName}" class="form-control">
            <div class="form-text">{{ help }}</div>
        </div>

        <div class="mb-1">
            <label>Транслитерация <input v-model="transliteration" type="checkbox"></label>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Ссылка</label>
            <input v-model="$parent.entity.link" :class="{'is-invalid': !errorLink}" type="text" id="link"
                   placeholder="link"
                   class="form-control">
            <div class="form-text">Человеко понятный url</div>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {transliterate as tr} from 'transliteration';

export default defineComponent({
    props: ['id', 'name', 'type', 'help', 'value', 'placeholder'],
    methods: {
        transliterate() {
            if (!this.transliteration) return
            this.$parent.entity.link = tr(this.$parent.entity.name).toLowerCase().replaceAll(/ /g, '-');
        }
    },
    data() {
        return {
            transliteration: true
        }
    },
    computed: {
        errorName() {
            return this.$parent.entity.name
        },
        errorLink() {
            return this.$parent.entity.link
        }
    }
})
</script>

<style lang="scss" scoped>
.form-text {
    color: white;
}
</style>
