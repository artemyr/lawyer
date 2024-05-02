<template>
    <div v-if="error" class="alert alert-danger" role="alert">
        {{ error }}
    </div>

    <form v-if="this.form.fields">
        <div v-for="groupField in this.form.fields">
            <component
                ref="childComponent"
                v-bind:is="groupField.type"
                :fields = groupField.fields
            />
        </div>

        <button :disabled="!isDisabled" @click.prevent="update(true)" type="submit" class="btn btn-success">Save</button>
        <button @click.prevent="update(false)" type="submit" class="btn btn-primary">Apply</button>
    </form>
</template>

<script lang="ts">
import axios from "axios";
import EditNameLink from "../form/EditNameLinkComponent.vue";
import EditText from "../form/EditTextComponent.vue";
import EditSelect from "../form/EditSelectComponent.vue";
import EditSelectMulti from "../form/EditSelectMultiComponent.vue";
import EditSearchSelect from "../form/SearchSelectComponent.vue";
import EditMultiSearchSelect from "../form/SearchMultiSelectComponent.vue";
import EditCheckbox from "../form/EditCheckboxComponent.vue";
import EditNumber from "../form/EditNumberComponent.vue";
import EditCoords from "../form/EditCoordsComponent.vue";
import EditIconSelect from "../form/EditIconSelectComponent.vue";

export default {
    props: ['entity','entityOne'],
    components: {
        EditNameLink, EditText, EditSelect, EditSelectMulti, EditSearchSelect, EditCheckbox, EditNumber, EditCoords,
        EditIconSelect, EditMultiSearchSelect
    },
    mounted() {
        this.getForm(`/api/admin/${this.entity}/controls/${this.$route.params.id}`)
    },
    data() {
        return {
            error: '',
            form: {
                fields: {},
                values: {},
                validated: true
            }
        }
    },
    methods: {
        getForm(link) {
            axios.get(link)
                .then(res => {
                    this.form.fields = res.data
                })
        },
        getFormParameters() {
            let result = {};
            this.$refs.childComponent.forEach(component => {
                let params = component.getValues()
                params.forEach(function (value,key) {
                    result[key] = value
                }, this)
            })
            return result

        },
        check() {
            let result = true;

            this.$refs.childComponent.forEach(component => {
                if(!component.check()){
                    result = false
                }
            }, this)

            this.form.validated = result
        },
        update(toIndex) {

            this.check()
            if (!this.form.validated){
                alert('ошибки')
                return
            }

            let data = this.getFormParameters()

            axios.patch(`/api/admin/${this.entity}/${this.$route.params.id}`, data)
                .then(res => {
                    if (toIndex){
                        this.$router.push({
                            name:`admin.${this.entityOne}.index`
                        })
                    } else {
                        this.errors = {"Статус": ["Сохранено"]}
                        document.querySelector('body').scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
                    }
                })
                .catch(error => {
                    this.error = error.response.data.message
                    alert(error.response.data.message)
                })
        }
    },
    computed: {
        isDisabled() {
            return this.form.validated
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
