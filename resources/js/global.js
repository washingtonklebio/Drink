import Vue from 'vue'

export const userKey = '__drink_user'
export const baseApiUrl = 'http://localhost:8080/api'

export function showError(e) {
    console.log(e)
    Vue.toasted.global.defaultError()
}

export default { userKey, baseApiUrl, showError }