import Comment from "../models/Comment";
export default {
  data() {
    return {
      comment: this.initialize()
    }
  },
  methods: {
    initialize() {
      return new Comment({
        body: '',
        user: '',
        parent_id: null
      })
    }
  }
}
