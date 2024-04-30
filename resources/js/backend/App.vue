<template>
  <router-view></router-view>
</template>

<script>
export default {
  created: function () {
    console.log("ok");
    let preurl = window.sessionStorage.getItem("prevurl")
    window.location.hash = preurl || "#/dashboard";
  },
};
</script>

<style>
</style>