<template>
    <div class="achgievementsMainDiv">
        <div class="achievementsDiv" v-bind:key="achievement.id" v-for="achievement in achievements">
            <achievement v-bind:achievement="achievement" />
        </div>
    </div>
</template>
<script>
import achievement from './Achievement.vue';
export default {
    name: 'achievements',
    props: ['achievements'],
    components: {
        achievement
    }
}
</script>

<style scoped>

</style>