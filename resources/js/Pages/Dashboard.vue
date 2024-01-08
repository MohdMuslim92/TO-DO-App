<style src="../../css/DashboardStyles.css" />
<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

// Variable to track if the user is new
const isNewUser = ref(false);
const userTasks = ref([] as any[]);
const showModal = ref(false);
const newTask = ref({
    title: '',
    description: '',
    dueDate: '',
});
const fetchUserTasks = async () => {
    try {
        const response = await axios.get('/tasks');
        const userTasks = response.data.tasks;
        isNewUser.value = userTasks.length === 0;
    } catch (error) {
        console.error('Error fetching user tasks:', error);
    }
};

onMounted(() => {
    fetchUserTasks(); // Fetch user tasks when the component is mounted
});
const openModal = () => {
    showModal.value = true;
};
const closeModal = () => {
    showModal.value = false;
};

// Function to handle creating task
const submitTask = async () => {
    try {
        const response = await axios.post('/tasks', {
            title: newTask.value.title,
            description: newTask.value.description,
            dueDate: newTask.value.dueDate,
        });
        const createdTask = response.data.task;
        userTasks.value.push(createdTask);
        isNewUser.value = false;
        closeModal();
        // Clear newTask object after submission if needed
        newTask.value = { title: '', description: '', dueDate: '' };
    } catch (error) {
        console.error('Error creating task:', error);
    }
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Display welcome message -->
                        <h3 class="text-3xl font-bold mb-4">Welcome to the To-Do App!</h3>

                        <!-- Conditionally display "Create your first task" -->
                        <div v-if="isNewUser">
                            <p class="text-lg mb-6">Here's how to get started:</p>
                            <ul class="list-disc ml-6 mb-6">
                                <li class="text-lg">Create your first task by clicking the button below.</li>
                            </ul>
                            <button @click="openModal" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Create First Task
                            </button>

                            <!-- Modal for creating a task -->
                            <div v-if="showModal" class="modal">
                                <div class="modal-content">
                                    <span @click="closeModal" class="close">&times;</span>
                                    <h2 class="modal-title">Create a Task</h2>
                                    <form @submit.prevent="submitTask">
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input id="title" type="text" v-model="newTask.title" class="form-input" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description:</label>
                                            <textarea id="description" v-model="newTask.description" class="form-textarea"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="dueDate">Due Date:</label>
                                            <input id="dueDate" type="datetime-local" v-model="newTask.dueDate" class="form-input" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
