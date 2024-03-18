<template>
    <div class="mb-3">
        <label :for="fields.select.name" class="form-label">{{ fields.select.label }}</label>

        <div :id="fields.select.name" class="select-icon-wrapper">

            <div class="select-icon select-icon_selected" @click="toggle">
                <div class="select-icon select-icon_selected">
                    <Icon :code="value.code" />
                    {{ value.label }}
                </div>
            </div>

            <div class="select-icon-list" :class="{active: selectOpen}">
                <div v-for="value in values">
                    <div class="select-icon" @click="setIcon(value)">
                        <Icon :code="value.code" />
                        {{ value.label }}
                    </div>
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
        if (!this.value) {
            this.value = {id: 0,code:'',label:'Без иконки'}
        }
    },
    methods: {
        getValues() {
            return new Map([
                [this.fields.select.name, this.value.id]
            ])
        },
        check() {
            return true
        },
        setIcon(value) {
            console.log(value)
            this.value = value
            this.toggle()
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

<style lang="scss">
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
