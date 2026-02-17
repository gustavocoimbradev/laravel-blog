<script setup>
    import { reactive } from 'vue';
    import { router } from '@inertiajs/vue3';
    import AuthorController from '@/actions/App/Http/Controllers/AuthorController';
    const props = defineProps({
        fields: Array,
        method: String,
        action: String
    })
    const back = () => {
        router.visit(AuthorController.index());
    }
    const form = reactive({});
    props.fields.forEach(field => {
        form[field.slug] = field.value || '';
    })
    const submit = () => {
        router[props.method.toLowerCase()](props.action, form);
    }
</script>

<template>

    <form :method="method" class="flex flex-col gap-4" @submit.prevent="submit">

        <fieldset v-for="field in fields" class="flex flex-col">
            <label :for="field.slug" class="mb-2 text-slate-700">{{ field.label }}</label>
            <input v-if="field.type === 'text'" v-model="form[field.slug]" class="p-2 outline-none border border-slate-200"/>
            <textarea v-if="field.type === 'textarea'" v-model="form[field.slug]" class="p-2 outline-none resize-none border border-slate-200"></textarea>
        </fieldset>

        <div class="flex gap-3">
            <button type="button" class="button button--secondary" @click="back">Cancel</button>
            <button type="submit" class="button button--primary">Confirm</button>
        </div>

    </form>

</template>