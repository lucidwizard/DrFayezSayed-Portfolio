<template>
    <div class="mainIndexDiv">
        <navMenu v-on:setPage="setPage"></navMenu>
        <div class="window">
            <home id="home" class="navItems"></home>
            <profilePage id="profile" class="navItems dont-use"></profilePage>
            <experiencePage id="experience" class="navItems dont-use"></experiencePage>
            <achievementPage id="achievement" class="navItems dont-use"></achievementPage>
        </div>
    </div>
</template>

<script>
import navMenu from './Home/Nav/Nav.vue';
import home from './Home/Home.vue';
import profilePage from './Home/Profile/ProfilePage.vue';
import experiencePage from './Home/Experience/ExperiencePage.vue';
import achievementPage from './Home/Achievement/AchievementPage.vue';

export default {
    name: 'index',
    components: {
        navMenu,
        home,
        profilePage,
        experiencePage,
        achievementPage
    },
    methods: {
        setPage(page) {
            const all = document.querySelectorAll('.navItems');
            all.forEach(function(item) {
                item.classList.add("dont-use");
                if(item.id==page) {
                    item.classList.remove("dont-use");
                }
            });
        }
    }
    
}
</script>

<style scoped>
    .mainIndexDiv {
        height: 95vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .window {
        width: 100%;
        height: 100%;
        overflow: auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding-bottom: 50px;
    }
    .dont-use {
        display: none;
    }
    .myIndexNav {
        width: 100%;
    }
    /*.myNav {
        /*
        position: fixed;
        bottom: 0px;
        left: 50px;
        width: 100%;
        z-index: 9999999;
        padding: 20px 20px;
        
    }*/
    @media(max-width: 1025px) {
        .window {
            height: 100%;
            margin-bottom: 10%;
        }
    }
</style>