<template>
    <div class="bottom col-lg-6 col-md-6 col-sm-12"><!-- id="app"-->
        <h1>Work Experience</h1>
        <p class="msg" id="msg">{{message}}</p>
        <button class="btn mb-4 addBtn dont-use" id="addBtn" @click="toggleAddExp" ><span class="btn btn-danger myBtn" v-show="cancel">Done</span><span class="btn btn-primary myBtn" v-show="add">Add</span></button>
        <div class="newWorkDiv dont-use" id="newWorkHandle">
            <NewWorkExperience v-on:addNewWorkExp="addNewExperience"/>
        </div>
        <WorkExperiences class="we" v-bind:experiences="experiences" v-on:update-exp="updateExp" v-on:del-exp="updateRadio4Delete" />
        <button class="btn btn-danger dont-use" id="delBtn" @click="deleteExperience" >Delete</button>
    </div>
</template>

<script>

import { METHODS } from 'http'
import NewWorkExperience from '../components/WorkExperience/NewWorkExperience.vue';
import WorkExperiences from '../components/WorkExperience/WorkExperiences.vue';
    export default {
        name: 'wepage',
        components: {
            NewWorkExperience,
            WorkExperiences
        },
        created: function () {
            this.fetchExperiences();
        },
        props: [

        ],
        methods: {
            //-------------------------------------add new experience
            toggleAddExp() {
                this.add = !this.add;
                this.cancel = !this.cancel;
                const handle = document.getElementById("newWorkHandle");
                if(handle.classList.contains("dont-use")) {
                    handle.classList.remove("dont-use");
                } else {
                    handle.classList.add("dont-use");
                }
            },
            addNewExperience(newExp) {
                //this.$data.experiences = [...this.$data.experiences, newExp];
                this.$data.experiences.unshift(newExp);
            },
            //-------------------------------------update experiences
            updateExp(newExp) {
               const ex = this.$data.experiences;
               ex.map((exp) => {
                   if(exp.id==newExp.id) {
                        exp.dates = newExp.dates;
                        exp.title = newExp.title;
                        exp.company = newExp.company;
                        exp.desc = newExp.desc;
                   }
               });
            },
            //---------------------------------------fetch experiences
            fetchExperiences() {
                this.executeFetch()
                .then(response => {this.$data.experiences = response.data})
                .catch(function(error) {
                    console.log("error occurred: "+error);
                });
            },
            async executeFetch() {
                let uri = '/api/staffworkexperienceget';//http://localhost:8000
                let response = await axios.get(uri);
                //this.$data.message = '';
                document.getElementById("msg").classList.add("dont-use");
                document.getElementById("addBtn").classList.remove("dont-use");
                document.getElementById("delBtn").classList.remove("dont-use");
                return response;
            },
            //-----------------------------------------delete experience
            updateRadio4Delete(expID) {
                this.$data.deleteID = expID;
            },
            deleteExperience() {
                this.deleteExp();//filter from front end and then remove from DB in following line
                this.executeDelete()
                .then(function(response) {
                    console.log("Success: "+response.data);
                })
                .catch(function(error) {
                    console.log("error occurred in 'delete': "+ error);
                })
            },
            deleteExp() {
                let id = this.$data.deleteID;
                this.$data.experiences = this.$data.experiences.filter(experience => experience.id !== id);
            },
            async executeDelete() {
                /*
                let uri = 'api/workexperience/';
                let r = await axios.delete(uri, {params: {'id': this.$data.deleteID}});
                */
                let id = this.$data.deleteID;
                let r = await axios.delete('api/workexperience/'+id);
                return r;
            }
            
        },
        data() {
            return {
                experiences: [],
                deleteID: '',
                message: 'Loading...',
                add: true,
                cancel: false
            }
        }
    }
</script>
<style scoped>
    .newWorkDiv {
        display: flex;
        margin-bottom: 2%;
    }
    .dont-use {
        display: none;
    }
    .bottom {
        margin-bottom: 100px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        display: block;
        text-align: center;
    }
    .we {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .msg {
        font-size: 120%;
        font-weight: 600;
    }
    .addBtn {
        padding: 0px;
    }
    .myBtn {
        font-weight: 600;
        font-size: 110%;
        letter-spacing: .2rem;
    }
</style>

<!--
experiences: [
                    {
                        id: 1,
                        dates: "2001-2002",
                        title: "web developer",
                        company: "lucid tech",
                        desc: "lorem ipsum text"
                    },
                    {
                        id: 2,
                        dates: "2002-2003",
                        title: "software developer",
                        company: "freelance",
                        desc: "lorem ipsum text"
                    },
                    {
                        id: 3,
                        dates: "2003-2004",
                        title: "mobile app developer",
                        company: "imadsayed.com",
                        desc: "lorem ipsum text"
                    }
            ]
-->