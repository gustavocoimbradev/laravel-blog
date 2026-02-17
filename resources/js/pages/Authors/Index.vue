<script setup>
    import PanelLayout from '@/layouts/PanelLayout.vue';
    import HeadingPanel from '@/components/HeadingPanel.vue';
    import Table from '@/components/Table.vue';
    import AuthorController from '@/actions/App/Http/Controllers/AuthorController';
    const props = defineProps({
        authors: Array
    })
    const columns = [
        {
            slug: 'id',
            title: 'ID'
        },
        {
            slug: 'name',
            title: 'Name'
        },
        {
            slug: 'bio',
            title: 'Bio'
        }
    ];
    const button = {
        'title': 'New author',
        'href': AuthorController.create()
    };
</script>

<template>

  <PanelLayout>
    <template #header>
      <HeadingPanel :button="button">Authors</HeadingPanel>
    </template>
    <div>
        <Table :columns="columns" :items="authors" parent="authors"/>
    </div>
  </PanelLayout>

</template>