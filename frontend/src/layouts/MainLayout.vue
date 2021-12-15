<template>
  <q-layout
    view="lHh lpr lFf"
    class="shadow-2 rounded-borders"
  >

    <navbar />

    <q-page-container>
      <q-page class="q-gutter-y-lg">
        <post-item />
      </q-page>
    </q-page-container>

    <page-footer />

  </q-layout>
</template>

<script>
import Navbar from './Partials/Navbar.vue'
import PostItem from 'src/components/Post/PostItem'
import PageFooter from './Partials/PageFooter.vue'

export default {
  name: "MainLayout",
  components: {
    Navbar,
    PageFooter,
    PostItem
  },
};
</script>
