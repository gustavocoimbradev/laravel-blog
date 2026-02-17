<script setup>
    import { Link } from '@inertiajs/vue3';
    import AuthorController from '@/actions/App/Http/Controllers/AuthorController';
    // import PostController from '@/actions/App/Http/Controllers/PostController';
    const sidebar = [
        // {
        //     'title': 'Posts',
        //     'href': PostController.index
        // },
        {
            'title': 'Authors',
            'href': AuthorController.index()
        },
    ];
</script>

<template>

    <div class="flex-1 flex flex-col">
        <header class="w-full bg-slate-700 shadow-lg shadow-slate-300 flex items-center p-4">
            <Link class="text-base font-bold text-slate-200 bg-slate-900 py-2 px-4 transition-all ease-in-out duration-300 hover:bg-slate-950">Laravel Blog</Link>
        </header>
        <div class="flex flex-1">
            <aside class="h-full w-[300px] bg-white shadow-slate-300 p-4 flex flex-col">
                <Link v-for="item in sidebar" :href="item.href" class="p-2 transition-all ease-in-out duration-300 text-slate-600 hover:bg-slate-100">{{ item.title }}</Link>
            </aside>
            <main class="p-4 flex-1">
                <div class="flex flex-col bg-white shadow-slate-300">
                    <div class="p-4 border-b border-slate-200">
                        <slot name="header"/>
                    </div>
                    <div class="p-4">
                        <slot />
                    </div>
                </div>
            </main>
        </div>
    </div>
    
</template>