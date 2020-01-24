<template>
    <div class="achievementDiv mb-3">
        <div class="achDiv">
            <h3 class="mTitle">{{ achievement.mainTitle }}</h3>
            <span class="sTitle">{{ achievement.secondaryTitle }}</span>
            <span class="subject">{{ achievement.subject }}</span>
            <div class="locationDateDiv">
                <span class="location">{{ achievement.location }}</span>
                <div v-if="achievement.date != null" class="date"> ({{ achievement.date }})</div>
            </div>
            <span class="desc">{{ achievement.desc }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'achievement',
    props: ['achievement']
}
</script>

<style scoped>
    .achievementDiv {
        border: 2px #000000 solid;
        border-radius: 10px;
        padding: 10px;
        min-width: 25%;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
    }
    .achDiv {
        background: #b6b6b6;
        border-radius: 6px;
        padding: 5px 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .mTitle {
        width: fit-content;
        color: #333;
        font-weight: 900;
        border-bottom: 2px #646464 solid;
        letter-spacing: 0.5rem;
        font-family: 'Archivo', sans-serif;
    }
    .sTitle {
        color: #333;
        font-size: 130%;
        font-weight: 800;
        font-family: 'Archivo', sans-serif;
    }
    .subject {
        color: #333;
        font-size: 130%;
        font-weight: 800;
        font-family: 'Archivo', sans-serif;
    }
    .location {
        color: #333;
        font-size: 130%;
        font-weight: 800;
        display: inline-block;
        font-family: 'Archivo', sans-serif;
    }
    .date {
        color: #333;
        font-size: 130%;
        font-weight: 600;
        display: inline-block;
        font-family: 'Archivo', sans-serif;
    }
    .desc {
        color: #333;
        font-size: 120%;
        font-weight: 400;
    }
</style>