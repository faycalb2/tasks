<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps({
    tasks: Object,
});
</script>

<template>
    <AuthenticatedLayout>
        <Head title="My Tasks" />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-if="!tasks.length">No tasks, yet.</div>

                    <div v-else>
                        <ul>
                            <li v-for="task in tasks" class="flex justify-between">
                                <span>{{ task.name }}</span>
                                <div>
                                    <span>Edit</span>
                                    <span>Delete</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </AuthenticatedLayout>
</template>
