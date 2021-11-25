<template>
    <aside class="sidebar fCol fJustify--center">
        <h5 class="sidebar__title text--500 mb--1 text--center">Categories</h5>
        <Tags class="sidebar__list" tags-type="categories"/>

        <h5 class="sidebar__title text--500 text--center mt--3 mb--1">Tags</h5>
        <Tags class="sidebar__list" tags-type="tags"/>
    </aside>
</template>

<script>
import Tags from "../components/Tags";

export default {
  name: "Home",
  components: {
    Tags
  }
}
</script>

<style lang="scss" scoped>
.sidebar {
  border: 1px solid black;
  border-radius: 1rem;
}
</style>