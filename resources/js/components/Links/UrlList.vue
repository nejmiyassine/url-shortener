<template>
    <div class="flex flex-col justify-center mt-5 max-w-5xl mx-auto">
        <div v-if="store.items && store.items.length > 0">
            <button @click="store.sortByMostVisited">
                Sort by <strong>Most Visited</strong>
            </button>
            <UrlListItem
                v-for="item in store.items"
                :key="item.id"
                :item="item"
            />
            <UrlPagination />
        </div>
        <div v-else>
            <div class="flex flex-col justify-center items-center">
                <div class="text-center">
                    <p class="text-md">Create Your First Shortened Url</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { inject, onMounted } from "vue";
import { useUrlStore } from "@/store/useUrlStore";
import UrlListItem from "./UrlListItem.vue";
import UrlPagination from "./UrlPagination.vue";

const store = useUrlStore();

const user_id = inject("user_id");

onMounted(() => store.getUrlsList(user_id));
</script>
