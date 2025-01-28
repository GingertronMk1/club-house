<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        modelValue: string | number | Array<string | number>;
        label: string;
        errors: string | undefined;
        type?: string;
        id?: string;
    }>(),
    {
        type: "text",
        id: "___",
    },
);

const emit = defineEmits(["update:modelValue"]);

const inputId =
    props.id === "___"
        ? props.label.replace(/^\w/, "_").toLowerCase()
        : props.id;

const emitNewValue = function (event: Event) {
    const target = (event as InputEvent).target as HTMLInputElement;
    if (target === null) {
        return;
    }
    emit("update:modelValue", target.value);
};

const inputClasses = ["rounded-md", "border-gray-100"];
</script>

<template>
    <label
        :for="inputId"
        class="flex flex-col"
    >
        {{ label }}
        <span
            v-if="errors"
            class="text-red-500"
            v-text="errors"
        />
        <textarea
            v-if="type === 'textarea' && typeof modelValue === 'string'"
            :value="modelValue"
            :class="inputClasses"
            rows="5"
            @input="emitNewValue"
        />
        <input
            v-else-if="
                (type === 'color' || type === 'colour') &&
                typeof modelValue === 'string'
            "
            type="color"
            class="h-10 w-14 cursor-pointer p-1"
            :class="inputClasses"
            :value="modelValue"
            @input="emitNewValue"
        />
        <input
            v-else-if="typeof modelValue === 'number'"
            type="number"
            :value="modelValue"
            :class="inputClasses"
            @input="emitNewValue"
        />
        <input
            v-else
            :type="type"
            :value="modelValue"
            :class="inputClasses"
            @input="emitNewValue"
        />
    </label>
</template>

<style scoped></style>
