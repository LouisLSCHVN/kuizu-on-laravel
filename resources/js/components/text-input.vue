<script setup>
const model = defineModel({
    type: null,
    required: true,
})

defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: 'text'
    },
    message: String,
})
</script>

<template>
    <div class="flex flex-col gap-1">
        <label :for="name">{{ name }}</label>
        <textarea v-if="type === 'textarea'" v-model="model" :class="{'!ring-red-500':message}" class="input input-bordered w-full max-w-xs" />
        <input v-else :type="type" v-model="model" :class="{'!ring-red-500':message}" class="input input-bordered w-full" />
        <small class="text-red-400 font-bold" v-if="message">{{ message }}</small>
    </div>
</template>
