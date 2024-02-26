<template>
    <div>
        <div class="mb-1">
            <label :for="fields.name.name" class="form-label">{{ fields.name.label }}</label>
            <input v-model="name" @input="transliterate"
               :type="fields.name.type"
               :id="fields.name.name"
               :placeholder="fields.name.placeholder"
               :class="{'is-invalid': !errorName}" class="form-control">
            <div class="form-text">{{ fields.name.caption }}</div>
        </div>

        <div class="mb-1">
            <label>Транслитерация <input v-model="transliteration" type="checkbox"></label>
        </div>

        <div class="mb-3">
            <label :for="fields.link.name" class="form-label">{{ fields.link.label }}</label>
            <input v-model="link" :class="{'is-invalid': !errorLink}"
               :type="fields.link.type"
               :id="fields.link.name"
               :placeholder="fields.link.placeholder"
               class="form-control">
            <div class="form-text">{{ fields.link.caption }}</div>
        </div>
    </div>
</template>

<script lang="ts">
import {transliterate as tr} from 'transliteration';

export default {
    props: ['fields'],
    methods: {
        transliterate() {
            if (!this.transliteration) return
            this.link = tr(this.name).toLowerCase().replaceAll(/ /g, '-');
        },
        check() {
            return Boolean(this.name && this.link)
        },
        getValues() {
            return new Map([
                [this.fields.name.name, this.name],
                [this.fields.link.name, this.link],
            ])
        }
    },
    data() {
        return {
            name: '',
            link: '',
            transliteration: true
        }
    },
    mounted() {
        this.name = this.fields.name.value
        this.link = this.fields.link.value
    },
    computed: {
        errorName() {
            return this.name
        },
        errorLink() {
            return this.link
        }
    }
}
</script>

<style lang="scss" scoped>
.form-text {
    color: white;
}
</style>
