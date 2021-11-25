<template>
<header class="header fRow">
    <div class="container fRow fJustify--spaceBetween fAlign--center">
        <div class="width--half fRow justify--left">
            <h3 class="header__logo">BoolPress</h3>
        </div>
        <div class="width--half fRow justify--right">
            <nav class="header__nav nav">
                <ul class="list nav__list fRow">
                    <li><a href="/admin/home" class="link header__link nav__link">Admin</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style lang="scss" scoped>
.header {
    height: 4rem;
}
</style>