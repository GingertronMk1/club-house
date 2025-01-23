<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";

const props = defineProps<{
    club: Club;
}>();

const clubForm = useForm<Club>(props.club);
</script>

<template>
    <form class="flex flex-col space-y-3">
        <input
            id="name"
            v-model="clubForm.name"
            type="text"
            name="name"
            placeholder="Name"
        />
        <textarea
            id="description"
            v-model="clubForm.description"
            name="description"
            placeholder="Description"
        />
        <textarea
            id="address"
            v-model="clubForm.address"
            name="address"
            placeholder="Address"
        />
        <input
            id="main_colour"
            v-model="clubForm.main_colour"
            type="color"
            name="main_colour"
            placeholder="Main Colour"
        />
        <input
            id="secondary_colour"
            v-model="clubForm.secondary_colour"
            type="color"
            name="secondary_colour"
            placeholder="Secondary Colour"
        />
    </form>
</template>

<style scoped></style>
