<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4" style="color:#fff">
      <span class="text-muted fw-light"></span> All Order
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
              <td>
                <div class="dropdown">
                  <button
                    class="btn btn-outline-secondary dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    {{ order.order_status === "pending" ? "Pending" : "Confirm" }}
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button
                      class="dropdown-item"
                      @click="toggleOrderStatus(order)"
                    >
                      {{ order.order_status === "pending" ? "Confirm" : "Pending" }}
                    </button>
                  </div>
                </div>
              </td>

              <td>
                <router-link
                  :to="{ name: 'DetailsOrders', params: { id: order.id } }"
                  class="btn btn-success"
                >
                  Details
                </router-link>
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
import axios from 'axios';

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
      } catch (error) {
        console.error("Error fetching orders:", error);
      }
    },
    async toggleOrderStatus(order) {
      const newStatus = order.order_status === "pending" ? "confirm" : "pending";
      try {
        await axios.put(`/api/update-order/${order.id}`, {
          status: newStatus,
        });
        order.order_status = newStatus;
      } catch (error) {
        console.error("Error updating order status:", error);
      }
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
