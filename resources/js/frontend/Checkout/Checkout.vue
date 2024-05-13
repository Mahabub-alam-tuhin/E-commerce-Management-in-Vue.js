<template>
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
        <div class="col-lg-12 col-12">
          <div class="checkout-form">
            <h2>Make Your Checkout Here</h2>
            <p>Please register in order to checkout more quickly</p>
            <!-- Form -->
            <form class="form" @submit.prevent="SubmitHandler">
              <div class="row">
                <div class="col-lg-6">
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
                  </div>

                  <div class="col-12 single-widget get-button">
                    <div class="content">
                      <div class="button">
                        <button class="btn">Confirm Order</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="col-lg-12 col-12">
                    <div class="order-details">
                      <!-- Order Widget -->
                      <div class="single-widget">
                        <h2>CART TOTALS</h2>
                        <div class="content">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Sub Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr
                                v-for="(item, index) in cartItems"
                                :key="item.product_id"
                              >
                                <td>
                                  <input
                                    type="hidden"
                                    :name="`card_items[${index}][id]`"
                                    :value="item.product_id"
                                  />
                                  {{ item.product_name }}
                                </td>
                                <td>{{ item.product_price }}</td>
                                <td>
                                  <input
                                    type="text"
                                    :name="`card_items[${index}][qty]`"
                                    class="input-number"
                                    data-min="1"
                                    data-max="100"
                                    v-model="item.product_quantity"
                                    @input="updateTotalAmount()"
                                  />
                                </td>
                                <!-- <td>{{ item.product_quantity }}</td> -->
                                <td>{{ calculateSubtotal(item) }}</td>
                              </tr>
                              <tr>
                                <td colspan="3">Total</td>
                                <td>{{ totalamount }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!--/ End Order Widget -->
                      <!-- Payment Method Widget -->
                      <div class="single-widget payement">
                        <div class="content">
                          <img
                            src="frontEndAsset/images/payment-method.png"
                            alt="#"
                          />
                        </div>
                      </div>
                      <!--/ End Payment Method Widget -->
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <!--/ End Form -->
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
  data() {
    return {
      totalamount: 0,
      cartItems: [],
    };
  },
  created: async function () {
    this.totalcartamount();
  },
  methods: {
    SubmitHandler: async function (event) {
      let formData = new FormData(event.target);
      formData.append("amount", this.totalamount);
      let response = await axios.post("api/create-order", formData);
      // console.log("data", response.data);
      if (formData) {
        window.toaster("Order successfully added", "success");
      } else {
        window.toaster("Failed to add Order", "error");
      }
      event.target.reset();
    },
    async totalcartamount() {
      let response = await axios.get("api/cart-products");
      // console.log("test",response);
      let total = 0;
      response.data.cart.forEach((Item) => {
        // console.log("test",Item.product.price);
        total += Number(Item.Quantity) * Number(Item.product.Price);
        let cartProducts = {};
        cartProducts.product_id = Item.product.id;
        cartProducts.product_name = Item.product.name;
        cartProducts.product_price = Item.product.Price;
        cartProducts.product_quantity = Item.Quantity;
        cartProducts.totalamount =
          Number(Item.Quantity) * Number(Item.product.Price);
        this.cartItems.push(cartProducts);
        this.totalamount += cartProducts.totalamount;
        // console.log("test", cartProducts);
      });
      this.totalamount = total;
      // console.log("amount",this.totalamount);
    },
    calculateSubtotal(item) {
      return (item.product_price * item.product_quantity).toFixed(2);
    },
    updateTotalAmount() {
      this.totalamount = this.cartItems.reduce((total, item) => {
        return total + item.product_price * item.product_quantity;
      }, 0);
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