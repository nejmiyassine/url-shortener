<template>
    <div
        class="flex items-center justify-between bg-white hover:bg-slate-100 p-4 rounded-md shadow-md mb-4"
    >
        <div>
            <p class="text-xl font-bold text-gray-800">
                {{ item.shorten_url }}
            </p>
            <p class="text-md font-semibold text-gray-700">
                {{ item.full_url }}
            </p>
            <p class="text-sm text-gray-600">{{ item.created_at }}</p>
            <div class="flex items-center gap-1 p-1 rounded-md">
                <Eye size="20" />
                <p class="font-semibold">{{ item.visits }}</p>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <button
                @click="store.editUrl(item)"
                class="cursor-pointer p-2 rounded-md bg-green-500 text-white hover:underline focus:outline-none"
            >
                <Pencil size="16" />
            </button>
            <button
                class="cursor-pointer p-2 rounded-md bg-red-500 text-white hover:underline focus:outline-none"
            >
                <Trash
                    @click="store.deleteUrl(item.shorten_url, user_id)"
                    size="16"
                />
            </button>
            <a
                :href="item.full_url"
                target="_blank"
                class="cursor-pointer p-2 rounded-md bg-blue-500 text-white hover:underline focus:outline-none"
            >
                <ExternalLink size="16" />
            </a>
            <button
                @click="store.copyUrl(item.shorten_url)"
                class="cursor-pointer p-2 rounded-md bg-black text-white hover:underline focus:outline-none"
            >
                <Copy size="16" />
            </button>
        </div>
    </div>
</template>

<script setup>
import { Pencil, Trash, Eye, ExternalLink, Copy } from "lucide-vue-next";
import { inject } from "vue";
import { useUrlStore } from "@/store/useUrlStore";

const store = useUrlStore();

const user_id = inject("user_id");

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
});
</script>
