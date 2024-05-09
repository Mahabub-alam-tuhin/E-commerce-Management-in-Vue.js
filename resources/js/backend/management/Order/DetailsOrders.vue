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
              <th>Firstname</th>
              <th>lastname</th>
              <th>email</th>
              <th>phone</th>
              <th>address</th>
              <th>postcode</th>
              <th>amount</th>
              <th>Product Name</th>
              <th>Product Price</th>
              <th>Product Quantity</th>
              <th>order_status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ order.id }}</td>
              <td>{{ order.firstname }}</td>
              <td>{{ order.lastname }}</td>
              <td>{{ order.email }}</td>
              <td>{{ order.phone }}</td>
              <td>{{ order.address }}</td>
              <td>{{ order.postcode }}</td>
              <td>{{ order.amount }}</td>
              <td>{{ order.order_status }}</td>
              <td>
                <!-- Add actions here if needed -->
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
import axios from "axios";

export default {
  data() {
    return {
      order: {}, // Rename orderDetails to order
    };
  },
  created() {
    this.fetchOrderDetails();
  },
  methods: {
    async fetchOrderDetails() {
      try {
        const id = this.$route.params.id;
        //         console.log("ID:", this.$route.params.id);
        const response = await axios.get(`/api/details/${id}`);
        console.log("Response:", response);
        this.order = response.data.order;
      } catch (error) {
        console.error("Error fetching order details:", error);
      }
    },
  },
};
</script>




<style lang="scss" scoped>
</style>