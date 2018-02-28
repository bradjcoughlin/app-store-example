<template>
    <div>
        <hero></hero>
        <span v-show="loading">Loading...</span>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <card v-for="entry in entries"
                        :key="entry.id"
                        v-bind:entry="entry"
                        v-on:shareEvent="share(entry)"></card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Home',
        data () {
            return {
                loading: false,
                entries: "",
                appId: "newsapp2"
            }
        },
        mounted() {

            // show loading spinner
            this.loading = true;
            axios({ method: "GET", "url": "/api/entries" }).then(result => {
                this.entries = result.data;
                this.loading = false;
            }, error => {
                console.error(error);
            });

        },
        methods: {
            // no methods
        }
    }
</script>

<style scoped>
.container {
    padding-top: 60px;
    padding-bottom: 60px;
}
.container-fluid {
    background-color: #f5f5f5;
}
</style>
