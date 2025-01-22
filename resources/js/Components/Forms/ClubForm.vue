<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'

const props = defineProps<{
    club: Club
}>()

const clubForm = useForm<Club>(props.club)

</script>

<template>
    <form class="flex flex-col space-y-3">
        <input type="text"
               name="name"
               id="name"
               v-model="clubForm.name"
               placeholder="Name" />
        <textarea name="description"
                  id="description"
                  v-model="clubForm.description"
                  placeholder="Description" />
        <textarea name="address"
                  id="address"
                  v-model="clubForm.address"
                  placeholder="Address" />
        <input type="color"
               name="main_colour"
               id="main_colour"
               v-model="clubForm.main_colour"
               placeholder="Main Colour" />
        <input type="color"
               name="secondary_colour"
               id="secondary_colour"
               v-model="clubForm.secondary_colour"
               placeholder="Secondary Colour" />
    </form>
</template>

<style scoped>

</style>
