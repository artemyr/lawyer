<template>
    <div>
        <h1>Редактировать города</h1>

        <form>
            <EditNameLink
                :id="'name'"
                :name="'Город'"
                :type="'text'"
                :placeholder="'Введите город'"
                :help="'(Краснодар, Москва, ...)'"
            />

            <button :disabled="!isDisabled" @click.prevent="store" type="submit" class="btn btn-success">Save</button>
        </form>

    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";
import EditTextComponent from "../../../components/form/EditTextComponent.vue";
import EditNameLink from "../../../components/form/EditNameLinkComponent.vue";
export default defineComponent({
    components: {EditNameLink, EditTextComponent},
    data () {
        return {
            entity: {
                name: null,
                link: null,
            }
        }
    },
    methods: {
        store() {
            axios.post('/api/admin/cities', {
                name: this.entity.name,
                link: this.entity.link,
            })
                .then(res => {
                    this.$router.push({ name: 'admin.city.index' })
                })
        }
    },
    computed: {
        isDisabled() {
            return this.entity.name && this.entity.link;
        }
    }
})
</script>

<style lang="scss" scoped>

</style>
