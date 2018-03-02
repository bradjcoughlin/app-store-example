<template>
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
</template>

<script>
export default {
    name: 'AppsCtas'
}
</script>

<style scoped lang="scss">
.sym-partners-devs-row {
    padding-top: 60px;
    padding-bottom: 60px;
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