<template>
    <div class="row justify-content-center w-100">
        <!--
        <div class="imageDiv1" v-if="this.$props.img=='default.png'" >
            <img :src="'storage/default/'+this.$props.img" class="image" />
        </div>
        <div class="imageDiv2" v-else>
            <img :src="'storage/'+this.$props.img" class="image" />
        </div>
        -->
        <div class="imageDiv1">
            <img :src="this.$props.img" class="image" />
        </div>
    </div>
</template>

<script>
export default {
    name: 'profileImg',
    props: ['img']
}
</script>

<style scoped>
    .imageDiv1 {
        width: 80%;
    }
    .imageDiv2 {
        width: 30%;
    }
    .image{
        width: 100%;
    }
</style>