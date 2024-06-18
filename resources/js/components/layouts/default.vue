<template>
    <Head :title="props.title" />
    <Header />
    <main class="pt-[100px] px-5">
        <slot />
    </main>
</template>
<script setup>
import Header from "../header.vue";
import {Head} from '@inertiajs/vue3';

const props = defineProps({
    title: {
        type: String,
        required: false,
        default: "Kuizu"
    }
})
</script>
