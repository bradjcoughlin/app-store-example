<template>
    <div>
        <span v-show="loading">Loading...</span>
        <div class="row">
            <div class="sym-card col-sm-3" v-for="entry in entries" style="border:solid 1px #ddd; padding: 20px;">
                <p>[{{ entry.contentType }}]</p>
                <p>{{ entry.title }}</p>
                <router-link :to="{ name: 'entry', params: { id: entry.id, type: entry.contentTypeSlug }}">Expand</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Highlights',
        data () {
            return {
                loading: false,
                entries: ""
            }
        },
        mounted() {
            // show loading spinner
            this.loading = true;
            axios({ method: "GET", "url": "/api/entries/proTip" }).then(result => {
                this.entries = result.data;
                this.loading = false;
            }, error => {
                console.error(error);
            });
        },
        methods: { }
    }
</script>