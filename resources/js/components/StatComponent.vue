<template>
    <div>
        <div class="center-all"  v-if="loading">
            <i class="fas fa-spinner fa-spin fa-5x " id="loading"></i>
        </div>
        <table class="table" v-else>
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Rank</th>
                <th scope="col">Age</th>
                <th scope="col">Birthday</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="player, key in players" >
                <td><a :href="'/player/' + player.id">{{player.name}}</a></td>
                <td><a :href="'/player/' + player.id">{{player.surname}}</a></td>
                <td>{{player.rank}}</td>
                <td>{{player.age}}</td>
                <td v-if="player.birthday">{{player.birthday}}</td>
                <td v-else>Birthday not found</td>
                <td>
                    <a class="btn btn-primary" :href="'/player/' + player.id"><i class="fas fa-user-astronaut"></i></a>
                    <a class="btn btn-success" :href="'/player/' + player.id + '/edit'"><i class="fas fa-edit"></i></a>
                    <button type="button" @click="delPlayer(player.id, key)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "StatComponent",
        data: function () {
            return {
                players: [],
                count: 0,
                loading: true
            }
        },
        mounted() {
            this.update();
        },
        methods: {
            update:function() {
                axios.get('/stat/getData').then((response) => {
                    this.players = response.data.players;
                    this.loading = false;
                })
            },
            delPlayer: function (id, key) {
                axios.delete('/player/' + id).then((response) => {
                    this.$delete(this.players, key);
                })
            }
        }
    }
</script>

<style scoped>
    .center-all {
        padding-left: 48%;
        padding-top: 25%;
        margin: -8px;
        width: 16px;
        height: 16px;
    }

</style>