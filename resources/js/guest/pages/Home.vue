<template>
  <div class="main">
    <h1>Home</h1>
    <ItemsList items-type="posts"/>
  </div>
</template>

<script>
import ItemsList from "../components/ItemsList";
import Sidebar from "../components/ItemsList";

export default {
  name: "Home",
  components: {
    ItemsList,
    Sidebar
  }
}
</script>

<style lang="scss" scoped>
.main {
  margin: 2rem 1rem 2rem 3rem; 
}
</style>