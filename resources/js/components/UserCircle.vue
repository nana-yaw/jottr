<template>
    <div class="rounded-full border border-gray-400 text-white bg-blue-400 w-10 h-10 flex justify-center item-center">
        <span class="pt-2">
        {{ userCircle }}
        </span>
    </div>
</template>

<script>
    export default {
        name: "UserCircle",

        props: [
            'name',
        ],

        computed: {
            userCircle: function () {
                return this.name.match(/[A-Z]/g).slice(0, 2).join('')
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>