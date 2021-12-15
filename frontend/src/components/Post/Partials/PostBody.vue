<template>
  <div class="row justify-center">
    <div class="col-md-5 col-xs-10">
      <h5 style="margin: 20px 0">
        Lorem Ipsum: when, and when not to use it
      </h5>
      <p class="text-body1" style="line-height: 40px">
        Do you like Cheese Whiz? Spray tan? Fake eyelashes? That's what is
        Lorem Ipsum to many—it rubs them the wrong way, all the way. It's
        unreal, uncanny, makes you wonder if something is wrong, it seems
        to seek your attention for all the wrong reasons. Usually, we
        prefer the real thing, wine without sulfur based preservatives,
        real butter, not margarine, and so we'd like our layouts and
        designs to be filled with real words, with thoughts that count,
        information that has value.
        <br />
        The toppings you may chose for that TV dinner pizza slice when you
        forgot to shop for foods, the paint you may slap on your face to
        impress the new boss is your business. But what about your daily
        bread? Design comps, layouts, wireframes—will your clients accept
        that you go about things the facile way? Authorities in our
        business will tell in no uncertain terms that Lorem Ipsum is that
        huge, huge no no to forswear forever. Not so fast, I'd say, there
        are some redeeming factors in favor of greeking text, as its use
        is merely the symptom of a worse problem to take into
        consideration.
      </p>
      <div class="row">
        <div class="col-12">
          <h5 class="text-h5">{{ comments.length }} Comments</h5>
          <q-list class="rounded-borders full-width">
            <comment-item
              v-for="comment in comments"
              :key="comment.id"
              :comment="comment"
              @reply="reply"
            />
          </q-list>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h5 class="text-h5 q-pb-none">Leave A Reply</h5>
          <new-comment-form
            @submit="refreshList"
            @clearReply="clearReply"
            :reply="replyTo"
            ref="commentForm"
          />
        </div>
      </div>
    </div>
    <div class="col-3 gt-md">
      <most-read />
      <tags />
    </div>
  </div>
</template>

<script>
import NewCommentForm from "src/components/Comment/NewCommentForm.vue";
import CommentItem from "src/components/Comment/CommentItem";
import Comment from 'src/models/Comment'
import MostRead from 'src/components/MostRead.vue'
import Tags from 'src/components/Tags.vue'

export default {
  name: "MainLayout",
  components: {
    Tags,
    MostRead,
    CommentItem,
    NewCommentForm,
  },

  data() {
    return {
      tab: "news",
      loading: false,
      comments: [],
      replyTo: null,
      serverPagination: {
        page: 1,
        sortBy: 'id',
        rowsPerPage: 15,
        descending: true,
        rowsNumber: 10
      },
    };
  },
  methods: {
      getComments({pagination}) {
        this.loading = true
        Comment.all(`sort_by=${pagination.sortBy}&sort_type=${pagination.descending ? 'desc' : 'asc'}&page=${pagination.page}&per_page=${pagination.rowsPerPage}`, ({data}) => {
          this.comments = data
          this.loading = false
        }).catch(error => {
            if(error.data) {
                this.$q.notify({
                  message: error.data.error,
                  color: 'negative',
                  icon: 'far fa-exclamation-triangle'
                })
            }
          this.loading = false
        })
      },
      refreshList() {
        this.getComments({
          pagination: this.serverPagination
        })
      },
      reply(comment) {
        this.replyTo = comment
        this.$refs.commentForm.$el.scrollIntoView({behavior: 'smooth'})
      },
      clearReply() {
        this.replyTo = null
      },
  },
  mounted() {
    this.refreshList();
  }
};
</script>
