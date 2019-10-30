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
            </form>
            <form 
                class="postActionForm" 
                :action="routes.destroy" 
                method="delete"
            >
                <button 
                    class="btn btn-danger" 
                    type="submit"
                >
                    Delete
                </button>
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
            routes: this.routes
        }
    },
    mounted() {
        console.log(this.pimages);
    },    
}
</script>