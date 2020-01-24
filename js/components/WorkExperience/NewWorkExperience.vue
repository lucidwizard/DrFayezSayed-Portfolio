<template>
    <div class="mainDiv col-lg-10 col-md-10 col-sm-10">
        <form class="newWorkExperienceForm" @submit="addWorkExperience">
            <div class="newWorkDiv">
                <label class="mb-0" for="title">Title</label>
                <input type="text" v-model="title" id="title" />
                <label class="mb-0 mt-2" for="dates">Dates</label>
                <input type="text" v-model="dates" id="dates" />
                <label class="mb-0 mt-2" for="company">Company</label>
                <input type="text" v-model="company" id="company" />
            </div>
            <div class="newWorkBtnDiv">
                <label class="mb-0" for="desc">Description</label>
                <textarea v-model="desc" id="desc" ></textarea>
                <button class="btn btn-success mt-4 addBtn" type="submit">Add Work Experience</button>
            </div>
        </form>
        <div class="msgDiv dont-use" id="msgDiv"><p class="msg">{{this.$data.msg}}</p></div>
    </div>
</template>

<script>
import { METHODS } from 'http'
export default {
    name: 'NewWorkExperience',
    methods: {
        addWorkExperience(e) {
            e.preventDefault();
            if(this.title==''|| this.title==null || this.dates==''|| this.dates==null || this.company==''|| this.company==null || this.desc==''|| this.desc==null) {
                document.getElementById("msgDiv").classList.remove('dont-use');
            } else {
                const newExp = {
                    title: this.title,
                    dates: this.dates,
                    company: this.company,
                    desc: this.desc 
                };
                this.$data.title = this.title;
                this.$data.dates = this.dates;
                this.$data.company = this.company;
                this.$data.desc = this.desc;

                this.sendFormData(e);
                this.title = '';
                this.dates = '';
                this.company = '';
                this.desc = '';
                document.getElementById("msgDiv").classList.add('dont-use');
                this.$emit('addNewWorkExp', newExp);
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
            let uri = '/api/staffworkexperiencestore';
            let r = await axios.post(uri, {
                //exp_id: this.expID,
                title: this.$data.title,
                dates: this.$data.dates,
                company: this.$data.company,
                desc: this.$data.desc,
                user_id: 1
            });
            return r;
        }
    },
    data() {
        return {
            title: '',
            dates: '',
            company: '',
            desc: '',
            msg: 'All fields must be entered!'
        }
    }
    
}
</script>

<style scoped>
.mainDiv {
    width: 100%;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.newWorkExperienceForm {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
}
.newWorkDiv {
    width: fit-content;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.newWorkBtnDiv {
    width: fit-content;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.dont-use {
    display: none;
}
.msg {
    color: #cc0000;
    font-weight: 600;
    font-size: 120%;
}
.addBtn {
    font-size: 120%;
    font-weight: 600;
}
@media(max-width: 1099px) {
    .newWorkExperienceForm {
        width: 100%;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
}
@media(max-width: 769px) {
    .newWorkExperienceForm {
        width: 100%;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
    }
}
@media(max-width: 469px) {
    .newWorkExperienceForm {
        width: 100%;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
}

</style>