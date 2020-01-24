<template>
    <div class="row justify-content-center w-100 mt-5">
        <textarea v-model="this.$props.desc" readonly class="profileDesc"></textarea>
    </div>
</template>

<script>
export default {
    name: 'profileDesc',
    props: ['desc']
}
</script>

<style scoped>
    .profileDesc {
        width: 100%;
        height: 30vh;
        overflow: auto;
        text-align: center;
        border-style: none;
        font-size: 150%;
        font-weight: 600;
    }

</style>