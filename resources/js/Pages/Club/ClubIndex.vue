<script setup lang="ts">
defineProps<{
    clubs: Club[];
}>();
</script>

<template>
    <div class="mx-auto w-11/12 max-w-screen-xl divide-y-2">
        <div
            v-for="club in clubs"
            :key="club.id"
            class="py-3"
        >
            <span v-text="club.name" />

            <p v-text="club.description" />
            <p v-text="club.address" />
        </div>
    </div>
</template>

<style scoped></style>
