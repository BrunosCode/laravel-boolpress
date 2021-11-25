<template>
<div class="front">
    <Header />
    <main class="front__main">
        <router-view></router-view>
    </main>
    <Footer />
</div>

</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

export default {
    name: "App",
    components: {
        Header,
        Footer
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>

<style lang="scss" scoped>
.front {
  display: flex;
  flex-direction: column;
  min-height: 100vh;

  &__main {
      flex-grow: 1;
  }
}
</style>