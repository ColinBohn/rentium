export default {
  errors: {},

  /**
   * Determine if an errors exists for the given field.
   *
   * @param {string} field Form field name
   * @returns {boolean} Error exists
   */
  has (field) {
    return this.errors.hasOwnProperty(field)
  },

  /**
   * Determine if we have any errors.
   * @returns {boolean} Errors exist
   */
  any () {
    return Object.keys(this.errors).length > 0
  },

  /**
   * Retrieve the error message for a field.
   *
   * @param {string} field Form field name
   * @returns {Object} Error
   */
  get (field) {
    if (this.errors[field]) {
      return this.errors[field][0]
    }
  },

  /**
   * Update with new errors.
   *
   * @param {object} errors Errors from response
   */
  record (errors) {
    this.errors = errors
  },

  /**
   * Clear one or all error fields.
   *
   * @param {string|null} field Name of field to clear, or null to clear all
   */
  clear (field) {
    if (field) {
      delete this.errors[field]
    } else {
      this.errors = {}
    }
  }
}
