<template>
    <div class="hero fCol fJustify--center">
        <div class="container fCol fJustify--center">
            <div class="w--7">
                <h1 class="hero__title text--800 text__lineReset mb--1">Lorem, ipsum dolor sit amet</h1>
                <p class="hero__text text--400 mb--2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum eos facilis, tenetur libero suscipit qui odio?</p>
                <div>
                    <button class="btn btn--primary hero__btn mr--2">Button 1</button>
                    <button class="btn btn--secondary hero__btn">Button 2</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Hero"
}
</script>

<style lang="scss">
.hero {
    height: 24rem;
    background-color: gray;
}
</style>