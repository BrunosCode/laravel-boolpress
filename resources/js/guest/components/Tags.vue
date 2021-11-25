<template>
    <div class="fRow fWrap fJustify--center">
        <span class="tag m--1" 
        v-for="tag in tags" :key="tag.id">
            <router-link class="link--reset"
            :to="{ name: tagsType, params: { slug: tag.slug } }">
                {{ tag.title || tag.name }}
            </router-link>
        </span>    
    </div>
</template>

<script>
export default {
    name: "Tags",
    props: {
        "tagsType": String
    },
    data() {
        return {
            tags: []
        }
    },
    mounted() {
		axios
            .get(`/api/${this.tagsType}`)
            .then( (response) => {
                this.tags = response.data.data;
                // console.log(this.tagsType);
            })
            .catch( (error) => {
                console.log(error);
            })
	}
}
</script>

<style lang="scss" scoped>
.list {
    list-style: none;
}
</style>