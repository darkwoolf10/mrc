<template>
    <table class="table">
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
        <tr v-for="player in players">
            <td><a href="">{{player.name}}</a></td>
            <td><a href="">{{player.surname}}</a></td>
            <td>{{player.rank}}</td>
            <td>{{player.age}}</td>
            <td v-if="player.birthday">{{player.birthday}}</td>
            <td v-else>Birthday not found</td>
            <td>
                <a href="" class="btn btn-primary"><i class="fas fa-user-astronaut"></i></a>
                <a class="btn btn-success" href=""><i class="fas fa-edit"></i></a>
                <form class="d-inline">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "StatComponent",
        data: function () {
            return {
                players: [],
                count: 0
            }
        },
        mounted() {
            this.update();
        },
        methods: {
            update:function() {
                axios.get('/stat/getData').then((response) => {
                    this.players = response.data.players;
                })
            }
        }
    }
</script>

<style scoped>

</style>