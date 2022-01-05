export const state = () => ({
  products: [],
})

export const getters = {
  quantity (state) {
    let quantity = 0

    state.products.forEach((product) => {
      quantity += product.quantity
    })

    return quantity
  },
}

export const mutations = {
  ADD_TO_CART (state, product) {
    state.products.push(product)
  },
}

export const actions = {
  add ({ commit }, product) {
    commit('ADD_TO_CART', product)
  },
}
