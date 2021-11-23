<template>
    <ul class="list">
        <li class="list__item" 
        v-for="item in items" :key="item.id">
            <router-link class="list__link"
            :to="{ name: itemsType, params: { slug: item.slug } }">
                {{ item.title || item.name }}
            </router-link>
        </li>
    </ul>
</template>

<script>
export default {
    name: "ItemsList",
    props: {
        "itemsType": String
    },
    data() {
        return {
            items: []
        }
    },
    mounted() {
		axios
            .get(`/api/${this.itemsType}`)
            .then( (response) => {
                this.items = response.data.data;
                // console.log(this.itemsType);
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