<template>
    <q-form
      @submit="create"
      ref="commentForm"
      class="q-gutter-md"
    >
      <q-input
        filled
        v-model="comment.user"
        label="Your name"
        hint="Name and surname"
        lazy-rules
        :rules="[ val => val && val.length > 0 || 'Please type your name']"
      />

      <q-card v-if="reply">
        <q-card-section>
          <div class="text-subtitle2">You are replying to {{ reply.user }}</div>
        </q-card-section>

        <q-separator dark />

        <q-card-actions>
          <q-btn @click="clearReply" flat no-caps>Cancel Reply</q-btn>
        </q-card-actions>
      </q-card>

      <q-input
        filled
        type="textarea"
        v-model="comment.body"
        label="Type your comment.."
        lazy-rules
        :rules="[
          val => val !== null && val !== '' || 'Please type your message'
        ]"
      />

      <div>
        <q-btn label="Submit" :disabled="saving" :loading="saving" type="submit" color="primary"/>
      </div>
    </q-form>
</template>

<script>
import CommentMixin from '../../mixins/CommentMixin'

export default {
  mixins: [ CommentMixin ],
  props: {
    reply: {
      type: Object
    }
  },
  data() {
    return {
      saving: false,
    }
  },
  methods: {
    create() {
      this.$refs.commentForm.validate().then( success => {
        if (success) {
          this.saving = true;
          this.comment.parent_id = this.reply ? this.reply.id : null
          this.comment.create( ({message}) => {
            this.$emit('submit')
            this.clearReply();
            this.$q.notify({
              message: message,
              color: 'positive',
            });
            this.$refs.commentForm.resetValidation()
            this.saving = false;
          });
        }
      })
    },
    clearReply() {
      this.$emit('clearReply')
    }
  },
}
</script>
