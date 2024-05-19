<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4" style="color: #fff">
      <span class="text-muted fw-light"></span> Products Management
    </h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4" style="background: #2f3349">
          <div
            class="card-header d-flex justify-content-between align-items-center"
          >
            <h5 class="mb-0">Create Products</h5>
          </div>
          <div class="card-body">
            <form @submit.prevent="SubmitHandler">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname"
                  >Product_name</label
                >
                <div class="input-group input-group-merge">
                  <span
                    id="basic-icon-default-fullname2"
                    class="input-group-text"
                    ><i class="ti ti-user"></i
                  ></span>
                  <input
                    type="text"
                    name="name"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    placeholder="John Doe"
                    aria-label="John Doe"
                    aria-describedby="basic-icon-default-fullname2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-category"
                  >Category ID</label
                >
                <div class="input-group input-group-merge">
                  <span
                    id="basic-icon-default-category2"
                    class="input-group-text"
                  >
                    <i class="ti ti-list"></i>
                  </span>
                  <select
                    name="category_id"
                    id="basic-icon-default-category"
                    class="form-control"
                    v-model="selectedCategory"
                    aria-describedby="basic-icon-default-category2"
                  >
                    <option value="">Select Category</option>
                    <option
                      v-for="category in categories"
                      :key="category.id"
                      :value="category.id"
                    >
                      {{ category.name }}
                    </option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-description"
                  >Description</label
                >
                <div class="input-group input-group-merge">
                  <span
                    id="basic-icon-default-description2"
                    class="input-group-text"
                    ><i class="ti ti-file"></i>
                  </span>
                  <input
                    type="text"
                    name="Description"
                    id="basic-icon-default-description"
                    class="form-control phone-mask"
                    placeholder="Description"
                    aria-label="658 799 8941"
                    aria-describedby="basic-icon-default-description2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone"
                  >image</label
                >
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"
                    ><i class="ti ti-image"></i
                  ></span>
                  <input
                    type="file"
                    name="image"
                    id="basic-icon-default-phone"
                    class="form-control phone-mask"
                    placeholder="658 799 8941"
                    aria-label="658 799 8941"
                    aria-describedby="basic-icon-default-phone2"
                    accept=".jpg"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone"
                  >Price</label
                >
                <div class="input-group input-group-merge">
                  <span
                    id="basic-icon-default-phone2"
                    class="input-group-text"
                  ></span>
                  <input
                    type="text"
                    name="Price"
                    placeholder="price"
                    id="basic-icon-default-phone"
                    class="form-control phone-mask"
                    aria-label="658 799 8941"
                    aria-describedby="basic-icon-default-phone2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone"
                  >Stock_quantity</label
                >
                <div class="input-group input-group-merge">
                  <span
                    id="basic-icon-default-phone2"
                    class="input-group-text"
                  ></span>
                  <input
                    type="text"
                    name="Stock_quantity"
                    placeholder="stock_quantity"
                    class="form-control phone-mask"
                    aria-label="658 799 8941"
                    aria-describedby="basic-icon-default-phone2"
                  />
                </div>
              </div>

              <button
                type="submit"
                class="btn btn-primary waves-effect waves-light"
              >
                Send
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      categories: [],
      selectedCategory: "",
    };
  },
  created() {
    this.fetchCategories();
  },
  methods: {
    async fetchCategories() {
      try {
        const response = await axios.get("/api/get-categories");
        console.log("category", response);
        this.categories = response.data.categories;
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    },
    async SubmitHandler(event) {
      const formData = new FormData(event.target);
      formData.set("category_id", this.selectedCategory); // Ensure category_id is correctly set
      try {
        const response = await axios.post("/api/create-products", formData);
        console.log("Product Added:", response.data);
        event.target.reset();
        window.toaster("Product Added Successfully", "success");
        this.selectedCategory = "";
      } catch (error) {
        console.error("Error adding product:", error);
      }
    },
  },
};
</script>


<style lang="scss" scoped>
</style>