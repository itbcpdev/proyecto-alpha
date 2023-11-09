import { reactive } from 'vue'

export const store = reactive({
    indiceComponent: 1,
    increment() {
        this.indiceComponent++
    },
    decrement() {
        this.indiceComponent--
    },
    loggued : false
})
