<template>
    <div class="float-right">
        <button type="button" @click="show" class="btn btn-primary"><i class="fas fa-plus fa-lg"></i></button>
        <v-dialog/>
    </div>
</template>

<script>
    export default {
        name: "RankComponent",
        methods: {
            show () {
                this.$modal.show('dialog', {
                    title: 'Alert!',
                    text: 'You really want to delete a comment?',
                    buttons: [
                        {
                            title: 'Close'
                        }
                    ]
                })
            },
            hide () {
                this.$modal.hide('hello-world');
            },
        },
    }
</script>

<style scoped>
    .close-modal {
        position:absolute;
        right: 1em;
        bottom: 1em;
    }
</style>