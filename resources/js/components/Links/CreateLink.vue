<template>
    <div class="mt-10 grid place-content-center">
        <div class="text-center py-16">
            <h1 class="text-4xl font-extrabold leading-tight mb-4">
                Shorten Your Links, Amplify Your Reach
            </h1>
            <h3 class="text-lg font-medium opacity-75">
                Effortless URL Shortening for Enhanced Sharing and Analytics
            </h3>
        </div>

        <CreateLinkForm />
    </div>
</template>

<script>
import CreateLinkForm from "./CreateLinkForm.vue";

export default {
    components: {
        CreateLinkForm,
    },
};
</script>
