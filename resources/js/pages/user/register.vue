<template>
    <div class="w-2/4 mx-auto">
        <h1 class="text-5xl font-bold mb-10">Register</h1>
        <form @submit.prevent="
            form.post(route('auth.register.post'), {
                onError: () => form.reset('password', errors)
            })"
              class="flex flex-col gap-6"
        >
            <TextInput name="Name" v-model="form.username" :message="form.errors.username"/>
            <TextInput name="Email" v-model="form.email" :message="form.errors.email"/>
            <TextInput name="Password" type="password" v-model="form.password" :message="form.errors.password"/>
            <aside class="flex justify-between items-end">
                <p class="text-slate-600 mb-2">Create an account ?
                    <a class="link link-primary" :href="route('auth.register')">
                        Register
                    </a>
                </p>
            </aside>

            <div
                v-if="props.errors && props.errors.failed"
                role="alert"
                class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ props.errors.failed }}</span>
            </div>

            <div>
                <button :disabled="form.processing" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</template>
<script setup>
import {useForm} from "@inertiajs/vue3";
import TextInput from "../../components/text-input.vue";

const props = defineProps(['errors'])

const form = useForm({
    username: null,
    email: null,
    password: null,
})
</script>
