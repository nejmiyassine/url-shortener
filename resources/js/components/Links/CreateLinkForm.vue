<template>
    <form @submit.prevent="store.addUrl(user_id)">
        <div class="mb-4">
            <label
                for="full_url"
                class="block text-sm font-medium text-gray-600"
                >Full URL:</label
            >
            <div class="mt-1 flex items-center gap-4">
                <input
                    v-model="store.url.data.full_url"
                    type="text"
                    id="full_url"
                    placeholder="https://www.youtube.com"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                />

                <div class="flex gap-2" v-if="store.url.updating">
                    <button
                        @click="store.updateUrl(user_id)"
                        type="button"
                        class="flex items-center gap-2 px-4 font-semibold py-2 bg-blue-600 hover:bg-blue-800 text-white rounded-md focus:outline-none"
                    >
                        <Link size="20" />
                        Update
                    </button>
                    <button
                        @click="store.cancelEdit"
                        type="button"
                        class="flex items-center gap-2 px-4 font-semibold py-2 bg-red-500 text-white rounded-md focus:outline-none hover:bg-red-700"
                    >
                        <XCircle size="20" />
                        Cancel
                    </button>
                </div>
                <div v-else>
                    <button
                        type="submit"
                        class="flex items-center gap-2 px-4 font-semibold py-2 bg-black text-white rounded-md focus:outline-none hover:bg-black/80"
                    >
                        <Link size="20" />
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div v-if="store.getValidationErrors">
        <ul>
            <li
                v-for="(error, index) in store.getValidationErrors"
                :key="index"
                class="bg-red-500 text-white px-2 py-1 rounded-md"
            >
                {{ error[0] }}
            </li>
        </ul>
    </div>
</template>
<script setup>
import { inject } from "vue";
import { Link, XCircle } from "lucide-vue-next";
import { useUrlStore } from "@/store/useUrlStore";

const store = useUrlStore();

const user_id = inject("user_id");
</script>
