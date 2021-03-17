<template>
    <div class="car">
      <h2>{{ userId }}</h2>
      <p>{{ carName }}</p>
      <p>{{ carBrand  }}</p>
      <p>$ {{ carPrice }}</p>
      <a :href="carSlug" >Show</a>
      <image-component
        url="dummy"
        user-name="Test"
        time-stamp="1:00am"
        v-on:updated="retrieveData"
      />
    </div>
</template>

<script>
import axios from 'axios'
import ImageComponent from './ImageComponent'

const increment = state => state += 10

export default {
    name: 'CarComponent',
    props: ['userId', 'carName', 'carBrand', 'carPrice', 'carSlug'],
    components: {
      ImageComponent
    },
    data() {
        return {
            fetchedData: [] 
        }
    },
    methods: {
      async retrieveData() {
          try {
            const res = await axios.get('https://jsonplaceholder.typicode.com/todos')
            this.fetchedData = res.data
          } catch(e) {
            console.log(e)
          }
      }
    }
}
</script>