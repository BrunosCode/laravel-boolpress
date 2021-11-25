<template>
  <div class="main">
    <Hero />
    <div class="container fRow">
      <ItemsList items-type="posts" class="w--8 py--3"/>
      <Sidebar class="w--4 my--4 p--4"/>
    </div>
  </div>
</template>

<script>
import ItemsList from "../components/ItemsList"; 
import Sidebar from "../components/Sidebar";
import Hero from "../components/Hero";

export default {
  name: "Home",
  components: {
    ItemsList,
    Sidebar,
    Hero
  }
}
</script>

<style lang="scss" scoped>


</style>