<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";

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
        <pre
            v-if="clubForm.isDirty"
            v-text="clubForm.data()"
        />
        <label
            class="flex flex-col"
            for="name"
        >
            Name
            <span
                v-if="clubForm.errors.name"
                class="text-red-500"
                v-text="clubForm.errors.name"
            />
            <input
                id="name"
                v-model="clubForm.name"
                type="text"
                name="name"
                placeholder="Name"
            />
        </label>
        <label
            class="flex flex-col"
            for="description"
        >
            Description
            <span
                v-if="clubForm.errors.description"
                class="text-red-500"
                v-text="clubForm.errors.description"
            />
            <textarea
                id="description"
                v-model="clubForm.description"
                name="description"
                placeholder="Description"
            />
        </label>
        <label
            class="flex flex-col"
            for="address"
        >
            Address
            <span
                v-if="clubForm.errors.address"
                class="text-red-500"
                v-text="clubForm.errors.address"
            />
            <textarea
                id="address"
                v-model="clubForm.address"
                name="address"
                placeholder="Address"
            />
        </label>
        <label
            class="flex flex-col"
            for="main_colour"
        >
            Main Colour
            <span
                v-if="clubForm.errors.main_colour"
                class="text-red-500"
                v-text="clubForm.errors.main_colour"
            />
            <input
                id="main_colour"
                v-model="clubForm.main_colour"
                type="color"
                name="main_colour"
                placeholder="Main Colour"
            />
        </label>
        <label
            class="flex flex-col"
            for="secondary_colour"
        >
            Secondary Colour
            <span
                v-if="clubForm.errors.secondary_colour"
                class="text-red-500"
                v-text="clubForm.errors.secondary_colour"
            />
            <input
                id="secondary_colour"
                v-model="clubForm.secondary_colour"
                type="color"
                name="secondary_colour"
                placeholder="Secondary Colour"
            />
        </label>
        <button type="submit">Submit</button>
    </form>
</template>

<style scoped></style>
