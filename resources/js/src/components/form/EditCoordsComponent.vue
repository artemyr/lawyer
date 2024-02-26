<template>
    <div>
        <div class="mb-1 input-group">

            <div class="input-group-prepend">
                <span class="input-group-text">{{ fields.lat.label }}, {{ fields.lon.label }}, {{ fields.zoom.label }}</span>
            </div>

            <input v-model="lat"
                   :type="fields.lat.type"
                   :id="fields.lat.name"
                   :placeholder="fields.lat.placeholder"
                   class="form-control">

            <input v-model="lon"
                   :type="fields.lon.type"
                   :id="fields.lon.name"
                   :placeholder="fields.lon.placeholder"
                   class="form-control">

            <input v-model="zoom"
                   :type="fields.zoom.type"
                   :id="fields.zoom.name"
                   :placeholder="fields.zoom.placeholder"
                   class="form-control">

        </div>

        <div class="mb-3">
            <input disabled="disabled" :value="resultLine" type="text" class="form-control" />
        </div>
    </div>
</template>

<script lang="ts">
export default {
    props: ['fields'],
    methods: {

        check() {
            return true
        },
        getValues() {
            return new Map([
                ['coords', this.lat +';'+ this.lon +';'+ this.zoom],
            ])
        }
    },
    data() {
        return {
            lat: '',
            lon: '',
            zoom: '',
        }
    },
    mounted() {
        this.lat = this.fields.lat.value
        this.lon = this.fields.lon.value
        this.zoom = this.fields.zoom.value
    },
    computed: {
        resultLine() {
            return this.lat +';'+ this.lon +';'+ this.zoom
        }
    }
}
</script>

<style lang="scss" scoped>
.form-text {
    color: white;
}
</style>
