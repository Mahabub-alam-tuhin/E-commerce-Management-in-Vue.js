<template>
  <!-- Preloader -->

  <!-- End Preloader -->

  <!--/ End Header -->

  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="bread-inner">
            <ul class="bread-list">
              <li>
                <a href="index1.html">Home<i class="ti-arrow-right"></i></a>
              </li>
              <li class="active"><a href="blog-single.html">Checkout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <!-- Start Checkout -->
  <section class="shop checkout section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-12">
          <div class="checkout-form">
            <h2>Make Your Checkout Here</h2>
            <p>Please register in order to checkout more quickly</p>
            <!-- Form -->
            <form class="form" @submit.prevent="SubmitHandler">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>First Name<span>*</span></label>
                    <input
                      type="text"
                      name="firstname"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>Last Name<span>*</span></label>
                    <input
                      type="text"
                      name="lastname"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>Email Address<span>*</span></label>
                    <input
                      type="email"
                      name="email"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>Phone Number<span>*</span></label>
                    <input
                      type="number"
                      name="phone"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>Address<span>*</span></label>
                    <input
                      type="text"
                      name="address"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="form-group">
                    <label>Postal Code<span>*</span></label>
                    <input
                      type="text"
                      name="postcode"
                      placeholder=""
                      required="required"
                    />
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group create-account">
                    <input id="cbox" type="checkbox" />
                    <label>Create an account?</label>
                  </div>
                </div>
                <div class="col-6s single-widget get-button">
                  <div class="content">
                    <div class="button">
                      <button>proceed to checkout</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <!--/ End Form -->
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="order-details">
            <!-- Order Widget -->
            <div class="single-widget">
              <h2>CART TOTALS</h2>
              <div class="content">
                <ul>
                  <li>Sub Total<span>$330.00</span></li>
                  <li>(+) Shipping<span>$10.00</span></li>
                  <li class="last">Total<span></span></li>
                </ul>
              </div>
            </div>
            <!--/ End Order Widget -->
            <!-- Order Widget -->
            <div class="single-widget">
              <h2>Payments</h2>
              <div class="content">
                <div class="checkbox">
                  <label class="checkbox-inline" for="1"
                    ><input name="updates" id="1" type="checkbox" /> Check
                    Payments</label
                  >
                  <label class="checkbox-inline" for="2"
                    ><input name="news" id="2" type="checkbox" /> Cash On
                    Delivery</label
                  >
                  <label class="checkbox-inline" for="3"
                    ><input name="news" id="3" type="checkbox" /> PayPal</label
                  >
                </div>
              </div>
            </div>
            <!--/ End Order Widget -->
            <!-- Payment Method Widget -->
            <div class="single-widget payement">
              <div class="content">
                <img src="frontEndAsset/images/payment-method.png" alt="#" />
              </div>
            </div>
            <!--/ End Payment Method Widget -->
            <!-- Button Widget -->
            <div class="single-widget get-button">
              <div class="content">
                <div class="button">
                  <a href="#" class="btn">proceed to checkout</a>
                </div>
              </div>
            </div>
            <!--/ End Button Widget -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ End Checkout -->

  <!-- Jquery -->
</template>

<script>
export default {
  methods: {
    SubmitHandler: async function (event) {
      let formData = new FormData(event.target);
      let response = await axios.post("api/create-order", formData);
      console.log("data", response.data);
      event.target.reset();
    },
  },
};
</script>

<style lang="scss" scoped>
.shop.checkout .single-widget.get-button .btn {
  background: #333;
  line-height: 30px;
}
</style>