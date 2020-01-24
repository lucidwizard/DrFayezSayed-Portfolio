<template>
    <div class="pageDiv">
        <div class="userDiv">
            <label for="name" class="label">Name</label>
            <input type="text" readonly class="text" id="name" v-model="name" />
            <label for="email" class="label">Email</label>
            <input type="text" readonly class="text" id="email" v-model="email" />
            <button class="btn mt-3 editBtn" id="editBtn" @click="toggleEdit"><span  v-show="cancel" class="btn btn-danger myBtn">Done</span><span  v-show="edit" class="btn btn-primary myBtn">Change Password</span></button>
            <changepassword id="change" class="dont-use"></changepassword>
        </div>
    </div>
</template>

<script>
import { METHODS } from 'http';
import changepassword from './User/ChangePassword.vue';
export default {
    name: 'staffpassword',
    components: {
        changepassword
    },
    data() {
        return {
            edit: true,
            cancel: false,
            name: '',
            email: ''
        }
    },
    created() {
        //this.$data.page = 'profile';
        this.fetchUser();
    },
    methods: {
        //---------------------------------------fetch user
            fetchUser() {
                this.executeFetch()
                .then(response => this.updateProfileData(response.data))
                .catch(function(error) {
                    console.log("error occurred: "+error);
                });
            },
            async executeFetch() {
                let uri = '/api/staffuserget';
                let response = await axios.get(uri);
                //document.getElementById("msg").classList.add("dont-use");//remove loading... msg
                //document.getElementById("editBtn").classList.remove("dont-use");//only show button after data is loaded
                return response;
            },
            updateProfileData(data) {
                
                this.$data.name = data['name'];
                this.$data.email = data['email'];
                //console.log("user: "+ this.$data.name + ", " + this.$data.email + ", " + this.$data.password);
            },
            //------------------------------------------toggle
            toggleEdit() {
                this.edit = !this.edit;
                this.cancel = !this.cancel;
                const handle = document.getElementById("change");
                if(handle.classList.contains("dont-use")) {
                    handle.classList.remove("dont-use");
                } else {
                    handle.classList.add("dont-use");
                }
            }
    }
}
</script>

<style scoped>
.pageDiv {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}
.userDiv {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 50%;
}
    .myBtn {
        font-weight: 600;
        font-size: 110%;
        letter-spacing: .2rem;
    }
    .editBtn {
        padding: 0px;
    }
    .label {
        width:50%;
        margin-bottom: 0px;
        margin-top: 10px;
    }
    .text {
        width:50%;
    }
    .dont-use {
        display: none;
    }

    @media(max-width: 800px) {
        .label {
            width: 100%;
        }
        .text {
            width: 100%;
        }
    }
</style>