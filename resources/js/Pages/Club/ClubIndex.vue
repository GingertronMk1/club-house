<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps<{
    clubs: Club[];
}>();
</script>

<template>
    <AuthenticatedLayout>
        <Link :href="route('club.create')">Add Club</Link>
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
    </AuthenticatedLayout>
</template>

<style scoped></style>
