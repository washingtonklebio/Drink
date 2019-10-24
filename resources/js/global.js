import Vue from 'vue'

export const userKey = '__drink_user'
export const baseApiUrl = 'http://localhost:8080/api'

export function showError(e) {
    if (e && e.response && e.response.data && e.response.data.message) {
        Vue.toasted.global.defaultError({ message : e.response.data.message })
    } else if(typeof e === 'string') {
        Vue.toasted.global.defaultError({ message : e })
    } else {
        Vue.toasted.global.defaultError()
    }
}

export default { userKey, baseApiUrl, showError }