<template>
    <CreateLink />
    <UrlList />
</template>

<script setup>
import { provide } from "vue";
import CreateLink from "./Links/CreateLink.vue";
import UrlList from "./Links/UrlList.vue";

const props = defineProps({
    user_id: { type: Number, required: true },
});

provide("user_id", props.user_id);
</script>
