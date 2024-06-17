<template>
    <header>
        <nav>
            <a :href="route('home')">Home</a>

            <form v-if="$page.props.auth.user" :action="route('logout')" method="POST">
            <button type="submit">Logout</button>
            </form>
            <div v-else>
                <a :href='route("auth.login")'>Login</a>
                <a :href='route("auth.register")'>Register</a>
            </div>
        </nav>
    </header>
</template>
<script>
export default {
    name: "Header",
}
</script>
