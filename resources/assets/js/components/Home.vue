<template>
    <div>
        <span v-show="loading">Loading...</span>
        <div class="row">
            <card v-for="entry in entries"
                :key="entry.id"
                v-bind:entry="entry"
                v-on:shareEvent="share(entry)"></card>
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
        /*created() {
            let recaptchaScript = document.createElement('script')
            recaptchaScript.setAttribute('src', 'https://symphony.com/resources/api/v1.0/symphony-api.js')
            document.head.appendChild(recaptchaScript)

            // say hello to Symphony
            SYMPHONY.remote.hello()
        },*/
        mounted() {

            // say hello to Symphony
            SYMPHONY.remote.hello().then(function(data) {

                function setThemeClass() {

                    // Set the theme of the app module
                    var themeColor = data.themeV2.name;
                    var themeSize = data.themeV2.size;

                    // Add size to HTML element to respect theme size
                    var rootDoc = document.getElementsByTagName( 'html' )[0]; // '0' to assign the first (and only `HTML` tag)
                    rootDoc.setAttribute( 'class', themeSize );

                    // You must add the symphony-external-app class to the body element
                    document.body.className = "sym-newsapp " + themeColor + " " + themeSize;
                
                }

                // connect
                SYMPHONY.application.connect(this.appId, ["modules", "applications-nav", "ui", "share"], [this.appId + ":app"]).then(function(response) {

                    // Subscribe to Symphony's services
                    var modulesService = SYMPHONY.services.subscribe("modules");
                    var navService = SYMPHONY.services.subscribe("applications-nav");
                    var uiService = SYMPHONY.services.subscribe("ui");

                    // set initial theme
                    setThemeClass();

                    // themeChangeV2 is an event fired by the UI service when the user changes his theme or font. The themeV2 object which contains the theme name and font size is also passed along with the event.
                    //var themeListener = uiService.listen("themeChangeV2", setThemeClass());

                    var userRefId = response.userReferenceId;
                    console.log(userRefId);
                    analytics.identify(userRefId);

                }.bind(this))
            }.bind(this));

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
            share: function(entry) {

                console.log(entry);

                var shareService = SYMPHONY.services.subscribe("share");

                var articleOptions = {
                        title: entry.title,
                        blurb: "Blurb",
                        date: "",
                        publisher: "Symphony",
                        author: "Symphony Communication Services, LLC",
                        thumbnail: "",
                        href: "https://symphony.com"
                    };

                shareService.share(
                        "article",
                        articleOptions
                    );
            }
        }
    }
</script>
