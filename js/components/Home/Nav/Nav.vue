<template>
    <div> <!-- class="pageDiv">-->
        <header>
            <!--<h1 class="logo">Logo</h1>-->
            <input type="checkbox" class="nav-toggle" id="nav-toggle" />
            <nav>
                <ul class="leftUL">
                    <li>
                        <div class="navBtnDiv"><button class="navBtn" @click="setHPage">Home</button></div>
                    </li>
                    <li>
                        <div class="navBtnDiv"><button class="navBtn" @click="setPPage">Profile</button></div>
                    </li>
                    <li>
                        <div class="navBtnDiv"><button class="navBtn" @click="setEPage">Work Experience</button></div>
                    </li>
                    <li>
                        <div class="navBtnDiv"><button class="navBtn" @click="setAPage">Achievements</button></div>
                    </li>
                </ul>
                <ul class="rightUL">
                    <li>
                        <div class="navBtnDiv"><button class="navBtn" @click="login">Login</button></div>
                    </li>
                </ul>
            </nav>
            <label for="nav-toggle" class="nav-toggle-label"><span></span></label>
        </header>
        <!--
        <button class="navBtn" @click="setPPage">Profile</button>
        <button class="navBtn" @click="setEPage">Work Experience</button>
        <button class="navBtn" @click="setAPage">Achievements</button>
        -->
    </div>
</template>

<script>
export default {
    name: 'navMenu',
    data() {
        return {
            page: 'home'
        }
    },
    created() {
        this.$data.page = 'home';
    },
    methods: {
        setHPage() {
            this.$data.page = 'home';
            this.emitPage();
        },
        setPPage() {
            this.$data.page = 'profile';
            this.emitPage();
        },
        setEPage() {
            this.$data.page = 'experience';
            this.emitPage();
        },
        setAPage() {
            this.$data.page = 'achievement';
            this.emitPage();
        },
        emitPage() {
            document.getElementById('nav-toggle').checked=false;
            this.$emit('setPage', this.$data.page);
        },
        login() {
            window.location.href = '/login';
        }
    }
}
</script>

<style scoped>

    :root {
        /*background: rgba(85, 214, 170, .85);*/
        background: '#aa0000';
    }

    /*.pageDiv {
        /*
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        
        position: fixed;
        bottom: 0px;
        left: 50px;
        width: 70%;
        z-index: 9999999;
        padding: 20px 20px;
        
    }*/


    header {
        position: fixed;
        z-index: 9999;
        width: 100%;
        left: 0;
        bottom: 0px;
        background-color: transparent;
    }

    .nav-toggle-label {
        display: none;
    }
    .nav-toggle {
        display: none;
    }

    nav {
        display: flex;
    }

    .leftUL {
        margin-left: 0px;
        margin-right: auto;
    }

    .rightUL {
        margin-right: 0px;
        margin-left: auto;
    }

    nav ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
    }

    nav li {
        margin-bottom: 0%;
        padding-bottom: 0%;
        margin-left: 0%;
        margin-right: 2%;
        width: 20vw;
    }
    
    .navBtn {
        color: #333;
        background-color: #fff;
        border-style: none;
        border-radius: 5px;
        font-size: 150%;
        font-weight: 600;
        width: 100%;

        /*font-family: 'Courgette', cursive;*/
    }

    .navBtnDiv {
        background-color: #fff;
        border: 2px #333 solid;
        padding: 8px;
        border-radius: 10px;
        margin: 1% 1%;
        /*box-shadow: 0px 0px 20px #000;*/
    }

    .navBtnDiv:hover {
        box-shadow: 0.5px 0.5px 2px black, 0 0 15px darkblue, 0 0 5px grey;
    }

    button:focus {outline:0;}

    @media(max-width: 800px) {
        .navBtnDiv {
            width: 100%;
        }
        .navBtn {
            background-color: transparent;
            border: transparent;
            font-size: 150%;
            font-weight: 400;
            display: flex;
            justify-content: flex-start;
            opacity: 0;
            transition: opacity 150ms ease-in-out;
        }
        button:focus {outline:0;}

        .navBtn:hover {
            background-color: #bbb;
            border-radius: 10px;
        }

        header {
            background-color: #fff;/**rgba(85, 214, 170, .85); */
            border-top-style: solid;
            border-top-width: thin;
            text-align: center;
            position: fixed;
            z-index: 9999;
            width: 100%;
            min-height: 50px;
            /*margin-bottom: 5px;*/
            left: 0;
            bottom: 0;
        }

        .nav-toggle {
            display: none;
        }

        .nav-toggle-label {
            position: absolute;
            top: 0;
            left: 50%;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .nav-toggle-label span,
        .nav-toggle-label span::before,
        .nav-toggle-label span::after {
            display: block;
            background-color: #000;
            height: 2px;
            width: 2em;
            border-radius: 2px;
            position: relative;
        }

        .nav-toggle-label span::before,
        .nav-toggle-label span::after {
            content: '';
            position: absolute;
        }

        .nav-toggle-label span::before {
            bottom: 7px;
        }

        .nav-toggle-label span::after {
            top: 7px;
        }

        nav {
            position: absolute;
            text-align: left;
            bottom: 100%;
            left: 0px;;
            width: 100%;
            background-color: #fff;
            border-top-style: solid;
            border-top-width: thin;
            /*display: none;*//*not needed here since we are adding transitions */
            transform: scale(1,0);
            transform-origin: bottom;
            transition: transform 400ms ease-in-out;
            display: flex;
            flex-direction: column;
        }

        .rightUL {
            margin-left: 0px;
            margin-right: auto;
        }

        nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: block;
            
        }
        nav li {
            margin-bottom: 1%;
            margin-left: 0%;
            width: 100%;
        }

        .nav-toggle:checked ~ nav {
            /*display: block;*/
            transform: scale(1,1);
        }

        .nav-toggle:checked ~ nav .navBtn {
            opacity: 1;
            transition: opacity 250ms ease-in-out 250ms;
        }
    }

</style>