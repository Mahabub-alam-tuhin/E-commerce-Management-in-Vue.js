<template>
         <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4" style="color:#fff">
      <span class="text-muted fw-light"></span> All User
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
              <th>email</th>
              <th>phone</th>
              <th>status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.id">
              <td>{{ user.id }}</td>
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
              <td>{{ user.phone }}</td>
              <td>{{ user.status }}</td>
              <td>
                <router-link
                  :to="{ name: `EditUser`, params: { id: user.id } }"
                  class="btn btn-success"
                  >Edit</router-link
                >
                <button class="btn btn-danger" @click="deleteUser(user.id)">
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
      users: [],
    };
  },
  created() {
    this.fetchUsers();
  },
  methods: {
    async fetchUsers() {
      let response = await axios.get("api/get-users");
      this.users = response.data.users;
        //     console.log( this.users);

    },
    deleteUser(userId) {
      if (confirm("Are you sure you want to delete this user?")) {
        axios
          .delete(`api/delete-user/${userId}`)
          .then((response) => {
            this.fetchUsers();
          })
          .catch((error) => {
            console.error("Error deleting user:", error);
          });
      }
    },
  },
};
</script>


<style lang="scss" scoped>

</style>