<template>
    <div class="exp-item">
        <form class="exp-item-form" @submit="updateExp">
            <div class="exp-item-text">
                <input type="hidden" v-model="expID" name="id" />
                <label for="title" class="title">Title</label>
                <input type="text" v-model="title" name="title" id="title" /> <!-- :value=exp.title -->
                <label for="dates" class="dates">Dates</label>
                <input type="text" v-model="dates" name="dates" id="dates" /><!-- :value=exp.dates -->
                <label for="company" class="company">Company</label>
                <input type="text" v-model="company" name="company" id="company" /> <!-- :value=exp.company -->
                <label for="desc" class="desc">Description</label>
                <textarea id="desc" type="text" v-model="desc" name="desc" ></textarea><!-- :value=exp.desc -->
            </div>
            <div class="exp-item-options">
                <button class="btn btn-success save-btn" type="submit" >Save</button><!-- @click="$emit('update-exp', exp.id)" -->
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "WorkExperienceForm",
    props: ["exp", "expID"],
    data() {
        return {
            id: this.$props.expID,
            title: this.$props.exp.title,
            dates: this.$props.exp.dates,
            company: this.$props.exp.company,
            desc: this.$props.exp.desc
        }
    },
    methods: {
        updateExp(e) {
            e.preventDefault();
            console.log("desc: "+this.desc);
            const newExp = {
                id: this.expID,
                title: this.title,
                dates: this.dates,
                company: this.company,
                desc: this.desc
            }
            //send up to parent
            this.sendFormData(e);
            this.$emit('update-exp', newExp);
        },
        sendFormData(e) {
            e.preventDefault();
            this.executePost()
            .then(function(response) {
                console.log("Success: "+response.data);
            })
            .catch(function(error) {
                console.log("error occurred in 'post': "+ error);
            })
        },
        async executePost() {
            let uri = '/api/staffworkexperienceupdate';
            let r = await axios.post(uri, {
                exp_id: this.expID,
                title: this.title,
                dates: this.dates,
                company: this.company,
                desc: this.desc
            });
            return r;
        }
    }
}
</script>
<style scoped>
    .exp-item {
        background: #f4f4f4;
        padding: 10px;
        border-bottom: 1px #ccc dotted; 
        width: 100%;
        display: flex;
        flex-direction: row;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 1%;
    }
    .exp-item-form {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 100%;
    }
    .exp-item-text {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-left: 0px;
        margin-right: auto;
    }
    .exp-item-options {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
        margin-left: auto;
        margin-right: 20px;
    }
    .title {
        margin-bottom: 0px;
    }
    .dates {
        margin-bottom: 0px;
        margin-top: 5px;
    }
    .company {
        margin-bottom: 0px;
        margin-top: 5px;
    }
    .desc {
        margin-bottom: 0px;
        margin-top: 5px;
    }
    .save-btn {
        font-size: 120%;
        font-weight: 600;
        color: #fff;
        margin-top: 5px;
    }
</style>