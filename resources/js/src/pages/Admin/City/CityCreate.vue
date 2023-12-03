<template>
    <div>
        <h1>Редактировать города</h1>

        <form>
<!--            <EditTextComponent-->
<!--                :id="'name'"-->
<!--                :name="'Город'"-->
<!--                :type="'text'"-->
<!--                :placeholder="'Введите город'"-->
<!--                :help="'(Краснодар, Москва, ...)'"-->
<!--            />-->

            <EditNameLink
                :id="'name'"
                :name="'Город'"
                :type="'text'"
                :placeholder="'Введите город'"
                :help="'(Краснодар, Москва, ...)'"
            />

            <button type="submit" class="btn btn-primary">Отправить</button>
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
                title: null,
                link: null,
            }
        }
    },
    methods: {
        store() {
            axios.post('/api/admin/cities', {
                title: this.entity.title,
                link: this.entity.link,
            })
                .then(res => {
                    this.$router.push({ name: 'admin.city.index' })
                })
        }
    },
    computed: {
        isDisabled() {
            return this.entity.title && this.entity.link;
        }
    }
})
</script>

<style lang="scss" scoped>

</style>
