<template>
<div class="front">
    <Header class="front__header"/>
    <main class="front__main">
        <router-view></router-view>
    </main>
    <Sidebar class="front__sidebar" />
    <Footer class="front__footer" />
</div>

</template>

<script>
import Header from "./components/Header.vue";
import Sidebar from "./components/Sidebar.vue";
import Footer from "./components/Footer.vue";

export default {
    name: "App",
    components: {
        Header,
        Sidebar,
        Footer
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>

<style lang="scss" scoped>
.front {
    display: grid;
    grid-template-rows: 5rem auto 5rem;
    grid-template-columns: 2fr 1fr;
    grid-template-areas: 
    "header header"
    "main sidebar"
    "footer footer";
    min-height: 100vh;

    &__header {
        grid-area: header;
        background-color: gray;
    }

    &__main {
        grid-area: main;
    }

    &__sidebar {
        background-color: yellow;
        grid-area: sidebar;
    }

    &__footer {
        grid-area: footer;
        background-color: gray;
    }
}
</style>