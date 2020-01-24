<template>
<div class="mainDiv">
    <div class="exp-item" ><!-- :id="'WE'+this.id" -->
        <div class="exp-item-text">
            <h3 class="title">{{ exp.title }}</h3>
            <span class="dates">{{ exp.dates }}</span>
            <span class="company">at {{ exp.company }}</span>
            <span class="desc">{{ exp.desc }}</span>
        </div>
        <div class="exp-item-options">
            <button class="btn btn-primary edit-btn" v-on:click="editExp(exp)" ><span  v-show="edit">Cancel </span>Edit</button><!-- $emit('edit-exp', exp.id) -->
        </div>
    </div>
    <WorkExperienceForm v-bind:exp="exp" class="dont-use" v-bind:id="'WEF'+exp.id" v-bind:expID="exp.id" v-on:update-exp="updateExp" /><!-- :id="WEF+exp.id" -->
</div>
</template>

<script>
import WorkExperienceForm from './WorkExperienceForm.vue';
export default {
    name: "WorkExperience",
    props: ["exp", "id"],
    components: {
        WorkExperienceForm,
    },
    methods: {
        editExp(exp) {
            this.edit = !this.edit;
            const WEFhandle = document.getElementById("WEF"+exp.id);
            if(WEFhandle.classList.contains("dont-use")) {
                WEFhandle.classList.remove("dont-use");
            } else {
                WEFhandle.classList.add("dont-use");
            }
        },
        updateExp(newExp) {
            this.$emit('update-exp', newExp);
        }
    },
    data() {
        return {
            edit: false
        }
    }
}
</script>
<style scoped>
    .mainDiv {
        width: 100%;
    }
    .exp-item {
        background: #f4f4f4;
        padding: 10px;
        /*border-bottom: 1px #ccc dotted; */
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
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
        width: 20%;
        margin-right: 4%;
    }
    .title {
        width: fit-content;
        color: #333;
        font-weight: 900;
        border-bottom: 1px #333 solid;
    }
    .dates {
        color: #f00;
        font-size: 110%;
        font-weight: 600;
        display: inline-block;
    }
    .company {
        color: #333;
        font-size: 120%;
        font-weight: 800;
        display: inline-block;
    }
    .desc {
        color: #000;
        font-size: 110%;
        font-weight: 400;
        display: inline-block;
        text-align: start;
    }
    .edit-btn {
        font-size: 120%;
        font-weight: 600;
        color: #fff;
    }
    .dont-use {
        display: none;
    }
    @media(max-width: 1000px) {
        .desc {
            font-size: 80%;
        }
    }
</style>