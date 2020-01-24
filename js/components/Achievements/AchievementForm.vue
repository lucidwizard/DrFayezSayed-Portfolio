<template>
    <div class="ach-item">
        <form class="ach-item-form" @submit="updateAch">
            <div class="ach-item-text">
                <input type="hidden" v-model="achID" name="id" />

                <label for="mainTitle" class="mainTitle">Title</label>
                <input type="text" v-model="mainTitle" name="mainTitle" id="mainTitle" /> <!-- :value=exp.title -->

                <label for="secondaryTitle" class="secondaryTitle">Secondary Title</label>
                <input type="text" v-model="secondaryTitle" name="secondaryTitle" id="secondaryTitle" /> <!-- :value=exp.title -->

                <label for="subject" class="subject">Subject</label>
                <input type="text" v-model="subject" name="subject" id="subject" /> <!-- :value=exp.title -->

                <label for="location" class="location">Location</label>
                <input type="text" v-model="location" name="location" id="location" /> <!-- :value=exp.title -->

                <label for="date" class="date">Date</label>
                <input type="text" v-model="date" name="date" id="date" /><!-- :value=exp.dates -->

                <label for="order" class="order">Order</label>
                <input type="text" v-model="order" name="order" id="order" /> <!-- :value=exp.company -->

                <label for="desc" class="desc">Description</label>
                <textarea id="desc" type="text" v-model="desc" name="desc" ></textarea><!-- :value=exp.desc -->
            </div>
            <div class="ach-item-options">
                <button class="btn btn-success save-btn" type="submit" >Save</button><!-- @click="$emit('update-exp', exp.id)" -->
            </div>
        </form>
    </div>
</template>
<script>
export default {
    name: 'achievementForm',
    props: ['Achievement','achID'],
    data() {
        return {
            id: this.$props.achID,
            mainTitle: this.$props.Achievement.mainTitle,
            secondaryTitle: this.$props.Achievement.secondaryTitle,
            subject: this.$props.Achievement.subject,
            location: this.$props.Achievement.location,
            date: this.$props.Achievement.date,
            order: this.$props.Achievement.order,
            desc: this.$props.Achievement.desc
        }
    },
    methods: {
        updateAch(e) {
            e.preventDefault();
            const newAch = {
                id: this.achID,
                mainTitle: this.mainTitle,
                secondaryTitle: this.secondaryTitle,
                subject: this.subject,
                location: this.location,
                date: this.date,
                order: this.order,
                desc: this.desc
            };
            //send up to parent
            this.sendFormData(e);
            this.$emit('update-ach', newAch);
        },
        sendFormData(e) {
            e.preventDefault();
            this.executePost()
            .then(function(response) {
                console.log("Update Success: "+response.data);
            })
            .catch(function(error) {
                console.log("error occurred in 'post': "+ error);
            })
        },
        async executePost() {
            let uri = '/api/staffachievementsupdate';
            let r = await axios.post(uri, {
                id: this.achID,
                mainTitle: this.mainTitle,
                secondaryTitle: this.secondaryTitle,
                subject: this.subject,
                location: this.location,
                date: this.date,
                order: this.order,
                desc: this.desc
            });
            return r;
        }
    }
    
}
</script>
<style scoped>
    .ach-item {
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
    .ach-item-form {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 100%;
    }
    .ach-item-text {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-left: 0px;
        margin-right: auto;
    }
    .ach-item-options {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
        margin-left: auto;
        margin-right: 20px;
    }
    .mainTitle {
        margin-bottom: 0px;
    }
    .secondaryTitle {
        margin-bottom: 0px;
        margin-top: 5px;
    }
    .subject {
        margin-bottom: 0px;
        margin-top: 5px;
    }
    .location {
        margin-bottom: 0px;
        margin-top: 5px;
    }
    .date {
        margin-bottom: 0px;
        margin-top: 5px;
    }
    .order {
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