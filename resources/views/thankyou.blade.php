@extends('layouts.main')
@section('content')
<div class="tf-page-title style-2">
    <div class="container-full">
        <div class="heading text-center">Order Confirmed</div>
    </div>
</div>

<section class="thankyou">
    <div class="container">
        <div class="it-banner text-center">
            <h2>Thank You for Your Order!</h2>
            <p>We appreciate your purchase. Your order details are below:</p>
            
            <div class="order-details">
                <h4>Order Confirmation</h4>
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Name:</strong> {{ $order->fname }} {{ $order->lname }}</p>
                <p><strong>Total Price:</strong> RS {{ number_format((float)str_replace(',', '', $order->total_amount), 2) }}</p>
                <!-- Corrected field -->
                <p><strong>Address:</strong> {{ $order->address }}</p>
            </div>
            
            <p>If you have any questions, please contact us. Have a great day!</p>
        </div>
    </div>
</section>
            
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        .thankyou {
    padding: 50px 0;
}

.it-banner {
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.order-details {
    margin-top: 20px;
    font-size: 16px;
    line-height: 1.6;
}
    </style>
@endsection