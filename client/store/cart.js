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
    // Check if the product is already on cart
    const x = state.products.find(p => p.id === product.id)

    // If it is, increment quantity
    // If it isn't, add it to cart
    if (x)
      x.quantity += product.quantity
    else
      state.products.push(product)
  },
  REMOVE_FROM_CART (state, index) {
    state.products.splice(index, 1)
  },
}

export const actions = {
  add ({ commit }, product) {
    commit('ADD_TO_CART', product)
  },
  remove ({ commit }, index) {
    commit('REMOVE_FROM_CART', index)
  },
}
