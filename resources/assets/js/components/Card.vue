

<template>
<div class="sym-card col-sm-6 col-lg-4" v-on:click="expand(entry.id, entry.typeSlug)">
    <div class="sym-card-inner">
        <img :src="entry.iconUrl">
        <div class="sym-card-text">
            <!--<span class="sym-type-label">{{ entry.type }}</span>-->
            <span class="sym-name">{{ entry.name }}</span>
            <span class="sym-creator">by {{ entry.creator }}</span>
            <!--<router-link :to="{ name: 'item', params: { id: entry.id, type: entry.typeSlug }}">Expand</router-link>-->
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: 'Card',
        props: ['entry'],
        methods: {
            expand: function(id, slug) {
                this.$router.push({ name: 'item', params: { id: id, type: slug }})
            }
        }
    }
</script>

<style scoped>
.sym-card {
    padding: 0;
}
.sym-card-inner {
    height: 100px;
    margin: 6px;
    padding: 20px;
    border: solid 1px #eee;
    background-color: #fff;
}
.sym-card:hover, .sym-card:focus {
    cursor: pointer;
    transform: scale(1.0125);
    transition: all .5s;
}
.sym-card:hover .sym-card-inner, .sym-card:focus .sym-card-inner {
    transition: all .5s;
    box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.125);
}
img {
    float: left;
    width: 60px;
    height: 60px;
}
.sym-card-text {
    margin-left: 80px;
}
.sym-type-label {
    display: inline-block;
    float: left;
    background-color: #29B6F6;
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    padding-right: 4px;
    padding-left: 4px;
}
.sym-name {
    font-size: 18px;
    display: block;
    float: left;
    width: 100%;
    padding-top: 4px;
}
.sym-creator {
    display: block;
    float: left;
    width: 100%;
    color: #777;
    font-size: 12px;
}
</style>