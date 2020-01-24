<template>
    <div class="mainDiv">
        <div class="achievementsDiv" v-bind:key="Achievement.id" v-for="Achievement in Achievements">
            <div class="achDiv">
                <!--<p>{{achievement.mainTitle}}</p>-->
                <achievement v-bind:Achievement="Achievement" v-on:update-ach="updateAch" /><!--v-bind:id="'WE'+exp.id" v-on:update-exp="updateExp"-->
                
                <div class="radioRow">
                    <div class="radio4Delete" v-bind:class="{'selected':selected==Achievement.id}">
                            <input type="radio" :key="Achievement.id" name="achievement" :value="Achievement.id" class="del-btn" v-on:change="$emit('del-ach', Achievement.id)" v-on:click="setSelected(Achievement.id)" />
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</template>
<script>
import achievement from './Achievement.vue';
export default {
    name: 'achievements',
    props: ['Achievements'],
    components: {
        achievement
    },
    data() {
        return {
            selected: '',
        }
    },
    methods: {
        setSelected(id) {
            this.$data.selected = id;
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
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.achievementsDiv {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.achDiv {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
}
.radioRow {
    width: 20%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    padding-top: 1%;
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