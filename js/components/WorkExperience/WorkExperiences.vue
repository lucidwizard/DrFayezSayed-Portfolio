<template>
    <div class="mainDiv">
        <div class="experiencesDiv" v-bind:key="exp.id" v-for="exp in experiences">
            <div class="expDiv">
                <WorkExperience v-bind:exp="exp" v-bind:id="'WE'+exp.id" v-on:update-exp="updateExp" /><!-- v-on:edit-exp="edit_exp" -->
                <div class="radioRow">
                    <div class="radio4Delete" v-bind:class="{'selected':selected==exp.id}">
                            <input type="radio" :key="exp.id" name="experience" :value="exp.id" class="del-btn" v-on:change="$emit('del-exp', exp.id)" v-on:click="setSelected(exp.id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import WorkExperience from '../WorkExperience/WorkExperience.vue';

    export default {
        name: "WorkExperiences",
        components: {
            WorkExperience
        },
        created: function () {
            this.setSelected(this.selected);
        },
        props: ["experiences"],
        methods: {
            updateExp(newExp) {
                this.$emit('update-exp', newExp);
            },
            setSelected(s) {
                this.$data.selected = s;
            }
        },
        data() {
            return {
                selected: '',
                
            }
        }
    }
</script>
<style scoped>
    .mainDiv {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }
    .experiencesDiv {
        width: 100%;
    }
    .expDiv {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
        margin-bottom: 2%;
    }
    .radioRow {
        width: 20%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        padding-top: 5%;
    }
    .radio4Delete {
        padding: 15%;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-left: 5%;
        margin-right: 0px;

        background-color: #d0df00;
    }
    .selected {
        background-color: #df0000;
    }
</style>