<?php

namespace App\Http\Controllers;

use Session;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Imagetable;
use App\Models\News;
use App\Models\Content;
use App\Models\Variation;
use App\Models\Keywords;
use App\Models\Testimonial;
use App\Models\Coupon;
use App\Models\Partner;
use App\Models\Album;
use App\Models\User;
use App\Models\Photos;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Matches;
use App\Models\Team;
use App\Models\ShopImage;
use App\Models\Products;
use App\Models\Orders;
use App\Models\Country;
use App\Models\OrderDetail;
use App\Models\Merchandise;
use App\Models\Meta;
use App\Models\Product_categories;
use App\Models\Referral;
use App\Models\Volet;
use App\Models\Package;
use App\Models\Plane;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Stripe;
use App\Helpers\PushNotification;
use App\Models\Admin;

use Auth;

use App\Models\Vendor;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\Plan;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Validator;
use Mail;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __construct()
    {
        $categories = Product_categories::where("is_active", 1)->get();
        $logo = imagetable::where('table_name', 'logo')->latest()->first();
        View()->share('logo', $logo);
        $vendor = Vendor::where('is_active', 1)->get();
        View()->share('vendor', $vendor);
        View()->share('config', $this->getConfig());
        View()->share('categories', $categories);
    }

    public function order_submit()
    {
        $order_upd = Orders::where('id', $_GET['order_id'])->update([
            'is_active' => 0,
            'pay_status' => $_GET['redirect_status'] == 'succeeded' ? 1 : 0,
            'order_response' => $_GET['payment_intent'],
        ]);
        $cart_data = Session::get('cart');
        $order = Orders::where('id', $_GET['order_id'])->first();
        $amount = $order->total_amount;


        $data = [
            'order' => $order,
        ];
        $invoiceData = $order;
        // dd($invoiceData);
        Mail::send('email/custom-order-invoice', ['invoiceData' => $invoiceData], function ($message) use ($order) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($order->email);
            $message->subject('Order Invoice');
        });

        $order_id = $cart_data['order_id'];
        unset($cart_data['order_id']);
        $detail = OrderDetail::create([
            'order_id' => $order_id,
            'details' => serialize($cart_data),
        ]);
        Session::forget('cart');
        // return response()->json(['status' => 1]);
        return redirect()->route('welcome')->with('notify_success', 'Payment Charged Successfully!');
    }


    public function paystatus(Request $request)
    {
        $status_codes = array("Default" => 0, "Completed" => 1, "Pending" => 2, "Denied" => 3, "Failed" => 4, "Reversed" => 5);
        $payment_status = $request['payment_status'];

        $updateParam = $status_codes[$payment_status];

        $order_upd = Orders::where('id', $request['custom'])->update([
            'pay_status' => $updateParam,
            'order_response' => serialize($request->all()),
            'card_payment' => 'PAYPAL'
        ]);
    }

    public function placeorder(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            // 'note' => 'required|string',
            'town' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
            // 'company' => 'required|string',
            // 'zip' => 'required|string',

        ]);


        $order = Orders::create([
            "user_id" => Auth::id(),
            "fname" => $request->fname,
            "product_id" => $request->product_id,
            "variation_id" => $request->variation_id,
            "lname" => $request->lname,
            "email" => $request->email,
            "phone" => $request->phone,
            "note" => $request->note,
            "town" => $request->town,
            "address" => $request->address,
            "country" => $request->country,
            "company" => $request->company,
            "zip" => $request->zip,
            "total_amount" => $request->total_amount,
            "sub_amount" => $request->total_amount,
        ]);
        $cart_data = Session::get('cart');
        $cart_data['order_id'] = $order->id;
        Session::put('cart', $cart_data);
        $data = compact('cart_data');
        return redirect()->route('stripe.post')->with("notify_success", "Success!")->with($data);
    }

    public function thankyou(Request $request)
    {
        $order = Orders::findOrFail($request->order_id);
        return view('thankyou', compact('order'))->with('title', 'Order Confirmation');
    }





    public function submitOrder(Request $request)
    {
        // Validate the request
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'town' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
        ]);

        // Create the order
        $order = Orders::create([
            "user_id" => Auth::id(),
            "fname" => $request->fname,
            "product_id" => $request->product_id ?? null,
            "variation_id" => $request->variation_id ?? null,
            "lname" => $request->lname,
            "email" => $request->email,
            "phone" => $request->phone,
            "note" => $request->note ?? null,
            "town" => $request->town,
            "address" => $request->address,
            "country" => $request->country,
            "company" => $request->company ?? null,
            "zip" => $request->zip ?? null,
            "total_amount" => $request->total_amount,
            "sub_amount" => $request->total_amount,
            "pay_status" => 0,
            "is_active" => 0,
        ]);

        // Save cart details
        $cart_data = Session::get('cart');
        unset($cart_data['order_id']);
        OrderDetail::create([
            'order_id' => $order->id,
            'details' => serialize($cart_data),
        ]);

        // Clear cart
        Session::forget('cart');

        // ================================
        // 🔔 SEND PUSH NOTIFICATION TO ADMINS
        // ================================
        $admins = Admin::whereNotNull('fcm_token')->get();

        foreach ($admins as $admin) {
            PushNotification::send(
                $admin->fcm_token,
                "New Order Received!",
                "Order #{$order->id} from {$order->fname} {$order->lname} - Total: {$order->total_amount}"
            );
        }

        // Redirect to thank you page
        return redirect()->route('thankyou', ['order_id' => $order->id])
            ->with('notify_success', 'Order submitted successfully! Thank you for choosing Cash on Delivery.');
    }




    public function stripePost()
    {
        $cart_data = Session::get('cart');

        $tot = 0;
        foreach ($cart_data as $key => $value) {
            if ($key != 'order_id') {
                $rowid = $value['cart_id'];
                $tot += $cart_data[$rowid]['sub_total'];
            }
        }
        // dd($tot);
        // if($tot < 200){
        $tot += $this->getConfig()['SHIPPINGPRICE'];
        // }

        $order = $cart_data['order_id'];
        $amount = $tot;

        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $stripe = \Stripe\PaymentIntent::create([
                'amount' => $amount * 100,
                'currency' => 'usd',
                'transfer_group' => "ORDER_95",
            ]);
            $secret = $stripe->client_secret;
            return view('paysecure')->with('notify_success', 'Payment Charged!')->with(compact('secret', 'amount', 'order'));
        } catch (\Stripe\Exception\CardException $e) {
            return back()->with('notify_error', "a " . $e->getError()->message);
        } catch (\Stripe\Exception\RateLimitException $e) {
            return back()->with('notify_error', "b " . $e->getError()->message);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return back()->with('notify_error', "c " . $e->getError()->message);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return back()->with('notify_error', "d " . $e->getError()->message);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return back()->with('notify_error', "e " . $e->getError()->message);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return back()->with('notify_error', "f " . $e->getError()->message);
        } catch (Exception $e) {
            return back()->with('notify_error', "g " . $e->getError()->message);
        }
    }

    public function checkout_landing()
    {
        return redirect()->route('home')->with('notify_success', 'Payment success!');
    }



    public function subscription_create(Request $request)
    {
        $order_upd = Orders::where('id', $request['order'])->update([
            'is_active' => 1,
            'pay_status' => 1,
        ]);

        $order_data = Orders::where('id', $request['order'])->first();
        $package = Package::where('id', $order_data->pkg_id)->first();

        Mail::send('email/subscription', ['order_data' => $order_data, 'package' => $package], function ($message) use ($order_data) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($order_data->email);
            $message->subject('Thank You!');
        });

        return redirect()->route('home')->with('notify_success', 'Payment Charged Successfully!');
    }


    public function save_cart(Request $request)
    {
        if (Session::has('cart') && !empty(Session::get('cart'))) {
            $rowid = null;
            $flag = 0;
            $cart_data = Session::get('cart');
            foreach ($cart_data as $key => $value) {
                if ($key == 'order_id') {
                    continue;
                }
                $product_id = $request->product_id;
                $cartId = $product_id;
                if ((intval($value['product_id']) == intval($request['product_id'])) && $value['cart_id'] == $cartId) {
                    $flag = 1;
                    $rowid = $value['cart_id'];
                    $cart_data[$rowid]['quantity'] += $request['qty'];
                    $cart_data[$rowid]['sub_total'] = $cart_data[$rowid]['price'] * $cart_data[$rowid]['quantity'];

                    Session::forget($rowid);
                    Session::put('cart', $cart_data);

                    return redirect()->route('cart')->with('notify_success', 'Product Added To Cart Successfully!');
                }
            }
        }

        $product_id = $request->product_id;
        $variaion_id = $request->variation_id;
        $qty = $request->qty;

        $cart = array();
        $cartId = $product_id;
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        }

        if ($qty == 0) {
            $qty = 1;
        }

        if (intval($qty) > 0) {
            if (!empty($cartId) && !empty($cart)) {
                unset($cart[$cartId]);
            }
            $product = Products::where('id', $product_id)->first();
            $cart[$cartId]['price'] = $request->price;
            $cart[$cartId]['cart_id'] = $cartId;
            $cart[$cartId]['quantity'] = $qty;
            $cart[$cartId]['sub_total'] = floatval($request->price * $qty);
            $cart[$cartId]['product_id'] = $product_id;
            $cart[$cartId]['variaion_id'] = $variaion_id;
            $cart[$cartId]['custom'] = 0;

            Session::put('cart', $cart);
            return redirect()->route('cart')->with('notify_success', 'Item Added to cart Successfully');
        } else {
            return back()->with('notify_error', 'Something Went Wrong, Please Try Again!');
        }
    }


    public function save_customize_design(Request $request)
    {
        $variationId = $request->input('variation_id');
        $variation = Variation::where('id', $variationId)->first();
        if ($variation == null) {
            return response()->json(['success' => false]);
        }
        $product_id = $variation->product_id;
        $imageData = $request->input('image');
        $qty = $request->input('quantity_selected');
        $config = $this->getConfig();
        $price = $config['CUSTOMPRODUCTPRICE'];

        $cart = array();
        $cartId = $product_id;
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        }

        if ($qty == 0) {
            $qty = 1;
        }

        if (intval($qty) > 0) {


            // Decode the image data
            $image = $imageData;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . 'png';
            // dd(asset('Uploads/custom_design/'.$imageName, base64_decode($image)));
            $path = asset('Uploads/custom_design/' . $imageName);

            Storage::disk('custom')->put($imageName, base64_decode($image));

            // $image = str_replace('data:image/png;base64,', '', $imageData);
            // $image = str_replace(' ', '+', $image);
            // $imageName = 'design_' . $variationId .time(). '.png';
            // $imagePath = 'images/' . $imageName;
            // \File::put(public_path($imagePath), base64_decode($image));
            // \File::put(public_path('images') . '/' . $imageName, base64_decode($image));

            if (!empty($cartId) && !empty($cart)) {
                unset($cart[$cartId]);
            }

            $cart[$cartId]['price'] = $price;
            $cart[$cartId]['cart_id'] = $cartId;
            $cart[$cartId]['custom'] = 1;
            $cart[$cartId]['quantity'] = $qty;
            $cart[$cartId]['sub_total'] = floatval($price * $qty);
            $cart[$cartId]['product_id'] = $product_id;
            $cart[$cartId]['variaion_id'] = $variationId;
            $cart[$cartId]['image'] = !empty($request->input('image')) ? $path : asset('images/noimg.png');

            Session::put('cart', $cart);

            return response()->json(['success' => true, 'image' => $imageName]);
        }
    }
    public function save_cart_ajax(Request $request)
    {

        $product_id = $request->product_id;
        // $variaion_id = $request->variation_id;02+2562
        $qty = $request->quantity_selected;

        $cart = array();
        $cartId = $product_id;
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        }

        if ($qty == 0) {
            $qty = 1;
        }

        if (intval($qty) > 0) {
            $config = $this->getConfig();
            $image = $request->img_path;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(10) . '.' . 'png';
            // dd(asset('Uploads/custom_design/'.$imageName, base64_decode($image)));
            $path = asset('Uploads/custom_design/' . $imageName);

            Storage::disk('custom')->put($imageName, base64_decode($image));
            $request->img_path = $path;
            // dd($request->img_path);
            //    \File::put($path.'/'.$imageName, base64_decode($image));
            //  = 
            if (!empty($cartId) && !empty($cart)) {
                unset($cart[$cartId]);
            }

            // dd($qty);
            $product = Products::where('id', $product_id)->first();
            //dd($product);
            // $cart[$cartId]['cart_id'] = $cartId;
            // $cart[$cartId]['stock_qty'] = $product->qty;
            // $cart[$cartId]['product_id'] = $product_id;
            // $cart[$cartId]['name'] = $product->name;
            // $cart[$cartId]['custom'] = 1;
            // $cart[$cartId]['slug'] = $product->slug;
            // $cart[$cartId]['quantity_selected'] = $qty;
            // $cart[$cartId]['category_id'] = $request->category_id;
            // $cart[$cartId]['sub_category_id'] = $request->sub_category_id;

            $cart[$cartId]['price'] = $request->price;
            $cart[$cartId]['cart_id'] = $cartId;
            $cart[$cartId]['custom'] = 1;
            $cart[$cartId]['quantity'] = $qty;
            $cart[$cartId]['sub_total'] = floatval($request->price * $qty);
            $cart[$cartId]['product_id'] = $product_id;
            // $cart[$cartId]['variaion_id'] = $variaion_id;
            $cart[$cartId]['image'] = !empty($request->img_path) ? $request->img_path : asset('images/noimg.png');

            Session::put('cart', $cart);
            return response()->json(['msg' => 'Customized Product Added To Cart!', 'status' => 1]);
            // return redirect()->route('cart')->with('notify_success', 'Customized Product Added To Cart!');
        }
    }
    public function updateCart(Request $request)
{
    $rowid = $request->rowid;
    $qty   = (int) $request->qty;

    $cart = session()->get('cart', []);

    if (!isset($cart[$rowid])) {
        return response()->json(['status' => 0]);
    }

    // Update quantity
    $cart[$rowid]['qty'] = $qty;
    $cart[$rowid]['sub_total'] = $cart[$rowid]['price'] * $qty;

    // Calculate subtotal
    $subtotal = collect($cart)->sum('sub_total');

    // Shipping rules
    $freeShippingLimit = 5000;
    $shippingPrice    = 250;

    $isFreeShipping = $subtotal >= $freeShippingLimit;
    $shipping       = $isFreeShipping ? 0 : $shippingPrice;

    $grandTotal = $subtotal + $shipping;

    // Save cart
    session()->put('cart', $cart);

    return response()->json([
        'status'           => 1,
        'rowid'            => $rowid,
        'item_sub_total'   => $cart[$rowid]['sub_total'],
        'subtotal'         => $subtotal,
        'shipping'         => $shipping,
        'grand_total'      => $grandTotal,
        'is_free_shipping' => $isFreeShipping,
        'remaining'        => max(0, $freeShippingLimit - $subtotal),
    ]);
}





    public function removecart($cart_id, Request $request)
    {
        $rowid = $cart_id;
        $cart_data = Session::get('cart');
        unset($cart_data[$rowid]);
        Session::forget('cart');
        Session::put('cart', $cart_data);
        return redirect()->back()->with('notify_success', 'Item removed!');
    }
}
