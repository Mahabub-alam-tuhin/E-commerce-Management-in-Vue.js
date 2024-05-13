<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
      <span class="text-muted fw-light">Dashboard/</span> Products Management
    </h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
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
                <label class="form-label" for="basic-icon-default-phone"
                  >category_id</label
                >
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"
                    ><i class="ti ti-phone"></i
                  ></span>
                  <input
                    type="text"
                    name="category_id"
                    id="basic-icon-default-phone"
                    class="form-control phone-mask"
                    placeholder="658 799 8941"
                    aria-label="658 799 8941"
                    aria-describedby="basic-icon-default-phone2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone"
                  >Description</label
                >
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"
                    ><i class="ti ti-phone"></i
                  ></span>
                  <input
                    type="text"
                    name="Description"
                    id="basic-icon-default-phone"
                    class="form-control phone-mask"
                    placeholder="658 799 8941"
                    aria-label="658 799 8941"
                    aria-describedby="basic-icon-default-phone2"
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
                  <span id="basic-icon-default-phone2" class="input-group-text"
                    ><i class="ti ti-phone"></i
                  ></span>
                  <input
                    type="text"
                    name="Price"
                    id="basic-icon-default-phone"
                    class="form-control phone-mask"
                    placeholder="658 799 8941"
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
                  <span id="basic-icon-default-phone2" class="input-group-text"
                    ><i class="ti ti-phone"></i
                  ></span>
                  <input
                    type="text"
                    name="Stock_quantity"
                    class="form-control phone-mask"
                    placeholder="658 799 8941"
                    aria-label="658 799 8941"
                    aria-describedby="basic-icon-default-phone2"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone"
                  >status</label
                >
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"
                    ><i class="ti ti-phone"></i
                  ></span>
                  <input
                    type="text"
                    name="status"
                    id="basic-icon-default-phone"
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
export default {
  methods: {
    SubmitHandler: async function (event) {
      let formData = new FormData(event.target);
//       for(let entries of formData.entries() ){
//            console.log(entries);
//       }
      let response = axios.post("api/create-products", formData);
      console.log("daaaata",response);
       window.toaster('Product Added Successfully','success');
      // event.target.reset();
    },
  },
};
</script>

<style lang="scss" scoped>
</style>