<template>
    <div class="mb-3">
        <label class="form-label">{{ fields.text.label }}</label>
        <div class="props-grid">
            <template v-for="(item,key) in data">
                <div class="props-grid__cell">{{ key+1 }}</div>
                <input v-model="data[key][0]"
                       :type="fields.text.type"
                       placeholder="Подпись">
                <input v-model="data[key][1]"
                       :type="fields.text.type"
                       placeholder="Значение">
                <button class="btn btn-danger" @click.prevent="remove(key)">x</button>
            </template>
        </div>
        <button class="btn btn-primary" @click.prevent="add">Добавить</button>
        <div class="form-text">{{ fields.text.caption }}</div>
    </div>
</template>

<script lang="ts">
export default {
    props: ['fields'],
    data() {
        return {
            data: []
        }
    },
    mounted() {
        this.data = this.fields.text.value
    },
    methods: {
        getValues() {
            return new Map([
                [this.fields.text.name, this.data]
            ])
        },
        check() {
            return true
        },
        add() {
            this.data.push(["", ""])
        },
        remove(key) {
            this.data = this.data.filter((value, index) => index !== key)
        }
    }
}
</script>

<style lang="scss" scoped>
.form-text {
    color: white;
}

.props-grid {
    display: grid;
    grid-template-columns: min-content auto auto min-content;
    margin-bottom: 10px;
}

.props-grid__cell {
    padding: 0 5px;
    display: grid;
    align-content: center;
    border: solid 1px #ccc;
}
</style>
