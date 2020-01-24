<template>
    <div class="row justify-content-center w-100">
        <div class="imageDiv"  >
            <!--<img v-if="this.$props.profile.image=='default.png'" :src="'storage/default/'+this.$props.profile.image" class="image" />-->
        <!-- </div>
        <div class="imageDiv" > -->
            <!--<img v-else :src="'storage/'+this.$props.profile.image" class="image" />--><!-- v-if="this.$props.profile.image!='default.png'" -->
            <img :src="this.$props.profile.image" class="image" />
        </div>
    </div>
</template>
<script>
export default {
    name: 'profileImage',
    props: ["profile"],
    data() {
        return {
            image: ''
        }
    }
}
</script>
<style scoped>
    .imageDiv {
        width: 30%;
    }
    .image{
        width: 100%;
    }
</style>