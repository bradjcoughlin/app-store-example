
<template>
    <div>
        <div class="sym-loading" v-show="loading">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
        <div v-show="loaded">
            
            <div class="container sym-breadcrumb">
                <ol class="breadcrumb">
                    <li><router-link to="/">App Directory</router-link></li>
                    <li class="active">{{ entry.name }}</li>
                </ol>
            </div>

            <div class="container sym-top-section">
                <img class="sym-icon" :src="entry.iconUrl">
                <div class="sym-name-desc">
                    <h1>{{ entry.name }}</h1>
                    <p v-if="entry.creatorWebsiteUrl">by <a v-bind:href="entry.creatorWebsiteUrl" target="_blank">{{ entry.creator }}</a></p>
                    <p v-else>by {{ entry.creator }}</p>
                    <div v-html="entry.description"></div>
                </div>
            </div>

            <div class="container-fluid sym-screenshots" v-show="entry.screenshots">
                <div id="sym-screenshots-inner">
                    <div class="sk-three-bounce" v-show="imagesLoading">
                        <div class="sk-child sk-bounce1"></div>
                        <div class="sk-child sk-bounce2"></div>
                        <div class="sk-child sk-bounce3"></div>
                    </div>
                    <img v-for="screenshot in entry.screenshots" :src="screenshot" class="sym-screenshot">
                </div>
            </div>

            <div v-show="entry.video" class="container sym-video">
                <div class="sym-app-video-row sym-sm-display-table">
                    <div class="col-sm-4 sym-sm-display-table-cell">
                        <h3>{{ entry.videoTitle }}</h3>
                        <p>{{ entry.videoDescription }}</p>
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

            <div v-show="entry.helpInformation" class="container sym-help-info">
                <div class="row">
                    <div v-html="entry.helpInformation" class="col-sm-8 col-sm-offset-2"></div>
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
                loading: true,
                loaded: false,
                pageCall: false,
                imagesLoading: true,
                entry: ""
            }
        },
        created() {
            axios({ method: "GET", "url": "/api/entry/" + this.id }).then(result => {
                this.entry = result.data;
                this.loading = false;
                this.loaded = true;
            }, error => {
                console.error(error);
            });
        },
        mounted() {
            (document.documentElement||document.body).scrollTop = 0;
        },
        updated() {
            // set document title
            document.title = this.entry.name + ' | Symphony';
            // check if images are loaded
            this.imageLoadStatus();
            // send page event (but only once)
            if (this.entry.name && !this.pageCall) {
                analytics.page(this.entry.name, {
                  title: this.entry.name + ' | Symphony',
                  path: '/#/extension-app/' + this.id,
                });
                this.pageCall = true;
            }
        },
        methods: {
            imageLoadStatus: function() {
                let _this = this;

                // resize screenshot container according to image widths
                var images = document.querySelectorAll('.sym-screenshots img');
                var imageCount = images.length;
                var imagesLoaded = 0;
                for(var i = 0; i < imageCount; i++){
                    images[i].onload = function(){
                        imagesLoaded++;
                        if(imagesLoaded == imageCount){
                            _this.resizeScreenshotDiv(images);
                            _this.imagesLoading = false;
                        }
                    }
                }
            },
            resizeScreenshotDiv: function(nodeList) {
                var totalWidth = 0;
                for (var i = 0; i < nodeList.length; i++) {
                    totalWidth += nodeList[i].width;
                }
                // add 32px margin
                totalWidth += nodeList.length * 32;
                // gutter to right
                totalWidth += 16;
                $('#sym-screenshots-inner').width(totalWidth);
                $('.sym-screenshot').animate({opacity: 1}, 500)
            }
        }
    }
</script>

<style scoped lang="scss">
.sym-breadcrumb {
    margin-top: 30px;
}
ol.breadcrumb {
    background: transparent;
}
.sym-top-section {
    padding-top: 30px;
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
    overflow-x: auto;
    overflow-y: hidden;
    max-height: 440px + 84px;
}
#sym-screenshots-inner {
    margin: 0 auto;
}
#sym-screenshots-inner::after {
    display: block;
    content: "";
    clear: both;
}
.sym-screenshots img {
    display: inline-block;
    height: 440px;
    box-shadow: 2px 2px 10px 0 rgba(0,0,0,.1);
    margin-left: 16px;
    margin-right: 16px;
    opacity: 0;
}
.sym-video {
    padding-top: 60px;
    padding-bottom: 60px;
    h3 {
        margin-top: 120px;
    }
}
.sym-loading {
    padding-top: 220px;
    padding-bottom: 220px;
    background-color: #f5f5f5;
}
.sk-three-bounce {
    padding-top: 200px;
    padding-bottom: 200px;
    background-color: #f5f5f5;
}
</style>

<style lang="scss">
.sym-help-info {
    padding-top: 60px;
    padding-bottom: 60px;
    h3 {
        margin-bottom: 30px;
    }
    img {
        display: block;
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        margin-top: 30px;
        margin-bottom: 30px;
    }
}
</style>