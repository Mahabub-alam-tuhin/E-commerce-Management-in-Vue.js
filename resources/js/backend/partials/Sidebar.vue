<template>
  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="/dashboard" class="app-brand-link">
        <span class="app-brand-logo demo">
          <svg
            width="32"
            height="22"
            viewBox="0 0 32 22"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
              fill="#7367F0"
            />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
              fill="#161616"
            />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
              fill="#161616"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
              fill="#7367F0"
            />
          </svg>
        </span>
        <span class="app-brand-text demo menu-text fw-bold">Admin</span>
      </a>

      <a
        href="javascript:void(0);"
        class="layout-menu-toggle menu-link text-large ms-auto"
      >
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <!-- Existing menu items -->

      <!-- User Management -->
      <li class="menu-item open" @click="toggleDropdown('userManagementOpen')">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Users">User Management</div>
          <div class="badge bg-label-primary rounded-pill ms-auto">3</div>
        </a>
        <ul class="menu-sub" v-if="userManagementOpen">
          <li class="menu-item">
            <router-link :to="{ name: `CreateUser` }" class="menu-link">
              <div data-i18n="create user">Create User</div>
            </router-link>
          </li>
          <li class="menu-item">
            <router-link :to="{ name: `AllUser` }" class="menu-link">
              <div data-i18n="show user">All User</div>
            </router-link>
          </li>
        </ul>
      </li>

      <!-- Categories -->
      <li class="menu-item open" @click="toggleDropdown('categoriesOpen')">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Categories">Categories</div>
          <div class="badge bg-label-primary rounded-pill ms-auto">3</div>
        </a>
        <ul class="menu-sub" v-if="categoriesOpen">
          <li class="menu-item">
            <router-link :to="{ name: `CreateCategories` }" class="menu-link">
              <div data-i18n="create categories">Add Product Categories</div>
            </router-link>
          </li>
          <li class="menu-item">
            <router-link :to="{ name: `AllCategories` }" class="menu-link">
              <div data-i18n="show categories">All Product Categories</div>
            </router-link>
          </li>
        </ul>
      </li>

      <!-- Product Management -->
      <li
        class="menu-item open"
        @click="toggleDropdown('productManagementOpen')"
      >
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <!-- Replaced the existing icon with a different SVG -->
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M1 1H4V4H1V1ZM11 1H14V4H11V1ZM1 11H4V14H1V11ZM11 11H14V14H11V11ZM6 1H9V4H6V1ZM6 11H9V14H6V11ZM1 6H4V9H1V6ZM11 6H14V9H11V6Z"
              fill="#7367F0"
            />
          </svg>
          <!-- End of new SVG icon -->
          <div data-i18n="Product Management">Product Management</div>
          <div class="badge bg-label-primary rounded-pill ms-auto">3</div>
        </a>
        <ul class="menu-sub" v-if="productManagementOpen">
          <li class="menu-item">
            <router-link :to="{ name: `CreateProduct` }" class="menu-link">
              <div data-i18n="create product">Create Product</div>
            </router-link>
          </li>
          <li class="menu-item">
            <router-link :to="{ name: `AllProduct` }" class="menu-link">
              <div data-i18n="show product">All Product</div>
            </router-link>
          </li>
        </ul>
      </li>

      <!-- Order Management -->
      <li class="menu-item open" @click="toggleDropdown('orderManagementOpen')">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <!-- Replaced the existing icon with a different SVG -->
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16Z"
              fill="#7367F0"
            />
            <path
              d="M9 4C9 3.44772 8.55228 3 8 3C7.44772 3 7 3.44772 7 4V7H4C3.44772 7 3 7.44772 3 8C3 8.55228 3.44772 9 4 9H7V12C7 12.5523 7.44772 13 8 13C8.55228 13 9 12.5523 9 12V9H12C12.5523 9 13 8.55228 13 8C13 7.44772 12.5523 7 12 7H9V4Z"
              fill="white"
            />
          </svg>
          <!-- End of new SVG icon -->
          <div data-i18n="Order Management">Order Management</div>
          <div class="badge bg-label-primary rounded-pill ms-auto">3</div>
        </a>
        <ul class="menu-sub" v-if="orderManagementOpen">
          <li class="menu-item">
            <router-link :to="{ name: `AllOrders` }" class="menu-link">
              <div data-i18n="show orders">All Orders</div>
            </router-link>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
</template>

<script>
export default {
  data() {
    return {
      userManagementOpen: false,
      categoriesOpen: false,
      productManagementOpen: false,
      orderManagementOpen: false,
    };
  },
  methods: {
    toggleDropdown(prop) {
      this[prop] = !this[prop];
    },
  },
};
</script>

<style>
</style>