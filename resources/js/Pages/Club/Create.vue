<script setup lang="ts">
import ClubForm from "@/Components/Forms/ClubForm.vue";
defineProps<{club: Club}>();
</script>

<template>
    <ClubForm :club="club" />
</template>

<style scoped>

</style>
