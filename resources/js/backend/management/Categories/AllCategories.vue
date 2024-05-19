<template>
        <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4" style="color:#fff">
      <span class="text-muted fw-light"></span> All Categories
    </h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Table Basic</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>name</th>
              <th>Url_slug </th>
              <th>Parent_cat_id</th>
              <th>status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="categorie in categories" :key="categorie.id">
              <td>{{ categorie.id }}</td>
              <td>{{ categorie.name }}</td>
              <td>{{ categorie.Url_slug }}</td>
              <td>{{ categorie.Parent_cat_id }}</td>
              <td>{{ categorie.status }}</td>
              <td>
                <router-link
                  :to="{ name: `EditCategories`, params: { id: categorie.id } }"
                  class="btn btn-success"
                  >Edit</router-link
                >
                <button class="btn btn-danger" @click="deletecategorie(categorie.id)">
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      categories: [],
    };
  },
  created() {
    this.fetchcategories();
  },
  methods: {
    async fetchcategories() {
      let response = await axios.get("api/get-categories");
      this.categories = response.data.categories;
        //     console.log( this.users);

    },
    deletecategorie(categorieId) {
      if (confirm("Are you sure you want to delete this user?")) {
        axios
          .delete(`api/delete-categories/${categorieId}`)
          .then((response) => {
            this.fetchcategories();
          })
          .catch((error) => {
            console.error("Error deleting categories:", error);
          });
      }
    },
  },
};
</script>

<style lang="scss" scoped>

</style>