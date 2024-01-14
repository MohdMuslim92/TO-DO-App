<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();
</script>

<template>
    <Head title="Welcome" />

    <div class="min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <!-- Header Section -->
        <div class="flex justify-between items-center p-6 bg-blue-500 text-white border-b-4 border-white">
            <div class="flex items-center space-x-2">
                <img src="../../../resources/img/todo.png" alt="To-Do App Logo" class="h-8 w-auto">
                <h1 class="text-2xl font-semibold">To-Do App</h1>
            </div>
            <div class="flex items-center space-x-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="hover:text-gray-300 focus:text-gray-300"
                >Dashboard</Link>

                <template v-else>
                    <Link :href="route('login')" class="hover:text-gray-300 focus:text-gray-300">Log in</Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="hover:text-gray-300 focus:text-gray-300"
                    >Register</Link>
                </template>
            </div>
        </div>

        <!-- Body Section -->
        <div class="max-w-7xl mx-auto p-6 lg:p-8 bg-gradient-to-b from-blue-500 to-blue-400">
            <div class="flex justify-center">
                <div class="flex flex-col items-center">
                    <img src="../../../resources/img/todo.png" alt="To-Do App Logo" class="h-16 w-auto bg-gray-100 dark:bg-gray-900 rounded-lg shadow-md">
                    <h2 class="text-3xl font-semibold mt-4 text-white">To-Do App</h2>
                </div>
            </div>

            <div class="mt-12 text-center">
                <h2 class="text-4xl font-semibold mb-4 text-white">Welcome to the To-Do App!</h2>
                <p class="text-gray-200 dark:text-gray-400 mb-8 text-lg">
                    Manage your tasks efficiently with our user-friendly To-Do App. Stay organized and boost your productivity.
                </p>
                <Link
                    :href="route('dashboard')"
                    class="bg-white text-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300"
                >
                    Start Using the App
                </Link>
            </div>

            <!-- Visual Elements section -->
            <div class="mt-8 flex justify-center items-center flex-wrap gap-8">
                <h3 class="text-2xl font-semibold mb-4 text-white">See Our App in Action</h3>
                <!-- screenshots for the app -->
                <img
                    src="../../../resources/img/screenshot1.png"
                    alt="App Screenshot"
                    class="my-4 rounded-lg shadow-md max-w-xs transition-transform transform hover:scale-125"
                >
                <img
                    src="../../../resources/img/screenshot2.png"
                    alt="App Screenshot"
                    class="my-4 rounded-lg shadow-md max-w-xs transition-transform transform hover:scale-125"
                >
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
