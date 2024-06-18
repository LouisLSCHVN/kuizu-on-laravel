<template>
    <header class="navbar bg-base-100 fixed z-50 w-full bg-indigo-100">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                </div>
                <ul v-if="$page.props.auth && $page.props.auth.user" tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a :href="route('quizz.create')">Créer</a></li>
                    <li><a>Jouer</a></li>
                    <li><a>Compte</a></li>
                    <li>
                        <form @submit.prevent="useForm({}).post(route('auth.logout'))" method="POST">
                            <button type="submit" class="link link-error">Deconnexion</button>
                        </form>
                    </li>
                </ul>
                <ul v-else tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a :href="route('auth.login')">Connexion</a></li>
                    <li><a :href="route('auth.register')">Inscription</a></li>
                    <li><a>Découvrir</a></li>
                </ul>
            </div>
            <p class="link ml-2" v-if="$page.props.auth && $page.props.auth.user">
                {{ $page.props.auth && $page.props.auth.user.username }}
            </p>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </button>
            <button class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
            <button class="btn btn-ghost btn-circle">
                <a :href="route('home')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </a>
            </button>
        </div>
    </header>
</template>
<script setup>
import {useForm} from "@inertiajs/vue3";
</script>
<script>

export default {
    name: "Header",
}
</script>
