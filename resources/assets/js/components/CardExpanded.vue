
<template>
    <div>
        <span v-show="loading">Loading...</span>
        <div v-show="loaded">
            <div class="container sym-top-section">
                <img class="sym-icon" :src="entry.iconUrl">
                <div class="sym-name-desc">
                    <h1>{{ entry.name }}</h1>
                    <p>by <a v-bind:href="entry.creatorWebsiteUrl" target="_blank">{{ entry.creator }}</a></p>
                    <div v-html="entry.description"></div>
                </div>
            </div>
            <div class="container-fluid sym-screenshots">
                <img v-for="screenshot in entry.screenshots" :src="screenshot">
            </div>
            <div class="container sym-video">
                <div class="sym-app-video-row sym-sm-display-table">
                    <div class="col-sm-4 sym-sm-display-table-cell">
                        <h4>Video Title</h4>
                        <p>Video description of a few lines.</p>
                    </div>
                    <div class="col-sm-8 sym-sm-display-table-cell">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video class="embed-responsive-item" width="1280" height="720" preload="metadata" controls>
                                <source v-if="entry.video" :src="entry.video" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                this.loaded = true;
            }, error => {
                console.error(error);
            });
        },
        updated() {
            //this.resizeScreenshotDiv();
        },
        methods: {
            /*resizeScreenshotDiv: function() {

                // resize screenshot container according to image widths

            }*/
        }
    }
</script>

<style scoped>
    .sym-top-section {
        padding-top: 60px;
        padding-bottom: 60px;
    }
    img.sym-icon {
        float: left;
        width: 180px;
        max-width: 100%;
    }
    .sym-name-desc {
        margin-left: 200px;
    }
    .sym-screenshots {
        background-color: #f5f5f5;
        padding-top: 42px;
        padding-bottom: 42px;
    }
    .sym-screenshots img {
        width: 48%;
        box-shadow: 2px 2px 10px 0 rgba(0,0,0,.1);
        margin: auto 1% 20px 1%;
    }
    .sym-video {
        padding-top: 60px;
        padding-bottom: 60px;
    }
</style>