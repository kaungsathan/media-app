import { createStore } from 'vuex'

export default createStore({
  state: {
    userAcc: {},
    token: '',
  },
  getters: {
    getToken: state => state.token,
    getUserAcc: state => state.userAcc
  },
  mutations: {
  },
  actions: {
    setToken: ({ state }, value) => state.token = value,
    setUserAcc: ({ state }, value) => state.userAcc = value
  },
  modules: {
  }
})
