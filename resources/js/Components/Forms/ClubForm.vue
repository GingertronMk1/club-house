<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import FormInput from "@/Components/Inputs/FormInput.vue";

const props = defineProps<{
    club: Club;
}>();

const clubForm = useForm<Club>({
    ...props.club,
    main_colour: props.club.main_colour ?? "#ff0000",
    secondary_colour: props.club.secondary_colour ?? "#ffffff",
});

const submitForm = function () {
    if (clubForm.id) {
        console.info(`Updating club with ID: ${clubForm.id}`);
        clubForm.put(route("club.update", { id: clubForm.id }));
    } else {
        console.info("Creating new club");
        clubForm.post(route("club.store"));
    }
};
</script>

<template>
    <form
        class="mx-auto flex w-11/12 max-w-screen-xl flex-col space-y-3"
        @submit.prevent="submitForm"
    >
        <FormInput
            v-model="clubForm.name"
            label="Name"
            :errors="clubForm.errors.name"
        />
        <FormInput
            v-model="clubForm.description"
            label="Description"
            :errors="clubForm.errors.description"
            type="textarea"
        />
        <FormInput
            v-model="clubForm.address"
            label="Address"
            :errors="clubForm.errors.address"
            type="textarea"
        />
        <FormInput
            v-model="clubForm.main_colour"
            label="Main Colour"
            :errors="clubForm.errors.main_colour"
            type="color"
        />
        <FormInput
            v-model="clubForm.secondary_colour"
            label="Secondary Colour"
            :errors="clubForm.errors.secondary_colour"
            type="color"
        />
        <button type="submit">Submit</button>
    </form>
</template>

<style scoped></style>
