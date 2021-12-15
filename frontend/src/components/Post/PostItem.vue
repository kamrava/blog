<template>
  <div>
    <post-header />
    <post-body />
  </div>
</template>

<script>
import PostHeader from './Partials/PostHeader.vue'
import PostBody from './Partials/PostBody.vue'

export default {
  components: {
    PostBody,
    PostHeader,
  }
}
</script>
