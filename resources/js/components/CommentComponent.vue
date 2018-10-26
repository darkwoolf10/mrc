<template>
    <div class="col-md-6 col-sm-12">
        <form @submit="addComment()">
            <input type="hidden" name="player_id" :value="player.id">
            <input type="hidden" name="characteristic" :value="characteristicType">
            <h3 class="center" v-if="characteristicType == 1"><i class="fas fa-star"></i></h3>
            <h3 class="center" v-else><i class="fas fa-frown"></i></h3>
            <div class="input-group">
                <input type="text" name="text" class="form-control" id="plus" placeholder="Запишите новое достежение">
                <button class="btn btn-primary"><i class="fab fa-telegram-plane fa-lg"></i></button>
            </div>
        </form>
        <br>
        <ul class="list-group">
            <li class="list-group-item list-group-item-action" v-for="comment in characteristic" :key="">
                {{comment.text}}
                <!--<form  class="d-inline">-->
                    {{comment.id}}
                    <button @click="commentDelete(comment.id)" type="button" class="btn btn-danger float-right"><i class="fas fa-trash-alt"></i></button>
                <!--</form>-->
            </li>
        </ul>
        <br>
    </div>

</template>

<script>
    export default {
        props: [
            'player',
            'characteristic',
            'characteristicType'
        ],
        mounted() {
            // this.update();
        },
        methods: {
            update: function () {
                console.log(this.characteristicType);
            },
            commentDelete: function (id) {
                console.log(id);
            }
        }
    }
</script>

<style scoped>

</style>