<template>
    <!--<div class="row justify-content-center">-->
        <div class="welcomeDiv">
            <div class="nameDiv">
                <p class="nameText">Dr Fayez Sayed</p>
            </div>
            <div class="welcomeImgDiv">
                <homeImage></homeImage>
            </div>
            <div class="welcomeTextDiv">
                <p class="welcomeText">
                I enjoy imparting knowledge to other learners, I perceive myself as an educator and my prime aim is to promote mathematics and to 
                help students develop the essential skills they needs as they join the workforce of the society. To achieve this I make sure that 
                students enjoy my classes so they look forward to the next class. I praise students for all contribution they make to the teaching 
                and learning in the classroom. My teaching experience spans over three different countries namely Syria, United Kingdom and United 
                Arab Emirates. I taught across all levels of education covering Compulsory Education, Further Education and Higher Education. This 
                has greatly enriched my teaching skills and equipped me with the ability to adopt various teaching styles to suite learners and 
                learning environments. I taught many courses of mathematics some of which are: Algebra, Calculus, Linear Algebra, Mechanics, and 
                Differential Equations. I also taught Mathematics for Teacher Training Programs where I supported teacher students while building 
                their teaching portfolios and observed their teaching practices. On the other hand, I played the role of liaison officer between 
                universities, colleges and schools. In this capacity I provided support for the teaching of mathematics in secondary schools. I 
                organised and delivered training sessions to teachers. I have also developed joint programs between schools and the university. 
                Although I am a teacher I find myself to be a life-long learner. I constantly build on the daily experience in teaching. I also 
                seek to stay up-to-date with the latest trends in education. 
                </p>
                <div>
                <!--<p class="signedText">signed,</p>-->
                <p class="signedText2">Dr Fayez Sayed</p>
                </div>
            </div>
        </div>
    <!--</div>-->
</template>

<script>
import homeImage from './HomeImage.vue';
export default {
    name: 'home',
    components: {
        homeImage
    }
    
}
</script>

<style scoped>
    .welcomeDiv {
        display: flex;
        flex-direction: column;
        width: 100%;
        align-items: center;
        padding-top: 2%;
        background-color: #fff;
        position: relative;
        margin-bottom: 100px;
    }

    .nameDiv {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        position: absolute;
        left: 0;
        top: 20;
    }
    .nameText {
        font-size: 600%;
        font-weight: 900;
        letter-spacing: 0.5rem;
        font-family: 'Lora', serif;
        color: #555;
        text-shadow: 5px 5px 4px #000;
        /* 
        font-family: 'Lora', serif;
        font-family: 'Patua One', cursive;
        font-family: 'Archivo', sans-serif; 
        font-family: 'Courgette', cursive;
        */
    }
    
    .welcomeImgDiv {
        width: 50%;
    }
    
    .welcomeImage {
        width: 100%;
        
    }
    .welcomeTextDiv {
        width: 90%;
        background-color: #FFF7DE;
        padding-left: 3em;
        padding-right: 1em;
        background-image:
        /* blue line */
        linear-gradient(90deg, transparent 29px, #abced4 29px, #abced4 31px, transparent 31px),
        linear-gradient(#aaa .1em, transparent .1em);
        background-size: 100% 2.8em;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .welcomeText {
        width: 100%;
        text-align: justify;
        font-weight: 400;
        font-size: 180%;
        font-family: 'Courgette', cursive;
        margin-bottom: 0px;        
    }
    .signedText {
        width: 75%;
        margin-right: 25%;
        margin-bottom: 0px;
        text-align: right;
        font-weight: 400;
        font-size: 180%;
        font-family: 'Courgette', cursive;
        line-height: 1.9em;
        padding-top: 2px;
    }
    .signedText2 {
        width: 90%;
        margin-right: 10%;
        text-align: right;
        font-weight: 400;
        font-size: 180%;
        font-family: 'Courgette', cursive;
        line-height: 1.9em;
        padding-top: 2px;
        padding-top: 0px;
    }

    @media(max-width: 1200px) {
        .nameText {
            font-size: 400%;
        }
    }

    @media(max-width: 1025px) {
        .welcomeDiv {
            height: 100vh;
            justify-content: flex-start;
            margin-top: 10%;
        }
        .nameDiv {
            margin-top: 2%;
        }
        .nameText {
            font-size: 300%;
            text-shadow: 3px 3px 4px #000;
        }
        .welcomeImgDiv {
            width: 50%;
            margin-top: 20px;
        }
        .welcomeTextDiv {
            width: 90%;
            background-size: 100% 2em;
        }
        .welcomeText {
            font-size: 110%;
            line-height: 1.9em;
        }
        .signedText {
            font-size: 110%;
            line-height: 1.9em;
        }
        .signedText2 {
            font-size: 110%;
            line-height: 1.9em;
        }
    }

    @media(max-width: 600px) {
        .nameDiv {
            margin-top: 6%;
        }
        .nameText {
            font-size: 200%;
            text-shadow: 2px 2px 4px #000;
        }
        .welcomeTextDiv {
            background-image:
            linear-gradient(90deg, transparent 29px, #abced4 29px, #abced4 31px, transparent 31px),
            linear-gradient(#ccc .1em, transparent .1em);
            background-size: 100% 1.6em;
            
        }
        .welcomeText {
            font-size: 80%;
            line-height: 2em;
        }
        .signedText {
            font-size: 80%;
            line-height: 2em;
        }
        .signedText2 {
            font-size: 80%;
            line-height: 2em;
            width: 98%;
            margin-right: 2%;
        }

        @media(max-width: 470px) {
            .nameDiv {
                margin-top: 7%;
            }
            .nameText {
                font-size: 150%;
                text-shadow: 2px 2px 4px #000;
            }
        }

        @media(max-width: 400px) {
            .nameDiv {
                margin-top: 9%;
            }
            .nameText {
                font-size: 110%;
                text-shadow: 2px 2px 4px #000;
            }
        }
    }
</style>