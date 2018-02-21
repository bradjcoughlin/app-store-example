
<style scoped>
.sym-entry >>> img {
  max-width: 100%;
}
</style>

<template>
    <div class="container">
        <h1>{{ entry.title }}</h1>
        <div class="sym-entry" v-html="entry.body"></div>
    </div>
</template>

<script>
    export default {
        name: 'CardExpanded',
        props: [ 'id', 'type' ],
        data () {
            return {
                loading: false,
                entry: ""
            }
        },
        mounted() {
            // show loading spinner
            this.loading = true;
            axios({ method: "GET", "url": "/api/entry/" + this.id }).then(result => {
                this.entry = result.data;
                this.loading = false;
            }, error => {
                console.error(error);
            });
        },
        methods: { }
    }
</script>