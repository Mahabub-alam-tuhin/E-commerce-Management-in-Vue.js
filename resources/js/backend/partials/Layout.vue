<template>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <Sidebar></Sidebar>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page" style="background-color:#30334C">
        <!-- Navbar -->

      <Header></Header>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <router-view></router-view>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
</template>

<script>
import Sidebar from "./Sidebar.vue";
import Header from "./Header.vue";
export default {
  components: { Sidebar, Header },
};
</script>

<style>
</style>