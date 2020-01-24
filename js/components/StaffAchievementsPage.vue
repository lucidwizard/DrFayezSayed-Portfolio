<template>
    <div class="row justify-content-center mainDiv">
        <div class="col-lg-6 col-md-9 col-sm-12 pageDiv">
            <h1>Achievements</h1>
            <p class="msg" id="msg">Loading...</p>
            <button class="btn mb-4 editBtn dont-use" id="addBtn" @click="toggleAdd" >
                <span  class="btn btn-danger myBtn" v-show="cancel">Done</span>
                <span  class="btn btn-primary myBtn" v-show="add">Add</span>
            </button>
            <div class="dont-use newAchievementDiv" id="newAchievementHandle">
                <newAchievement v-on:addNewAchievement="addNewAchievement" />
            </div>
            <achievements v-bind:Achievements="Achievements" v-on:update-ach="updateAch" v-on:del-ach="updateRadio4Delete" />
            <button class="btn btn-danger dont-use delBtn" id="delBtn" @click="deleteAchievement" >Delete</button>
        </div>
    </div>
</template>

<script>
import newAchievement from './Achievements/NewAchievement.vue';
import achievements from './Achievements/Achievements.vue';
export default {
    name: 'staffachievementspage',
    components: {
        newAchievement,
        achievements
    },
    created: function () {
        this.fetchAchievements();
    },
    data() {
        return {
            Achievements: [],
            add: true,
            cancel: false,
            deleteID: ''
        }
    },
    methods: {
        toggleAdd() {
            this.add = !this.add;
            this.cancel = !this.cancel;
            const Ahandle = document.getElementById("newAchievementHandle");
            if(Ahandle.classList.contains("dont-use")) {
                Ahandle.classList.remove("dont-use");
            } else {
                Ahandle.classList.add("dont-use");
            }
        },
        //---------------------------------------fetch achievements
        fetchAchievements() {
            this.executeFetch()
            .then(response => {this.$data.Achievements = response.data})
            .catch(function(error) {
                console.log("error occurred in Achievements get request: "+error);
            });
        },
        async executeFetch() {
            let uri = '/api/staffachievementsget';//http://localhost:8000
            let response = await axios.get(uri);
            //this.$data.message = '';
            document.getElementById("msg").classList.add("dont-use");
            document.getElementById("addBtn").classList.remove("dont-use");
            document.getElementById("delBtn").classList.remove("dont-use");
            return response;
        },
        //-------------------------------------------add achievements
        addNewAchievement(newAchievement) {
            //this.$data.Achievements = [...this.$data.Achievements, newAchievement];
            this.$data.Achievements.unshift(newAchievement);
        },
        //--------------------------------------------update achievement
        updateAch(newAch) {
            const ac = this.$data.Achievements;
            ac.map((ach) => {
                if(ach.id==newAch.id) {
                    ach.mainTitle = newAch.mainTitle;
                    ach.secondaryTitle = newAch.secondaryTitle;
                    ach.subject = newAch.subject;
                    ach.location = newAch.location;
                    ach.date = newAch.date;
                    ach.order = newAch.order;
                    ach.desc = newAch.desc;
                }
            });
        },
        //--------------------------------------------delete achievement
        updateRadio4Delete(achID) {
            this.$data.deleteID = achID;
        },
        deleteAchievement() {
            this.deleteAch();//filter from front end and then remove from DB in following line
            this.executeDelete()
            .then(function(response) {
                console.log("Deleted: "+response.data);
            })
            .catch(function(error) {
                console.log("error occurred in 'delete': "+ error);
            })
        },
        deleteAch() {
            const id = this.$data.deleteID;
            this.$data.Achievements = this.$data.Achievements.filter(Achievement => Achievement.id !== id);
        },
        async executeDelete() {
            const id = this.$data.deleteID;
            let r = await axios.delete('api/achievements/'+id);
            return r;
        }
    }
    
}
</script>
<style scoped>
    .mainDiv {
        margin-bottom: 0px; 
        width: 100%;
    }
    
    .pageDiv{
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }
    .myBtn {
        font-weight: 600;
        font-size: 110%;
        letter-spacing: .2rem;
    }
    .editBtn {
        padding: 0px;
    }
    .msg {
        font-size: 120%;
        font-weight: 600;
    }
    .newAchievementDiv {
        width: 100%;
        display: flex;
    }
    .dont-use {
        display: none;
    }
    .delBtn {
        margin-top: 2%;
        margin-bottom: 200px;
    }
</style>