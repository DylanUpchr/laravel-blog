<template>
<div class="post card">
    <!--Image-->
    <img v-for="image in images" :key="image.media_id"
        id="postImage"
        :src="'/blog/public/storage/' + image.media_name" 
        alt="Post Image" 
        :title=post.post_comment
    >
    <!--Footer-->
    <div class="card-body">
        <span v-if="showID">
            <a 
                id="postID" 
                :href="routes.show"
            >
                {{post.post_id}}
            </a>
            <br/>
        </span>
        <span id="postComment" >{{post.post_comment}}</span>
        <span id="postActionFormContainer">
            <form 
                class="postActionForm" 
                :action="routes.edit" 
                method="GET"
            >
                <button 
                    class="btn btn-primary" 
                    type="submit"
                >
                    Edit
                </button>
                <input type="hidden" name="_token" :value="csrf">
            </form>
            <form 
                class="postActionForm" 
                :action="routes.destroy"
                method="POST"
            >
                <button 
                    class="btn btn-danger" 
                    type="submit"
                >
                    Delete
                </button>
                <input type="hidden" name="_token" :value="csrf">
                <input type="hidden" name="_method" value="DELETE">
            </form>
        </span>
    </div>
</div>
</template>
<script>
export default {
    props: [
        'ppost',
        'pshowid',
        'pimages',
        'proutes'
        ],
    data(){
        return{
            post: this.ppost,
            showID: this.pshowid,
            images: this.pimages,
            routes: this.proutes,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted() {
        console.log(this.routes);
    },    
}
</script>