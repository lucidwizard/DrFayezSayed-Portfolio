<template>
    <div class="pageDiv">
        <experiences v-bind:experiences="experiences"></experiences>
    </div>
</template>

<script>
import experiences from './Experiences.vue';
export default {
    name: 'experiencePage',
    components: {
        experiences
    },
    data() {
        return {
            experiences: []
        }
    },
    created: function () {
        this.fetchExperiences();
    },
    methods: {
        fetchExperiences() {
                this.executeFetch()
                .then(response => {this.$data.experiences = response.data})
                .catch(function(error) {
                    console.log("error occurred on ExpeirenecePage: "+error);
                });
            },
            async executeFetch() {
                let uri = '/workexperienceget';//http://localhost:8000
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