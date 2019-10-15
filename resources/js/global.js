import Vue from 'vue'

export const userKey = '__knowledge_user'
export const baseApiUrl = 'http://localhost:8080/api'

export function showError() {
    Vue.toasted.global.defaultError()
}

export default { userKey, baseApiUrl, showError }