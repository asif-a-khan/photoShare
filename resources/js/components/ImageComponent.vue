<template>
    <div class="image">
        <h2>{{ userName }}</h2>
        <img class="img-responsive" :src="url" />
        <p>Posted at: {{ timeStamp }}</p>
        <button v-on:click="updateState" >Change parent state</button>
    </div>
</template>

<script>
export default {
    name: 'ImageComponent',
    props: ['url', 'userName', 'timeStamp', ],
    methods: {
        updateState() {
            this.$emit('updated')
        }
    }
}
</script>