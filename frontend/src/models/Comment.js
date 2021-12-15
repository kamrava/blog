import Form from 'src/utils/Form.js'

class Comment extends Form {
  constructor(data, config = null) {
    super(data, config || Form.config)
  }

  static all(parameters, then) {
    return new Form().get('comments' + '?' + parameters).then(then)
  }

  create(then) {
    return super.post('comments').then(then)
  }
}

export default Comment
