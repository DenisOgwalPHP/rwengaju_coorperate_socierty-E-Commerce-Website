<div>
    		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="/">Home<i class="ti-arrow-right"></i></a></li>
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
				    <form class="form" action="" wire:submit.prevent="placeOrder">
                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                                <h2>Make Your Checkout Here</h2>
                                {{-- <p>Please register in order to checkout more quickly</p> --}}
                                <!-- Form -->
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>First Name<span>*</span></label>
                                                <input type="text" name="name" placeholder="" required="required" wire:model="firstname">
                                                @error('firstname')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Last Name<span>*</span></label>
                                                <input type="text" name="name" placeholder="" required="required" wire:model="lastname">
                                                @error('lastname')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Email Address<span>*</span></label>
                                                <input type="email" name="email" placeholder="" required="required" wire:model="email">
                                                    @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Phone Number<span>*</span></label>
                                                <input type="text" name="number" placeholder="" required="required" wire:model="mobile">
                                                    @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Country<span>*</span></label>
                                                <input type="text" name="country" placeholder="" required="required" wire:model="country">
                                                    @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>District<span>*</span></label>
                                                <input type="text" name="district" placeholder="" required="required" wire:model="city">
                                                    @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>State / Divition<span>*</span></label>
                                                <input type="text" name="state" placeholder="" required="required" wire:model="province">
                                                    @error('province')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Address Line 1<span>*</span></label>
                                                <input type="text" name="address" placeholder="" required="required" wire:model="line1">
                                                    @error('line1')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Address Line 2</label>
                                                <input type="text" name="address" placeholder="" wire:model="line2">
                                                    @error('line2')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Postal Code<span>*</span></label>
                                                <input type="text" name="post" placeholder="" required="required" wire:model="zipcode">
                                                    @error('zipcode')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                <!--/ End Form -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="order-details">
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2> TOTAL AMOUNT</h2>
                                    <div class="content">
                                        <ul>
                                            <li class="last">Total<span>UGx{{ Session::get('checkout')['total'] }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>Payments</h2>
                                    <div class="content">
                                        <div class="checkbox">
                                            {{-- <label class="checkbox-inline" for="1"><input name="card" id="1" type="checkbox" wire:model="paymentmode" value="card"> Check Payments</label> --}}
                                            <label class="checkbox-inline" for="2"><input name="cod" id="2" type="radio" wire:model="paymentmode" value="cod"> Cash On Delivery</label>
                                            <label class="checkbox-inline" for="3"><input name="paypal" id="3" type="radio" wire:model="paymentmode" value="paypal"> PayPal</label>
                                            @error('paymentmode')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                            <div wire:ignore class="paypal box" id="paypal-button-container" style="display: none;"></div>
                                            <div class="cod box" style="display: none;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Payment Method Widget -->
                                <div class="single-widget payement">
                                    <div class="content">
                                        <img src="images/payment-method.png" alt="#">
                                    </div>
                                </div>
                                <!--/ End Payment Method Widget -->
                                <!-- Button Widget -->
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <button type="submit"  class="btn">proceed to checkout</button>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Button Widget -->
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->

		<!-- Start Shop Services Area  -->
		<section class="shop-services section home">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-rocket"></i>
							<h4>Free shiping</h4>
							<p>Orders over Ugs50000</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-reload"></i>
							<h4>Free Return</h4>
							<p>Within 30 days returns</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-lock"></i>
							<h4>Sucure Payment</h4>
							<p>100% secure payment</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-tag"></i>
							<h4>Best Peice</h4>
							<p>Guaranteed price</p>
						</div>
						<!-- End Single Service -->
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Services -->
</div>
@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AeD-Pp_nSSedlTbdGJk4tCWGvnGJImvuyVm6R7Ty_ZhdlmXRcyfkoZoNBryXLXfVIglmGLn1sptbyLtk"></script>
<script>
  $(document).ready(function(){
      $('input[type="radio"]').click(function(){
          var inputValue = $(this).attr("value");
          var targetBox = $("." + inputValue);
          $(".box").not(targetBox).hide();
          $(targetBox).show();
      });
  });
  </script>
<script>
  paypal.Buttons({
    // Sets up the transaction when a payment button is clicked
    createOrder: (data, actions) => {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '{{ Session::get('checkout')['total'] }}' // Can also reference a variable or function
          }
        }]
      });
    },
    // Finalize the transaction after payer approval
    onApprove: (data, actions) => {
      return actions.order.capture().then(function(orderData) {
        // Successful capture! For dev/demo purposes:
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        const transaction = orderData.purchase_units[0].payments.captures[0];
        alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        // When ready to go live, remove the alert and show a success message within this page. For example:
        // const element = document.getElementById('paypal-button-container');
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL:  actions.redirect('thank_you.html');
      });
    }
  }).render('#paypal-button-container');
</script>
<script>
    // the selector will match all input controls of type :checkbox
// and attach a click event handler
$("input:radio").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:radio[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>

@endpush
