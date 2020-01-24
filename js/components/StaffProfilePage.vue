<template>
    <div class="row justify-content-center staffMainDiv">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="profilePageDiv">
                <p class="msg" id="msg">{{this.$data.message}}</p>
                <profileImage v-bind:profile="profile"></profileImage>
                <button class="btn dont-use mt-3 editBtn" id="editBtn" @click="toggleEditImage"><span  v-show="cancel" class="btn btn-danger myBtn">Done</span><span  v-show="edit" class="btn btn-primary myBtn">Edit Profile Image</span></button>
                <div class="editFormDiv dont-use" id="editFormDiv">
                    <editprofileimage v-bind:profileimage="profile.image" v-on:setProfileImage="setProfileImage" ></editprofileimage>
                </div>
                <profileText v-bind:profile="profile" v-bind:desc="profile.desc" v-on:newProfileText="updateProfileText" />
            </div>
        </div>
    </div>
</template>

<script>
import { METHODS } from 'http'
import profileImage from '../components/Profile/ProfileImage.vue';
import editprofileimage from '../components/Profile/EditProfileImage.vue';
import profileText from './Profile/ProfileText.vue';
export default {
    name: 'staffprofilepage',
    components: {
        profileImage,
        editprofileimage,
        profileText,
    },
    data() {
        return {
            profile: {
                desc: '',
                image: ''
            },
            message: 'Loading...',
            edit: true,
            cancel: false,
            filename: ''
        }
    },
    created() {
        this.fetchProfile();

    },
    mounted: function () { 
        //this.$nextTick(() => {
        //});
    },
    methods: {
        //---------------------------------------fetch profile
            fetchProfile() {
                this.executeFetch()
                .then(response => this.updateProfileData(response.data))
                .catch(function(error) {
                    console.log("error occurred: "+error);
                });
            },
            async executeFetch() {
                let uri = '/api/staffprofileget';//http://localhost:8000
                let response = await axios.get(uri);
                document.getElementById("msg").classList.add("dont-use");//remove loading... msg
                document.getElementById("editBtn").classList.remove("dont-use");//only show button after data is loaded
                return response;
            },
            updateProfileData(data) {
                
                this.$data.profile.desc = data['description'];
                if(data['image']=="default.png") {
                    this.$data.profile.image = 'storage/default/'+data['image'];
                } else {
                    this.$data.profile.image = 'storage/'+ data['image'];
                }
                
                //console.log("profile: "+ this.$data.profile.image + ", " + this.$data.profile.desc);
            },
            //---------------------------------------edit profile
            toggleEditImage() {
                this.edit = !this.edit;
                this.cancel = !this.cancel;
                const handle = document.getElementById("editFormDiv");
                if(handle.classList.contains("dont-use")) {
                    handle.classList.remove("dont-use");
                } else {
                    handle.classList.add("dont-use");
                }
            },
            setProfileImage(image) {
                if(image == 'default.png') {
                    this.$data.profile.image = 'storage/default/'+ image;
                } else {
                    this.$data.profile.image = 'storage/'+ image;
                }
            },
            setFilename(filename) {
                this.$data.filename = filename;
            },
            updateProfileText(newProfileText) {
                this.$data.profile.desc = newProfileText.desc;
            }
    }
}
</script>

<style scoped>
    .staffMainDiv {
       margin-bottom: 200px; 
    }
    .profilePageDiv {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .dont-use {
        display: none;
    }
    .myBtn {
        font-weight: 600;
        font-size: 110%;
        letter-spacing: .2rem;
    }
    .editBtn {
        padding: 0px;
    }
</style>