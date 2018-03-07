<template>
    <div>

        <hero></hero>

        <div class="container-fluid sym-apps-fluid">

            <div class="sym-loading" v-show="loading">
                <div class="sk-three-bounce">
                    <div class="sk-child sk-bounce1"></div>
                    <div class="sk-child sk-bounce2"></div>
                    <div class="sk-child sk-bounce3"></div>
                </div>
            </div>

            <div class="container sym-apps" v-show="loaded">
                <div class="row">
                    <h3>Apps, Bots, &amp; Integrations</h3>
                    <p>Facilitate, enable, and simplify daily workflows on Symphony using bots, integrations, and partner applications. Take a look at these innovations made available via Symphony’s end-to-end encrypted infrastructure and open APIs.</p>
                    <card v-for="entry in entries"
                        :key="entry.id"
                        v-bind:entry="entry"></card>
                </div>
            </div>
        </div>

        <partners v-show="loaded"></partners>

        <apps-ctas v-show="loaded"></apps-ctas>

    </div>
</template>

<script>
    export default {
        name: 'Home',
        data () {
            return {
                entries: [],
                loading: true,
                loaded: false,
                pageYOffset: 0
            }
        },
        created() {
            axios.get('/api/entries')
                .then(response => {
                  // JSON responses are automatically parsed.
                  this.entries = response.data
                  this.loading = false;
                  this.loaded = true;
                })
                .catch(e => {
                  this.errors.push(e)
                })

        },
        updated: function() {
            // scroll page to top
            (document.documentElement||document.body).scrollTop = 0
        },
        methods: {
            // no methods
        },
        beforeRouteLeave(to, from, next) {
            // empty
            next()
        }
    }
</script>

<style scoped lang="scss">
.container-fluid.sym-apps-fluid {
    position: relative;
    background-color: #f5f5f5;
    h3 {
        text-align: center;
        font-size: 24px;
        margin-top: 0;
        margin-bottom: 12px;
        line-height: 1.6;
    }
}
.container.sym-apps {
    padding-top: 60px;
    padding-bottom: 60px;
}
.sym-loading {
    background-color: #f5f5f5;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 200px;
}
p {
    text-align: center;
    max-width: 960px;
    margin: 0 auto 12px auto;
}
</style>
