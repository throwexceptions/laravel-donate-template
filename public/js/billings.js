(function(){
	
	var StripeBilling = {
		init: function() {
			this.form = $('#billing-form');
			// Create a Stripe client
			var stripe = Stripe($('meta[name="publishable-key"]').attr('content'));

			// Create an instance of Elements
			var elements = stripe.elements();

			// Custom styling can be passed to options when creating an Element.
			// (Note that this demo uses a wider set of styles than the guide below.)
			var style = {
			  base: {
			    color: '#32325d',
			    lineHeight: '24px',
			    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
			    fontSmoothing: 'antialiased',
			    fontSize: '16px',
			    '::placeholder': {
			      color: '#aab7c4'
			    }
			  },
			  invalid: {
			    color: '#fa755a',
			    iconColor: '#fa755a'
			  }
			};

			// Create an instance of the card Element
			var card = elements.create('card', {style: style});

			// Add an instance of the card Element into the `card-element` <div>
			card.mount('#card-element');

			$('#btnSubmit').click(function(event) {
			  	stripe.createToken(card).then(function(result) {
				    if (result.error) {
				    	$('.payment-errors').show().html(result.error.message);
				    } else {
				    	$('.payment-errors').hide()
				    	console.log(result.token.id);
				      	StripeBilling.stripeTokenHandler(result.token.id);
				    }
			 	});
			});
		},
		stripeTokenHandler: function(token) {
			// Insert the token ID into the form so it gets submitted to the server
			var form = $('#billing-form');
			var hiddenInput = document.createElement('input');
			hiddenInput.setAttribute('type', 'hidden');
			hiddenInput.setAttribute('name', 'stripeToken');
			hiddenInput.setAttribute('value', token);
			form.append(hiddenInput);

			// Submit the form
			form.submit();
		}
	}

	StripeBilling.init();
})();