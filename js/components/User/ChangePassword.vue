<template>
    <div class="pageDiv">
        <form class="pageForm" @submit="updatePW">
            <label for="pw" class="label">New Password</label>
            <input type="password" class="text" id="pw" name="foo" v-model="foo" />
            <span id="spinTarget"></span>
            <label for="cpw" class="label">Confirm Password</label>
            <input type="password" class="text" id="cpw" name="bar" v-model="bar"/>
            <p class="dont-use msg" id="msg">A Password MUST be entered!</p>
            <p class="dont-use msg" id="msg1">You must confirm the password!</p>
            <p class="dont-use msg" id="msg2">New Password and Confirm Password do not match!</p>
            <button type="submit" class="btn btn-success myBtn" id="updateBtn">Update Password</button>
            <p class="dont-use success mt-5" id="success">Password Updated</p>
        </form>
    </div>
</template>

<script>
import {Spinner} from 'spin.js';
export default {
    name: 'changePassword',
    data() {
        return {
            foo: '',
            bar: ''
        }
    },
    methods: {
        updatePW(e) {
            e.preventDefault();
            if(this.$data.foo == '') {
                document.getElementById("msg").classList.remove("dont-use");
                document.getElementById("msg1").classList.add("dont-use");
                document.getElementById("msg2").classList.add("dont-use");
            } else if(this.$data.bar == '') {
                document.getElementById("msg").classList.add("dont-use");
                document.getElementById("msg1").classList.remove("dont-use");
                document.getElementById("msg2").classList.add("dont-use");
            } else if(this.$data.foo != this.$data.bar) {
                document.getElementById("msg").classList.add("dont-use");
                document.getElementById("msg1").classList.add("dont-use");
                document.getElementById("msg2").classList.remove("dont-use");
            } else {
                document.getElementById("msg").classList.add("dont-use");
                document.getElementById("msg1").classList.add("dont-use");
                document.getElementById("msg2").classList.add("dont-use");
                const fd = new FormData();
                fd.set('foo', this.$data.foo);
                const obj = this;
                this.executeUpload(fd,obj)
                .then(function([response, obj]) {
                    //console.log("User Update Response: "+response.data);//if 'Foo updated' returned then pw updated
                    obj.$data.foo = '';
                    obj.$data.bar = '';
                    document.getElementById("success").classList.remove("dont-use");
                    setTimeout(() => {
                        document.getElementById("success").classList.add("dont-use");
                    }, 3000);
                })
                .catch(function(error) {
                    console.log("error occurred in 'upload of foo': "+ error);
                })
            }
            
        },
        async executeUpload(fd, obj) {
            const target = document.getElementById('spinTarget');
            const spinner = new Spinner().spin(target);
            const uri = '/api/staffuserupdate';
            const r = await axios.post(uri, fd);
            spinner.stop();
            return [r, obj];
        }
    }

}
</script>

<style scoped>
    .pageDiv {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    .pageForm {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    .label {
        width:50%;
        margin-bottom: 0px;
        margin-top: 10px;
    }
    .text {
        width:50%;
        margin-bottom: 10px;
    }
    .myBtn {
        font-weight: 600;
        font-size: 110%;
        letter-spacing: .2rem;
    }
    .msg {
        color: #960303;
        font-weight: 800;
        font-size: 120%;
    }
    .success {
        color: #00aa00;
        font-weight: 800;
        font-size: 160%;
    }
    .dont-use {
        display: none;
    }
</style>