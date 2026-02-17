<script setup>
    import PanelLayout from '@/layouts/PanelLayout.vue';
    import HeadingPanel from '@/components/HeadingPanel.vue';
    import Form from '@/components/Form.vue';
    import AuthorController from '@/actions/App/Http/Controllers/AuthorController';
    import { router } from '@inertiajs/vue3';
    const props = defineProps({
        author: Array
    });
    const fields = [
        {
            slug: 'name',
            label: 'Name',
            type: 'text',
            value: props.author.name
        },
        {
            slug: 'bio',
            label: 'Bio',
            type: 'textarea',
            value: props.author.bio
        }
    ];
</script>

<template>
    <PanelLayout>
        <template #header>
            <HeadingPanel>Edit author</HeadingPanel>
        </template>
        <div>
            <Form method="PUT" :action="AuthorController.update(author.id).url" :fields="fields"/>
        </div>
    </PanelLayout>
</template>