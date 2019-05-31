/* global axios */

export default {
  /**
   * Retreives a single instant offer
   * @param {number} id ID of offer to retrieve
   * @returns {Promise} Axios response promise
   */
  fetch (id) {
    return axios.get('instant-offers/' + id)
  },

  /**
   * Retreives a paginated collection of instant offers
   * @param {number} pageNum Page to retrieve
   * @returns {Promise} Axios response promise
   */
  fetchPage (pageNum) {
    return axios.get('instant-offers?page=' + pageNum)
  },

  /**
   * Creates an instant offer
   * @param {object} offer Offer to create
   * @returns {Promise} Axios response promise
   */
  create (offer) {
    return axios.post('instant-offers', offer)
  },

  /**
   * Updates an instant offer
   * @param {object} offer Updated offer object
   * @returns {Promise} Axios response promise
   */
  update (offer) {
    return axios.patch('instant-offers/' + offer.id, offer)
  },

  /**
   * Deletes an instant offer from the database.
   * @param {number} id ID of offer to delete
   * @returns {Promise} Axios response promise
   */
  destroy (id) {
    return axios.delete('instant-offers/' + id)
  }
}
