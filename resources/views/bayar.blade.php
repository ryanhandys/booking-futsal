@extends('layouts.app')

@section('css')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endsection

@section('content')
<form action="" method="POST" id="submit_form">
  @csrf
  <input type="hidden" name="json" id="json_callback">
</form>

 
<script>
   window.snap.pay('{{ $token }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          // alert("payment success!"); console.log(result);
          send_response_to_form(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          // alert("wating your payment!"); console.log(result);
          send_response_to_form(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          // alert("payment failed!"); console.log(result);
          send_response_to_form(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          // alert('you closed the popup without finishing the payment');
          alert('you closed the popup without finishing the payment');
        }
      })
      function send_response_to_form(result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
      }

      
</script>
@endsection