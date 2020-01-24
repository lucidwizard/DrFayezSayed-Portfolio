<template>
    <div>
        <button :type="type" class="my-button" v-text="text" v-bind:to="to" v-on:click="page"></button>
    </div>
</template>

<script>
import { METHODS } from 'http'
    export default {
        mounted() {
        },
        props: [
            'text',
            'type',
            'to'
        ],
        methods: {
            page: function () {
                window.location.href = this.to;
            }
        }
    }
</script>

<style>
    .my-button {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        font-weight: bold;
    }
    .my-button:hover {
        background-color: #888686;
    }
</style>