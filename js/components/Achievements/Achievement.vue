<template>
<div class="mainDiv">
    <div class="ach-item mt-2" ><!-- :id="'WE'+this.id" -->
        <div class="ach-item-text" >
            <h3 class="mTitle">{{ Achievement.mainTitle }}</h3>
            <span class="sTitle">{{ Achievement.secondaryTitle }}</span>
            <span class="subject">{{ Achievement.subject }}</span>
            <div class="locationDateDiv">
            <span class="location">{{ Achievement.location }}</span>
            <div v-if="Achievement.date != null" class="date"> ({{ Achievement.date }})</div>
            </div>
            <span class="order">{{ Achievement.order }}</span>
            <span class="desc">{{ Achievement.desc }}</span>
        </div>
        <div class="ach-item-options" >
            <button class="btn editBtn" v-on:click="toggleEdit(Achievement)" >
                <span class="btn-danger myBtn w-100" v-show="cancel">Done</span>
                <span class="btn-primary myBtn w-100" v-show="edit">Edit</span>
            </button>
        </div>
    </div>
    <achievementForm v-bind:Achievement="Achievement" class="dont-use" v-bind:id="'AF'+Achievement.id" v-bind:achID="Achievement.id" v-on:update-ach="updateAch" /> <!--:id="WEF+exp.id" -->
</div>
</template>

<script>
import achievementForm from './AchievementForm.vue';
export default {
    name: 'achievement',
    props: ['Achievement'],
    components: {
        achievementForm
    },
    data() {
        return {
            edit:true,
            cancel: false
        }
    },
    methods: {
        toggleEdit(Achievement) {
            this.edit = !this.edit;
            this.cancel = !this.cancel;
            const Handle = document.getElementById("AF"+Achievement.id);
            if(Handle.classList.contains('dont-use')) {
                Handle.classList.remove('dont-use');
            } else {
                Handle.classList.add('dont-use');
            }
        },
        updateAch(newAch) {
            this.$emit('update-ach', newAch)
        }
    }
    
}
</script>

<style scoped>
    .mainDiv {
        width: 100%;
    }
    .ach-item {
        background: #f4f4f4;
        padding: 10px;
        /*border-bottom: 1px #ccc dotted; */
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
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
        width: 20%;
        margin-right: 4%;
        margin-top: 0.5%;
    }
    .editBtn {
        padding: 0px;
    }
    .myBtn {
        font-weight: 600;
        font-size: 120%;
        letter-spacing: .2rem;
        padding: 10px;
    }
    .mTitle {
        width: fit-content;
        color: #333;
        font-weight: 900;
        border-bottom: 1px #333 solid;
    }
    .sTitle {
        color: #333;
        font-weight: 600;
        font-size: 150%
    }
    .subject {
        color: #757474;
        font-weight: 600;
        font-size: 150%
    }
    .locationDateDiv {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
    }
    .location {
        color: #333;
        font-weight: 600;
        font-size: 150%
    }
    .date {
        color: #dd0000;
        font-weight: 600;
        font-size: 150%;
        margin-left: 10px;
    }
    .order {
        color: #979393;
        font-weight: 600;
        font-size: 150%
    }
    .desc {
        color: #000;
        font-weight: 600;
        font-size: 120%
    }
    .dont-use {
        display: none;
    }
</style>