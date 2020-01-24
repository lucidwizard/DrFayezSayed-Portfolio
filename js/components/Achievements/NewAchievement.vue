<template>
    <div class="row main">
        <form class="newAchievementForm" @submit="addNewAchievement">
            <div class="newAchievementDiv">
                <div class="row w-100" style="align-items: flex-end;">
                    <div class="col-6 column">
                        <label class="mb-0 label" for="mainTitle">Title</label>
                        <input type="tex" v-model="mainTitle" id="mainTitle" />
                    </div>
                    <div class="col-6 column">
                        <label class="mb-0 label" for="secondaryTitle">Secondary Title</label>
                        <input type="text" v-model="secondaryTitle" id="secondaryTitle" />
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-6 column">
                        <label class="label mb-0 mt-2" for="subject">Subject</label>
                        <input type="text" v-model="subject" id="subject" />
                    </div>
                    <div class="col-6 column">
                        <label class="label mb-0 mt-2" for="location">Location</label>
                        <input type="text" v-model="location" id="location" />
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-6 column">
                        <label class="label mb-0 mt-2" for="date">Date</label>
                        <input type="text" v-model="date" id="date" />
                    </div>
                    <div class="col-6 column">
                        <label class="label mb-0 mt-2" for="order">Order</label>
                        <input type="text" v-model="order" id="order" />
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-12 column">
                        <label class="label mb-0 mt-2" for="desc">Description</label>
                        <textarea v-model="desc" id="desc" ></textarea>
                    </div>
                </div>
            </div>
            <div class="msgDiv mt-2 dont-use" id="msgDiv"><p class="msg">{{this.$data.msg}}</p></div>
            <div class="newAchievementBtnDiv mt-3">
                <button class="btn btn-success mt-0 addBtn" type="submit">Add Achievement</button>
            </div>
        </form>
        
    </div>
</template>
<script>
export default {
    name: 'newAchievement',
    data() {
        return {
            mainTitle: '',
            secondaryTitle: '',
            subject: '',
            location: '',
            date: '',
            order: '',
            desc: '',
            msg: 'Title must be entered!'
        }
    },
    methods: {
        addNewAchievement(e) {
            e.preventDefault();
            if(this.mainTitle == '' || this.mainTitle == null) {
                document.getElementById("msgDiv").classList.remove('dont-use');
            } else {
                document.getElementById("msgDiv").classList.add('dont-use');
                const newAchievement = {
                    mainTitle: this.mainTitle,
                    secondaryTitle: this.secondaryTitle,
                    subject: this.subject,
                    location: this.location,
                    date: this.date,
                    order: this.order,
                    desc: this.desc 
                };
                this.$data.mainTitle = this.mainTitle;
                this.$data.secondaryTitle = this.secondaryTitle;
                this.$data.subject = this.subject;
                this.$data.location = this.location;
                this.$data.date = this.date;
                this.$data.order = this.order;
                this.$data.desc = this.desc;

                this.sendFormData(e);

                this.mainTitle = '';
                this.secondaryTitle = '';
                this.subject = '';
                this.location = '';
                this.date = '';
                this.order = '';
                this.desc = '';
                
                this.$emit('addNewAchievement', newAchievement);
            }
        },
        sendFormData(e) {
            e.preventDefault();
            this.executeAddPost()
            .then(function(response) {
                console.log("Success: "+response.data);
            })
            .catch(function(error) {
                console.log("error occurred in 'post': "+ error);
            })
        },
        async executeAddPost() {
            let uri = '/api/staffachievementsstore';
            let r = await axios.post(uri, {
                //exp_id: this.expID,
                mainTitle: this.$data.mainTitle,
                secondaryTitle: this.$data.secondaryTitle,
                subject: this.$data.subject,
                location: this.$data.location,
                date: this.$data.date,
                order: this.$data.order,
                desc: this.$data.desc
            });
            return r;
        }
    }
    
}
</script>
<style scoped>
    .main {
        width: 90%;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .newAchievementForm {
        width: 100%;
        display: flex; 
        flex-direction: column; 
        justify-content: flex-start;
        align-items: center;
    }
    .newAchievementDiv {
        width: 100%;
        display: flex; 
        flex-direction: column; 
        justify-content: flex-start;
        align-items: center;
    }
    .newAchievementBtnDiv {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .msg {
        color: #960303;
        font-weight: 800;
        font-size: 120%;
    }
    .dont-use {
        display: none;
    }
    .label {
        color: #272727;
        font-weight: 600;
    }
    
    .addBtn {
        font-size: 120%;
        font-weight: 600;
        letter-spacing: .2rem;
    }
    .column {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
</style>