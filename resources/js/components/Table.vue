<script setup>
    import { Link } from '@inertiajs/vue3';
    const props = defineProps({
        columns: Array,
        items: Array,
        parent: String
    });
</script>

<template>

    <table class="w-full">
        <thead>
            <tr class="bg-slate-200 border-b border-slate-200/50 [&>th]:p-4">
                <th v-for="column in columns" class="text-left first-of-type:w-0">
                    {{ column['title'] }}
                </th>
                <th class="text-center p-4 w-0">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in items" class="odd:bg-slate-100/50 even:bg-slate-100 border-b border-slate-200/50 [&>td]:p-4">
                <td v-for="column in columns" class="text-left">
                    {{ item[column.slug] }}
                </td>
                <td class="text-center">
                    <Link class="cursor-pointer transition-all ease-in-out duration-300 hover:underline hover:text-slate-700" :href="`/${parent}/${item.id}/edit`">
                        Edit
                    </Link>
                </td>
            </tr>
        </tbody>
    </table>

</template>