<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Hudders Market</title>

    <style>
        @import url(https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap);

        #main {}

        #main div {
            width: 50px;
            height: 50px;
        }

        .invoice-box {
            margin: auto;
            border: 1px solid #eee;
            font-size: 16px;
            line-height: 24px;
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            padding: 0 10px;
        }

        .invoice-box table td {
            padding: 20px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.heading td {
            border-bottom: 1px solid #aaa;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <div id="main">
                        <div style="display:flex">
                            <img style=" height: 60px;padding-top: 50px;"
                                src="https://cdn.discordapp.com/attachments/840031169319665727/845595910779174922/logo2.0.png"
                                alt="Hudders Market Logo">
                            <h1 style="padding-left: 170px; padding-top: 25px; color: black;">INVOICE</h1>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <p style="font-weight: bold; color: black;">
                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                    </p>
                    Date Isued: {{ $order->payment->paid_date->format('Y/m/d') }} <br />
                    Invoice No: #{{ $order->id }}
                </td>
                <td>
                    <p style="font-weight: bold; color: black;">Hudders Market</p>
                    Cleckhuddersfax <br />
                    West Yorkshire, UK
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" style="margin-top: 10px">
            <tr class="heading">
                <td>Product Name</td>
                <td style="text-align: left;">Rate</td>
                <td style="text-align: center;">QTY</td>
                <td style="text-align: right;">SUBTOTAL</td>
            </tr>

            @foreach ($order->product as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td style="text-align: left;">£{{ $product->getPrice() }}</td>
                <td style="text-align: center;">{{ $product->pivot->quantity }}</td>
                <td style="text-align: right;">£{{ $product->getPrice() * $product->pivot->quantity }}</td>
            </tr>
            @endforeach

        </table>
        <div style="background: #ececec;">
            <table cellpadding="0" cellspacing="0" style="margin-top:50px;">
                <tr class="heading">
                    <td>Payment Gateway</td>
                    <td style="text-align: left;">Paid Date</td>
                    <td style="text-align: right;">Total</td>
                </tr>
                <tr class="heading">
                    <td>{{ $order->payment->gateway == 0 ? 'PayPal' : 'Stripe' }}</td>
                    <td style="text-align: left;">{{ $order->payment->paid_date->format('F j, Y') }}</td>
                    <td style="text-align: right;">£{{ $order->payment->amount }}</td>
                </tr>
            </table>
            <footer>
                <p
                    style="text-align: right; padding-top: 10px; padding-bottom: 10px; padding-right: 15px; font-size: 12px;">
                    huddersmarket@gmail.com | 1522615636 | {{ str_replace('http://', '', no_url('/')) }}
                </p>
            </footer>
        </div>
</body>

</html>
