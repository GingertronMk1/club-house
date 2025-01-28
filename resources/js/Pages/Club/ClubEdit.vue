<script setup lang="ts">
import ClubForm from "@/Components/Forms/ClubForm.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
defineProps<{ club: Club }>();
</script>

<template>
    <AuthenticatedLayout>
        <h1 v-text="`Edit ${club.name}`" />
        <ClubForm :club="club" />
    </AuthenticatedLayout>
</template>

<style scoped></style>
