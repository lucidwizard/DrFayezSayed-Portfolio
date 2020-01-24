<template>
    <div class="pageDiv">
        <achievements v-bind:achievements="achievements"></achievements>
    </div>
</template>

<script>
import achievements from './Achievements.vue';
export default {
    name: 'achievementPage',
    components: {
        achievements
    },
    data() {
        return {
            achievements: []
        }
    },
    created: function () {
        this.fetchAchievements();
    },
    methods: {
        fetchAchievements() {
            this.executeFetch()
            .then(response => {this.$data.achievements = response.data})
            .catch(function(error) {
                console.log("error occurred on AchievementsPage: "+error);
            });
        },
        async executeFetch() {
            let uri = '/achievementsget';//http://localhost:8000
            return await axios.get(uri);
        }
    }
}
</script>

<style scoped>
    .pageDiv {
        padding-top: 10%;
    }
</style>