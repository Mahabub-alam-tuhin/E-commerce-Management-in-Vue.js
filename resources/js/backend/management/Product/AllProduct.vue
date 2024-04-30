<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
      <span class="text-muted fw-light">Tables /</span> Basic Tables
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
              <th>category_id</th>
              <th>Stock_quantity</th>
              <th>price</th>
              <th>description</th>
              <th>status</th>
              <th>image</th>            
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products" :key="product.id">
              <td>{{ product.id }}</td>
              <td>{{ product.name }}</td>
              <td>{{ product.category_id }}</td>
              <td>{{ product.Stock_quantity }}</td>
              <td>{{ product.Price }}</td>
              <td>{{ product.Description }}</td>
              <td>{{ product.status }}</td>
              <td>
                <img :src="product.image" alt="" height="20" width="30" />
              </td>
              <td>
                <router-link
                  :to="{ name: `EditProducts`, params: { id: product.id } }"
                  class="btn btn-success"
                  >Edit</router-link
                >
                <button class="btn btn-danger" @click="deleteProduct(product.id)">
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
      products: [],
    };
  },
  created() {
    this.fetchproducts();
  },
  methods: {
    async fetchproducts() {
      let response = await axios.get("api/get-products");
      this.products = response.data.product;
             console.log(response.data.product);
    },
    deleteProduct(productId) {
      if (confirm("Are you sure you want to delete this product?")) {
        axios
          .delete(`api/delete-product/${productId}`)
          .then((response) => {
            this.fetchproducts();
          })
          .catch((error) => {
            console.error("Error deleting product:", error);
          });
      }
    },
  },
};
</script>

<style lang="scss" scoped>
</style>