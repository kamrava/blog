<template>
  <q-header elevated reveal style="height: 70px; line-height: 70px">
    <q-toolbar>
      <q-toolbar-title>A Blog Website</q-toolbar-title>
      <q-tabs class="gt-sm" v-model="tab" indicator-color="white" style="height: 70px">
        <q-tab name="news" label="News" no-caps />
        <q-tab name="popular" label="Popular" no-caps />
        <q-tab name="articles" label="Articles" no-caps />
        <q-tab name="web-design" label="Web Design" no-caps />
        <q-tab name="about-us" label="About us" no-caps />
      </q-tabs>

      <q-btn class="lt-md" round flat icon="view_week" />

      <q-btn class="gt-sm" flat round dense icon="whatshot" />
    </q-toolbar>
  </q-header>
</template>

<script>
export default {
  data() {
    return {
      tab: 'news'
    }
  },
}
</script>
