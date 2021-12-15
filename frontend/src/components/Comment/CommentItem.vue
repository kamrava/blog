<template>
  <div>
    <q-item :style="{ 'margin-left': (comment.depth * 20) + 'px' }" :class="{'comment-reply' : comment.reply_to}">

      <q-item-section avatar top>
          <q-icon size="36px" color="grey" name="account_circle" />
      </q-item-section>

      <q-item-section top class="col-3 gt-sm">
        <q-item-label class="q-mt-sm">{{ comment.user }}</q-item-label>
      </q-item-section>

      <q-item-section top>
        <q-item-label caption lines="1">
          <span class="text-grey-8">{{ comment.created_at }}</span>
        </q-item-label>
        <q-item-label >
          {{ comment.body }}
        </q-item-label>
      </q-item-section>

      <q-item-section top side>
        <div class="text-grey-8 q-gutter-xs">
          <q-btn @click="reply(comment)" :disabled="isThirdLevel" class="gt-xs" size="12px" flat dense round icon="reply" />
        </div>
      </q-item-section>
    </q-item>
    <q-separator spaced />
  </div>
</template>
<script>

export default {
  props: {
    comment: {
      type: Object,
      required: true,
    },
  },
  computed: {
    isThirdLevel() {
      return this.comment.depth === 3
    }
  },
  methods: {
    reply(comment) {
      this.$emit('reply', comment)
    }
  }
};
</script>

<style >
.comment-reply {
  margin-left: 40px;
}
</style>
