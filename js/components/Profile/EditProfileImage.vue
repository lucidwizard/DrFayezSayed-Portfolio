<template>
    <div class="mt-3 page">
        
            <input 
            type="file" 
            style="display: none;" 
            name="image" 
            @change="processFile($event)" 
            value="newImage" 
            ref="fileInput"/>
            <div class="msgDiv dont-use" id="msgDiv"><p class="msg">File must be an image of type .png or .jpg!</p></div>
            <div class="msgDiv dont-use" id="msgDiv2"><p class="msg">You cannot remove the default image!</p></div>
            <button class="btn btn-danger myBtn removeBtn" @click="deleteImage">Delete Current Image</button>
            <div class="uploadBtnDiv">
                <button class="btn btn-primary myBtn mr-1" @click="$refs.fileInput.click()">Select Image</button>
                <button class="btn btn-success myBtn ml-1" id="uploadImgBtn" type="submit" @click="uploadImage">Upload Image</button>
            </div>
            
            
        
    </div>
</template>

<script>
import {Spinner} from 'spin.js';
export default {
    name: 'editprofileimage',
    props: ['profileimage'],
    components: {
        Spinner
    },
    data() {
        return {
            image: '',
            file: '',
            filename: '',
            mimeType: ''
        }
    },
    methods: {
        processFile(event) {
            event.preventDefault();
            //console.log("name: "+ event.target.files[0].name);
            //console.log("mime type: "+ event.target.files[0].type);
            
            this.$data.file = event.target.files[0];
            this.$data.image = event.target.files[0].name;
            this.$data.mimeType = event.target.files[0].type;
            
            //event.target.files[0].type)
        },
        uploadImage() {
            //console.log("uploading image and the mime type is: "+this.$data.mimeType);
            if(this.$data.mimeType == 'image/png' || this.$data.mimeType == 'image/jpg' || this.$data.mimeType == 'image/jpeg') {
                document.getElementById("msgDiv").classList.add("dont-use");
                document.getElementById("msgDiv2").classList.add("dont-use");
                const fd = new FormData();
                fd.set('image', this.$data.file, this.$data.image);
                const obj = this;
                this.executeUpload(fd, obj)
                .then(function([response,obj]) {
                    obj.$data.filename = response.data;
                    obj.emitData();
                })
                .catch(function(error) {
                    console.log("error occurred in 'upload of image': "+ error);
                })
            } else {
                document.getElementById("msgDiv2").classList.add("dont-use");
                document.getElementById("msgDiv").classList.remove("dont-use");
            }
        },
        async executeUpload(fd, obj) {
            const target = document.getElementById('uploadImgBtn');
            const spinner = new Spinner().spin(target);
            const uri = '/api/staffprofileimageupdate';//http://localhost:8000
            let r = await axios.post(uri, fd, {
                onUploadProgress: uploadEvent => {
                    console.log("Upload Progress: " + Math.round(uploadEvent.loaded / uploadEvent.total * 100) + "%");
                }
            });
            spinner.stop();
            return [r, obj];
        },
        emitData() {
            this.$emit('setProfileImage', this.$data.filename);
        },
        //-------------------------------------------------------------delete Image
        deleteImage() {
            if(this.$props.profileimage=='storage/default/default.png') {
                document.getElementById("msgDiv").classList.add("dont-use");
                document.getElementById("msgDiv2").classList.remove("dont-use");
            } else {
                document.getElementById("msgDiv").classList.add("dont-use");
                document.getElementById("msgDiv2").classList.add("dont-use");
                const obj = this;
                this.executeDelete(obj)
                .then(function(response) {
                    obj.$data.filename = "default.png";
                    obj.emitData();
                    //console.log("Deleted profile Image: "+response.data);
                })
                .catch(function(error) {
                    console.log("error occurred in 'delete of profile image': "+ error);
                })
            }
        },
        async executeDelete(obj) {
            const target = document.getElementById('uploadImgBtn');
            const spinner = new Spinner().spin(target);
            let r = await axios.delete('api/profileimage');
            spinner.stop();
            return r;
        }
    }
}
</script>

<style scoped>
    .page {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .uploadBtnDiv {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    .dont-use {
        display: none;
    }
    .myBtn {
        font-weight: 600;
        font-size: 120%;
        letter-spacing: .2rem;
    }
    .msg {
        color: #960303;
        font-weight: 600;
        font-size: 130%;
        text-align: center;
    }
    .removeBtn {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 10px;
    }
</style>