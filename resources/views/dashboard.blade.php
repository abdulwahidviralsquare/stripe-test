<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <form action="{{route('add-card')}}" method="POST" id="payment-form" style="margin-top: 50px;border:1px solid red;padding:20px">
            @csrf
            <div id="card-element">
                <!-- Stripe.js will render the card inputs here -->
            </div>
            <br>
            <button class="btn btn-danger" style="color:#FFF;background-color: red" type="submit">Add Card</button>
        </form>
        
        
        <script>
            var stripe = Stripe('pk_test_51IIYfPJdut7eHw2Mhsy6bgCiMJhk52KrZ02wXljQBJl3Shd19dZOWg2J6LPmUdgbYnVJRNqsYmYWsQBxFnGjNbei00Gbc992eQ');
            var elements = stripe.elements();
            
            var cardElement = elements.create('card');
            cardElement.mount('#card-element');
            
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                
                stripe.createToken(cardElement).then(function(result) {
                    if (result.error) {
                        // Handle error
                    } else {
                        // Token created, submit form with token ID
                        var tokenInput = document.createElement('input');
                        tokenInput.setAttribute('type', 'hidden');
                        tokenInput.setAttribute('name', 'stripeToken');
                        tokenInput.setAttribute('value', result.token.id);
                        form.appendChild(tokenInput);
                        
                        // Submit the form
                        form.submit();
                    }
                });
            });
        </script>
        
    </x-slot>
</x-app-layout>
