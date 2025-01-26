<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps<{
    clubs: Club[];
}>();
</script>

<template>
    <AuthenticatedLayout>
        <div class="mx-auto w-11/12 max-w-screen-xl space-y-4">
            <Link
                class="text-xl"
                :href="route('club.create')"
            >
                Add Club
            </Link>
            <div
                v-for="club in clubs"
                :key="club.id"
                class="rounded-md border-2 border-gray-400 p-2 py-3"
            >
                <span class="flex flex-row justify-between text-2xl">
                    <span>
                        <span
                            v-for="(colour, index) in [
                                club.main_colour,
                                club.secondary_colour,
                            ]"
                            :key="`${club.id}-${index}`"
                            class="px-2"
                            :style="{
                                color: colour,
                                'background-color': colour,
                            }"
                        />
                        <span
                            class="ps-2"
                            v-text="club.name"
                        />
                    </span>
                    <Link :href="route('club.edit', { club: club.id })">
                        Edit
                    </Link>
                </span>

                <p v-text="club.description" />
                <p v-text="club.address" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped></style>
