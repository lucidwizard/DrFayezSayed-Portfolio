<template>
    <div class="experienceDiv mb-3">
        <div class="expDiv">
            <h3 class="title">{{ exp.title }}</h3>
            <span class="dates">{{ exp.dates }}</span>
            <span class="co">at <span class="company">{{ exp.company }}</span></span>
            <span class="desc">{{ exp.desc }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'experience',
    props: ['exp']
    
}
</script>

<style scoped>
    .experienceDiv {
        border: 2px #000000 solid;
        border-radius: 10px;
        padding: 10px;
        min-width: 25%;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
    }
    .expDiv {
        background: #b6b6b6;
        border-radius: 6px;
        padding: 5px 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .title {
        width: fit-content;
        padding: 5px;
        color: #333;
        font-weight: 900;
        border-bottom: 2px #646464 solid;
        font-family: 'Archivo', sans-serif;
        letter-spacing: 0.5rem;
        /* 
        font-family: 'Lora', serif;
        font-family: 'Patua One', cursive;
        font-family: 'Archivo', sans-serif; 
        */
    }
    .dates {
        color: #333;/* #ff6600 */
        font-size: 130%;
        font-weight: 600;
        display: inline-block;
        font-family: 'Archivo', sans-serif;
    }
    .company {
        color: #333;
        font-size: 130%;
        font-weight: 800;
        display: inline-block;
        font-family: 'Archivo', sans-serif;
    }
    .co {
        font-size: 110%;
        font-weight: 400;
    }
    .desc {
        width: 70%;
        color: #000;
        font-size: 110%;
        font-weight: 400;
        display: inline-block;
        text-align: center;
    }
</style>