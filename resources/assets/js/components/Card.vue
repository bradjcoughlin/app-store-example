<template>
<div class="sym-card col-sm-3" style="border:solid 1px #ddd; padding: 20px;">
    <p>[{{ entry.contentType }}]</p>
    <p>{{ entry.title }}</p>
    <router-link :to="{ name: 'entry', params: { id: entry.id, type: entry.contentTypeSlug }}">Expand</router-link>
</div>
</template>

<script>
    export default {
        name: 'Card',
        props: ['entry'],
        methods: {
            // no methods
        }
    }
</script>