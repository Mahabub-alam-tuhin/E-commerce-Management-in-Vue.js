<template>
     <div class="container">
    <h1>Edit User</h1>
    <form @submit.prevent="updatecategories">
      <div class="form-group">
        <label for="name">Name:</label>
        <input
          type="text"
          class="form-control"
          id="name"
          v-model="categories.name"
          required
          name="name"
        />
      </div>
      <div class="form-group">
        <label for="email">Parent_cat_id:</label>
        <input
          type="text"
          class="form-control"
          id="email"
          v-model="categories.Parent_cat_id"
          required
          name="Parent_cat_id"
        />
      </div>
      <div class="form-group">
        <label for="email">status:</label>
        <input
          type="text"
          class="form-control"
          id="email"
          v-model="categories.status"
          required
          name="status"
        />
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      categories: {
        name: "",
        Parent_cat_id: "",
        Url_slug: "",
        status: "",
      },
      categoriesId: "",
    };
  },
  created() {
    this.categoriesId = this.$route.params.id;
    this.geSinglecategoriesData();
  },
  methods: {
    async geSinglecategoriesData() {
      try {
        let response = await axios.get(`api/get-single-categories/${this.categoriesId}`);
        console.log("dd", response);
        if (response.data.categories) {
          let data = response.data.categories;
          this.categories.name = data.name;
          this.categories.Url_slug = data.Url_slug;
          this.categories.Parent_cat_id = data.Parent_cat_id;
          this.categories.status = data.status;
        }
      } catch (error) {
        console.error("Error fetching user data:", error);
      }
    },
    async updatecategories() {
      try {
        let formData = new FormData(event.target);
        await axios.post(`api/update-categories/${this.categoriesId}`, formData);
        window.s_alert();
        this.$router.push({ name: `AllCategories` });
      } catch (error) {
        console.error("Error updating categories:", error);
      }
    },
    handleFileChange(event) {
      // Handle file change if needed
    },
  },
};
</script>
<style lang="scss" scoped>

</style>