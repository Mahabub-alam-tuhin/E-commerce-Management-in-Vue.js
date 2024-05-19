<template>
     <div class="container">
    <h1>Edit Products</h1>
    <form @submit.prevent="updateproducts">
      <div class="form-group">
        <label for="name">Name:</label>
        <input
          type="text"
          class="form-control"
          id="name"
          v-model="products.name"
          required
          name="name"
        />
      </div>
      <div class="form-group">
        <label for="email">category_id:</label>
        <input
          type="text"
          class="form-control"
          id="email"
          v-model="products.category_id"
          required
          name="category_id"
        />
      </div>
      <div class="form-group">
        <label for="email">Stock_quantity:</label>
        <input
          type="text"
          class="form-control"
          id="email"
          v-model="products.Stock_quantity"
          required
          name="Stock_quantity"
        />
      </div>
      <div class="form-group">
        <label for="email">Price:</label>
        <input
          type="text"
          class="form-control"
          id="email"
          v-model="products.Price"
          required
          name="Price"
        />
      </div>
      <div class="form-group">
        <label for="email">Description:</label>
        <input
          type="text"
          class="form-control"
          id="email"
          v-model="products.Description"
          required
          name="Description"
        />
      </div>
      <div class="form-group">
        <label for="email">status:</label>
        <input
          type="text"
          class="form-control"
          v-model="products.status"
          required
          name="status"
        />
      </div>
    <div class="form-group">
        <label for="image">Image: </label>

        <img
          :src="products.imagePrev"
          alt=""
          height="30"
          width="40"
          class="my-2"
        />
        <br />
        <input
          type="file"
          class="form-control-file"
          id="image"
          name="image"
          @change="handleFileChange"
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
      products: {
        name: "",
        category_id: "",
        Stock_quantity: "",
        Price: "",
        Description: "",
        image: "",
        imagePrev: "",
        status: "",
      },
      productsId: "",
    };
  },
  created() {
    this.productsId = this.$route.params.id;
    this.geSingleproductsData();
  },
  methods: {
    async geSingleproductsData() {
      try {
        let response = await axios.get(`api/get-single-products/${this.productsId}`);
        console.log("dd", response);
        if (response.data.products) {
          let data = response.data.products;
          this.products.name = data.name;
          this.products.category_id = data.category_id;
          this.products.Stock_quantity = data.Stock_quantity;
          this.products.Price = data.Price;
          this.products.Description = data.Description;
          this.product.imagePrev = data.image;
          this.products.status = data.status;
        }
      } catch (error) {
        console.error("Error fetching user data:", error);
      }
    },
    async updateproducts() {
      try {
        let formData = new FormData(event.target);
        await axios.post(`api/update-products/${this.productsId}`, formData);
        window.s_alert();
        this.$router.push({ name: `AllProduct` });
      } catch (error) {
        console.error("Error updating products:", error);
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