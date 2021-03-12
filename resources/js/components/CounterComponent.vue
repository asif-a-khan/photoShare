<template>
    <div class="counter">
        <h1>Count: {{ count }}</h1>
        <!-- Click event binding -->
        <!-- No callback functions in event -->
        <button class="btn btn-primary" @click="increment">In</button>
        <button @click="decrement">De</button>

        <h2 v-show="isVisible">v-show</h2>
        <h1 v-if="isVisible">Show</h1>
        <h1 v-else>Hide</h1>
        <button @click="isVisible = !isVisible">Toggle</button>

        <ul>
            <!-- Looping through data -->
            <list-component v-for="(todo, index) in todos" :key="index" :title="todo.title"></list-component>
        </ul>
    </div>
</template>

<script>
import ListComponent from './ListComponent'
import axios from 'axios'
export default {
    name: 'CounterComponent',
    // State with inital value
    components: {
        ListComponent
    },
    data() {
        return {
            isVisible: false,
            count: 0,
            todos: []
        }
    },
    // Methods
    methods: {
        increment() {
            this.count++
        },
        decrement() {
            this.count--
        },
        async getData() {
            try {
                const res = await axios.get('https://jsonplaceholder.typicode.com/todos')
                this.todos = res.data
            } catch(e) {
                console.log(e)
            }
        }
    },
    // componentDidMount()
    async mounted() {
        await this.getData()
    }
    // 'https://jsonplaceholder.typicode.com/todos/1'
}
</script>

<style lang="scss" scoped>
</style>