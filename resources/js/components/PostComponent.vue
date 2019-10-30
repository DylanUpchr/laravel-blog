<template>
    <!--Image-->
    <p v-bind="post">{{post.post_id}}</p>
    
</template>
<script>
export default {
    props: ['fields'],
    data(){
        return{
            post: this.data
        }
    },
    mounted() {
        console.log('component mounted')
    }
}
</script>