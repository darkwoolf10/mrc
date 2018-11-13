<template>
    <li class="list-group-item list-group-item-action">
        {{comment.text}}
        <button @click="$emit('delete')"  type="button" class="btn btn-danger float-right">
            <i class="fas fa-trash-alt"></i>
        </button>
    </li>
</template>

<script>
    export default {
        props : [
            'comment'
        ],
        name: "CommentItem",
        data: function() {
            return {
            }
        },
        methods: {
        },
        mounted () {
        }
    }
</script>

<style scoped>

</style>