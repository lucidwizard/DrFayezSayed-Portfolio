<template>
    <div>
        <div class="experiencesDiv" v-bind:key="exp.id" v-for="exp in experiences">
            <experience v-bind:exp="exp"></experience>
        </div>
    </div>
</template>

<script>
import experience from './Experience.vue';
export default {
    name: 'experiences',
    props: ['experiences'],
    components: {
        experience
    }
}
</script>

<style scoped>

</style>