<template>
    <div class="profileMain">
        <profileImg v-bind:img="profile.image"></profileImg>
        <profileDesc v-bind:desc="profile.desc"></profileDesc>
    </div>
</template>

<script>
import profileImg from './ProfileImg.vue';
import profileDesc from './ProfileDesc.vue';
export default {
    name: 'profilePage',
    components: {
        profileImg,
        profileDesc
    },
    data() {
        return {
            profile: {
                image: '',
                desc: ''
            }
        }
    },
    created() {
        this.fetchProfile();
    },
    methods: {
        fetchProfile() {
            this.executeFetch()
            .then(response => this.updateProfileData(response.data))
            .catch(function(error) {
                console.log("error occurred: "+error);
            });
        },
        async executeFetch() {
            let uri = '/profileget';//http://localhost:8000
            return await axios.get(uri);
        },
        updateProfileData(data) {
            this.$data.profile.desc = data['description'];
            //this.$data.profile.image = data['image'];
            if(data['image']=="default.png") {
                this.$data.profile.image = 'storage/default/'+data['image'];
            } else {
                this.$data.profile.image = 'storage/'+ data['image'];
            }
        }
    }
}
</script>

<style scoped>
    .profileMain {
        display: flex;
        flex-direction: column;
        align-items: center;
        align-self: center;
        padding-top: 10%;
    }
    @media(max-width: 1025px) {
        .profileMain {
            margin-bottom: 50px;
            height: 90vh;
            justify-content: center;
        }
    }
</style>