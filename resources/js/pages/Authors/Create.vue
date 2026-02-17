<script setup>
import Form from '@/components/Form.vue';
import HeadingPanel from '@/components/HeadingPanel.vue';
import PanelLayout from '@/layouts/PanelLayout.vue';
import AuthorController from '@/actions/App/Http/Controllers/AuthorController';
const fields = [
    {
        slug: 'name',
        label: 'Name',
        type: 'text'
    },
    {
        slug: 'bio',
        label: 'Bio',
        type: 'textarea'
    }
];
</script>

<template>
    <PanelLayout>
        <template #header>
            <HeadingPanel>Create new author</HeadingPanel>
        </template>
        <div>
            <Form method="POST" :action="AuthorController.store().url" :fields="fields"></Form>
        </div>
    </PanelLayout>
</template>