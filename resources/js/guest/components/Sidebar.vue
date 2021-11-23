<template>
    <aside class="sidebar">
        <h5 class="sidebar__title">Categories</h5>
        <ItemsList class="sidebar__list" items-type="categories"/>

        <h5 class="sidebar__title">Tags</h5>
        <ItemsList class="sidebar__list" items-type="tags"/>
    </aside>
</template>

<script>
import ItemsList from "../components/ItemsList";

export default {
  name: "Home",
  components: {
    ItemsList
  }
}
</script>

<style lang="scss" scoped>
.sidebar {
    margin: 2rem 3rem 2rem 1rem;
}
</style>