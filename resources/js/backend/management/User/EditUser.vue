<template>
  <div class="container">
    <h1>Edit User</h1>
    <form @submit.prevent="updateUser">
      <div class="form-group">
        <label for="name">Name:</label>
        <input
          type="text"
          class="form-control"
          id="name"
          v-model="user.name"
          required
          name="name"
        />
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input
          type="email"
          class="form-control"
          id="email"
          v-model="user.email"
          required
          name="email"
        />
      </div>
      <div class="form-group">
        <label for="email">phone:</label>
        <input
          type="phone"
          class="form-control"
          id="email"
          v-model="user.phone"
          required
          name="phone"
        />
      </div>
      <div class="form-group">
        <label for="email">status:</label>
        <input
          type="text"
          class="form-control"
          id="email"
          v-model="user.status"
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
      user: {
        name: "",
        email: "",
        phone: "",
        status: "",
      },
      userId: "",
    };
  },
  created() {
    this.userId = this.$route.params.id;
    this.geSingleUserData();
  },
  methods: {
    async geSingleUserData() {
      try {
        let response = await axios.get(`api/get-single-user/${this.userId}`);
        console.log("dd", response);
        if (response.data.user) {
          let data = response.data.user;
          this.user.name = data.name;
          this.user.email = data.email;
          this.user.phone = data.phone;
          this.user.status = data.status;
        }
      } catch (error) {
        console.error("Error fetching user data:", error);
      }
    },
    async updateUser() {
      try {
        let formData = new FormData(event.target);
        await axios.post(`api/update-user/${this.userId}`, formData);
        window.s_alert();
        this.$router.push({ name: `AllUser` });
      } catch (error) {
        console.error("Error updating user:", error);
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
