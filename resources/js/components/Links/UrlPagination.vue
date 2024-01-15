<template>
    <div class="flex justify-between mt-4">
        <button
            @click="store.previousPage(user_id)"
            :disabled="store.getCurrentPage === 1"
            class="px-4 py-2 bg-gray-300 rounded-md cursor-pointer"
            :class="{ 'opacity-50': store.getCurrentPage === 1 }"
        >
            Previous Page
        </button>

        <button
            @click="store.nextPage(user_id)"
            :disabled="store.getCurrentPage === store.getTotalPages"
            class="px-4 py-2 bg-gray-300 rounded-md cursor-pointer"
            :class="{
                'opacity-50': store.getCurrentPage === store.getTotalPages,
            }"
        >
            Next Page
        </button>
    </div>
</template>
<script setup>
import { useUrlStore } from "@/store/useUrlStore";
import { inject } from "vue";

const store = useUrlStore();
const user_id = inject("user_id");
</script>
