<template>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <form action="/comment/store" @submit="addComment" method="post">
                <input type="hidden" name="player_id" :value="id">
                <input type="hidden" name="characteristic" value="1">
                <input type="hidden" name="_token" :value="csrf">
                <h3 class="center"><i class="fas fa-star"></i></h3>
                <div class="input-group">
                    <input type="text" name="text" class="form-control" id="plus" placeholder="Запишите новое достежение">
                    <button type="submit" class="btn btn-primary"><i class="fab fa-telegram-plane fa-lg"></i></button>
                </div>
            </form>
            <br>
            <ul class="list-group">
                <comment-item
                        v-for="(comment, index) in pluses"
                        :comment="comment"
                        :key="index"
                        @delete="deleteComment(index, pluses)"
                />
            </ul>
            <br>
        </div>
        <div class="col-md-6 col-sm-12">
            <form action="/comment/store" method="post">
                <input type="hidden" name="player_id" :value="id">
                <input type="hidden" name="characteristic" value="0">
                <input type="hidden" name="_token" :value="csrf">
                <h3 class="center"><i class="fas fa-sad-tear"></i></h3>
                <div class="input-group">
                    <input type="text" name="text" class="form-control" id="minus" placeholder="Чем вы разочарованы?">
                    <button type="submit" class="btn btn-primary"><i class="fab fa-telegram-plane fa-lg"></i></button>
                </div>
            </form>
            <br>
            <ul class="list-group">
                <comment-item
                        v-for="(comment, index) in minuses"
                        :comment="comment"
                        :key="index"
                        @delete="deleteComment(index, minuses)"
                />
            </ul>
            <br>
        </div>
    </div>
</template>

<script>
    import CommentItem from './CommentItem'

    export default {
        props : [
            'id'
        ],
        data: function() {
            return {
                pluses: '',
                minuses: '',
                csrf: this.csrf
            }
        },
        mounted() {
            this.update();
            this.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
        components: {
            CommentItem
        },
        methods: {
            deleteComment(index, list) {
                const comment = list[index];
                axios.post('/comment/delete/' + comment.id).then((response) => {
                    list.splice(index, 1);
                });
            },
            update:function() {
                axios.get('/api/show/' + this.id).then((response) => {
                    this.pluses = Object.values(response.data.pluses);
                    this.minuses = Object.values(response.data.minuses);
                })
            },
            addComment:function() {
                axios.post('/comment/store').then((response) => {
                });
            }
        },
    }
</script>

<style scoped>

</style>