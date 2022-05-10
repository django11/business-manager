<template>
  <div class="card">
    <div class="card-header">Newest Companies</div>
    <div class="card-body">
      <div v-for="company in companies">
        <img v-if="company.logo" class="img-thumbnail" :src="company.logo"/>
        <p>{{ company.name }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "LatestCompaniesWidget",
  data() {
    return {
      companies: [],
    }
  },
  mounted() {
    this.getCompanies();
  },
  methods: {
    getCompanies() {
      axios.get('/api/companies').then((response) => {
        this.companies = response.data.data;
      })
    },
  }
}
</script>

<style scoped>

</style>
