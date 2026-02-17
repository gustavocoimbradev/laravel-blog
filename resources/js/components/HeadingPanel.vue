<script setup>
    import { Link } from '@inertiajs/vue3';
    defineProps({
        button: Array
    })
</script>
<template>
    <div class="flex gap-4 justify-between items-center">
        <h3 class="text-lg font-bold text-slate-600">
            <slot/>
        </h3>
        <Link v-if="button" class="button button--primary" :href="button.href">
            {{ button.title }}
        </Link>
    </div>
</template>