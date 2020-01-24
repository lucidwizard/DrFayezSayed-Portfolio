<template>
    <div class="row justify-content-center w-100 mt-5">
        <div class="mainDiv w-100">
            <div class="descDiv w-100" id="descDiv"><textarea readonly class="readOnlyTextArea" type="text" v-model="description.desc"></textarea></div>
            <form @submit="updateDesc" class="w-100">
                <div class="descEditDiv dont-use w-100" id="descEditDiv">
                    <textarea id="desc" class="editableTextArea" type="text" v-model="description.desc" name="desc" ></textarea>
                    <div class="dont-use" id="textMsgDiv"><p class="msg">You must enter something above!</p></div>
                    <button class="btn btn-success mt-2 myBtn w-25" id="saveBtn" type="submit">Save Description</button>
                </div>
            </form>
            <button class="mt-3 editBtn" @click="toggleEdit(false)"><span v-show="cancel" class="btn btn-danger w-100 myBtn">Cancel</span><span class="btn btn-primary w-100 myBtn" v-show="edit">Edit Description Text</span></button>
        </div>
    </div>
</template>

<script>
import {Spinner} from 'spin.js';
export default {
    name: "profileText",
    props: ["profile"],//, "desc"
    components: {
        Spinner
    },
    data: function() {
        return {
            description: {
                desc: this.$props.profile.desc
            },
            edit: true,
            cancel: false,
            savedDesc: ''
        }
    },
    mounted: function () { 
        //this.$nextTick(() => {
        //});
    },
    created: function() {
        this.fetchProfile();
    },
    methods: {
        toggleEdit(uploading) {
            if(this.$data.cancel === true && uploading === false) {
                this.$data.description.desc = this.$data.savedDesc;
            }
            this.edit = !this.edit;
            this.cancel = !this.cancel;
            const displayHandle = document.getElementById("descDiv");
            const editHandle = document.getElementById("descEditDiv");
            if(displayHandle.classList.contains("dont-use")) {
                displayHandle.classList.remove("dont-use");
                editHandle.classList.add("dont-use");
            } else {
                displayHandle.classList.add("dont-use");
                editHandle.classList.remove("dont-use");
            }
        },
        updateDesc(e) {
            e.preventDefault();
            console.log('data desc: '+ this.$data.description.desc);
            if(this.$data.description.desc == '' || this.$data.description.desc === ' ' || this.$data.description.desc === null) { //|| this.$data.description.desc === ' ' || this.$data.description.desc === null) {
                document.getElementById("textMsgDiv").classList.remove("dont-use");
            } else {
                document.getElementById("textMsgDiv").classList.add("dont-use");
                const newText = {
                    desc: this.$data.description.desc
                }
                this.uploadDesc(e);
                this.toggleEdit(true);
                this.$emit('newProfileText', newText);
            }
        },
        uploadDesc(e) {
            e.preventDefault();
            this.saveDesc();
            const fd = new FormData();
            fd.set('desc', this.$data.description.desc);
            this.executeUpload(fd)
            .then(function(response) {
                //console.log("Profile Desc Update Response: "+response.data);
            })
            .catch(function(error) {
                console.log("error occurred in 'upload of desc in profileText': "+ error);
            })
        },
        async executeUpload(fd) {
            const target = document.getElementById('saveBtn');
            const spinner = new Spinner().spin(target);
            const uri = '/api/staffprofiletextupdate';
            let r = await axios.post(uri, fd, {
                onUploadProgress: uploadEvent => {
                    console.log("Upload Progress: " + Math.round(uploadEvent.loaded / uploadEvent.total * 100) + "%");
                }
            });
            spinner.stop();
            return r;
        },
        //------------------------------------------------------Fetch
        async fetchProfile() {
            let uri = '/api/staffprofileget';
            let response = await axios.get(uri);
            this.updateProfileData(response.data);
        },
        updateProfileData(data) {
            this.$data.description.desc = data.description;
            //console.log("updateProfileData: " + this.$data.description.desc);
            this.saveDesc();
        },
        saveDesc() {
            this.$data.savedDesc = this.$data.description.desc;
            //console.log("savedDesc set to: "+this.$data.description.desc);
        }
        
    }
    
    
}
</script>

<style scoped>
    .mainDiv {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .descDiv {
        font-size: 120%;
        font-weight: 600;
    }
    .descEditDiv {
        display: flex;
        flex-direction: column;
        align-self: center;
        align-items: center;
    }
    .dont-use {
        display: none;
    }
    .editBtn {
        padding: 0px;
    }
    .myBtn {
        font-weight: 600;
        font-size: 110%;
        letter-spacing: .2rem;
    }
    .msg {
        color: #960303;
        font-weight: 600;
        text-align: center;
    }
    .readOnlyTextArea {
        resize: none;
        width: 100%;
        height: 150px;
        text-align: center;
        border-style: none;
    }
    .editableTextArea {
        width: 100%;
        height: 150px;
        text-align: center;
    }
</style>