<template>
    <div>

        <hero></hero>

        <div class="sym-loading" v-show="loading">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
              </div>
        </div>

        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <h3>Apps, Bots, &amp; Integrations</h3>
                    <card v-for="entry in entries"
                        :key="entry.id"
                        v-bind:entry="entry"
                        v-on:shareEvent="share(entry)"></card>
                </div>
            </div>
        </div>

        <div class="sym-partner-logos container">
            <div class="row">
                <h3>Symphony Partners</h3>
                <div class="col-sm-4">
                    <a href="https://www.acuo.com" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/acuo.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="http://www.arcontech.com" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/arcontech.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="http://www.bluepool.tech" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/blue-pool-limited.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="https://www.factset.com/analytics/collaboration-and-messaging" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/factset.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="http://www.fisglobal.com/Solutions/Institutional-and-Wholesale/Commercial-and-Investment-Banking/Trading-and-Connectivity#marketdata" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/fis-global.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="https://flextrade.com/flextrade-integrates-symphonys-secure-and-compliant-communications/" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/flextrade.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="https://ihsmarkit.com/products.html" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/ihs-markit.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="https://koyfin.com/" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/koyfin.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="http://www.lodestar-ecosystems.com/" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/lodestar.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="https://www.marketearlybird.com/symphony" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/market-earlybird.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="http://www.mdxtechnology.com/" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/mdx-technology.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="https://www.money.net" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/moneynet.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="http://neptunefi.com/" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/neptune.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="https://revistasystems.com/Solutions" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/revista-systems.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="http://www.rsrchxchange.com/about/collaborations.html" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/rsrch-xchange.png"></a>
                </div>
                <div class="col-sm-4" style="margin-left: 16.6666666666%">
                    <a href="https://www.smartkarma.com/home/" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/smartkarma.png"></a>
                </div>
                <div class="col-sm-4">
                    <a href="https://glue42.com/symphony-software-foundation/" target="_blank" rel="nofollow noopener noreferrer"><img class="img-responsive" src="https://symphony.com/images/partners/tick42.png"></a>
                </div>
            </div>
        </div>

        <div class="container-fluid sym-partners-devs">
            <div class="container sym-partners-devs-inner">
                <div class="row sym-partners-devs-row">
                    <div class="col-sm-6 sym-col">
                        <h4>Become a Symphony Partner</h4>
                        <p>Join the partner ecosystem. Distribute content and apps via the Symphony market.</p>
                        <a href="https://symphony.com/partners" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col-sm-6 sym-col">
                        <h4>Access Developer Tools</h4>
                        <p>APIs and resources to build apps, smart bots, or external application integrations.</p>
                        <a href="https://symphony.com/developers" class="btn btn-primary">Developer Tools</a>
                    </div>
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

<style scoped lang="scss">
.container {
    padding-top: 60px;
    padding-bottom: 60px;
}
.container-fluid {
    background-color: #f5f5f5;
    h3 {
        text-align: center;
        font-size: 24px;
        margin-top: 0;
        margin-bottom: 12px;
        line-height: 1.6;
    }
}
.sym-loading {
    padding-top: 220px;
    padding-bottom: 100px;
    background-color: #f5f5f5;
}
.sym-partner-logos {
  padding-top: 84px;
  padding-bottom: 60px;
  h3 {
    text-align: center;
    font-size: 24px;
    margin-top: 0;
    margin-bottom: 12px;
    line-height: 1.6;
  }
  .col-sm-4 {
    padding-left: 42px;
    padding-right: 42px;
  }
}
.sym-partners-devs-row {
    padding-top: 36px;
    padding-bottom: 36px;
}
.sym-partners-devs-row .sym-col {
    text-align: center;
    h4 {
        margin-top: 0;
    }
    p {
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }
}
.sym-partners-devs {
    background-color: #f2f2f2;
}
.sym-partners-devs-inner {

}
</style>
