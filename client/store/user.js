export const state = () => ({
  data: null,
})

export const mutations = {
  SET_USER (state, user) {
    state.data = user
  },
}

export const actions = {
  auth ({ commit }, user) {
    commit('SET_USER', user)
  },
}
