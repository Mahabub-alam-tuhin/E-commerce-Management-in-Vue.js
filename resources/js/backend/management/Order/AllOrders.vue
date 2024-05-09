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
              <th>order_status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="order in orders" :key="order.id">
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
                <router-link
                  :to="{ name: `DetailsOrders`, params: { id: order.id } }"
                  class="btn btn-success"
                  >Details</router-link>
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
      orders: [],
    };
  },
  created() {
    this.fetchOrders();
  },
  methods: {
    async fetchOrders() {
      try {
        const response = await axios.get("/api/get-order");
        this.orders = response.data.order;
        console.log(this.orders); 
      } catch (error) {
        console.error("Error fetching orders:", error);
      }
    },
  },
};
</script>


<style lang="scss" scoped>
</style>