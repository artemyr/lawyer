<template>
    <div class="mb-3">
        <label :for="fields.select.name" class="form-label">{{ fields.select.label }}</label>

        <div :id="fields.select.name" class="select-icon-wrapper">

            <div class="select-icon select-icon_selected" @click="toggle">
                Без иконки
            </div>

            <div class="select-icon-list" :class="{active: selectOpen}">
                <div v-for="value in values">
                    <template v-if="value.code === ''">
                        <div class="select-icon" @click="setIcon(null)">Без иконки</div>
                    </template>
                    <template v-else>
                        <div class="select-icon" @click="setIcon(value.id)">
                            <Icon :code="value.code" />
                            {{ value.label }}
                        </div>
                    </template>
                </div>
            </div>

        </div>

        <div class="form-text">{{ fields.select.caption }}</div>
    </div>
</template>

<script>
import Icon from "../tools/Icon.vue";

export default {
    components: {Icon},
    data () {
        return {
            value: '',
            values: [],
            opened: false
        }
    },
    props: ['fields'],
    mounted() {
        this.values = this.fields.select.values
        this.value = this.fields.select.value
    },
    methods: {
        getValues() {
            return new Map([
                [this.fields.select.name, this.value]
            ])
        },
        check() {
            return true
        },
        setIcon(id) {
            alert(id)
        },
        toggle() {
            this.opened = !this.opened
        }
    },
    computed: {
        selectOpen() {
            return this.opened
        }
    }
}
</script>

<style scoped lang="scss">
.form-text {
    color: white;
}

.select-icon-wrapper {
    position: relative;

    .select-icon-list {
        position: absolute;
        background: white;
        z-index: 9;
        width: 100%;
        top: 100%;
        left: 0;
        max-height: 300px;
        overflow: scroll;
        display: none;
    }

    .select-icon-list.active {
        display: block;
    }

    .select-icon {
        cursor: pointer;
        display: grid;
        grid-auto-flow: column;
        justify-content: start;
        gap: 10px;
        align-items: center;
        border-radius: 10px;
        transition: .3s;
        padding: 5px 10px;
        color: black;

        &:hover {
            background: gray;
        }

        svg {
            height: 40px;
            width: 40px;
        }

        &_selected {
            color: white;
        }
    }
}
</style>
