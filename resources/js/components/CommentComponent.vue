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
                <li class="list-group-item list-group-item-action" v-for="(comment, key) in pluses">
                    {{comment.text}}
                    <button type="button" @click="commentDelete(comment.id, key, true, $event)" class="btn btn-danger float-right">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </li>
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
                <li class="list-group-item list-group-item-action" v-for="(comment, key) in minuses">
                    {{comment.text}}
                    <button @click="commentDelete(comment.id, key, false, $event)" type="button" class="btn btn-danger float-right">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </li>
            </ul>
            <br>
        </div>
    </div>
</template>

<script>
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
        methods: {
            update:function() {
                axios.get('/api/show/' + this.id).then((response) => {
                    this.pluses = response.data.pluses;
                    this.minuses = response.data.minuses;
                })
            },
            commentDelete: function (id, key, characteristic, $event) {
                if (characteristic == true) {
                    var list =  this.pluses;
                } else {
                    var list =  this.minuses;
                }
                axios.post('/comment/delete/' + id).then((response) => {
                    this.$delete(list, key);
                });
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