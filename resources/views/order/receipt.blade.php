<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
</head>
<body onload="window.print()">
<table>
    <tr>
        <td colspan="3" align="center">GF</td>
    </tr>
    <tr>
        <td colspan="3" align="center">Farm</td>
    </tr>

    <tr>
        <td colspan="3" align="center">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="2">{{ $order->created_at->format('d F Y H:i') }}</td>
        <td align="right">{{ $order->user->name }}</td>
    </tr>
    <tr>
        <td colspan="2">{{ $order->invoice_no }}</td>
        <td align="right">{{ $order->customer->name }}</td>
    </tr>

    <tr>
        <td colspan="3" align="center">&nbsp;</td>
    </tr>

    @foreach($order->items as $item)
        <tr>
            <td colspan="3">{{ $item->item->name }}</td>
        </tr>
        <tr>
            <td colspan="2">{{ $item->quantity }} x {{ $item->price }}</td>
            <td align="right">{{ $item->quantity * $item->price }}</td>
        </tr>
    @endforeach

    <tr>
        <td colspan="3" align="center">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="2" align="left">Subtotal</td>
        <td align="right">{{ $order->subtotal }}</td>
    </tr>

    <tr>
        <td colspan="2" align="left">Tax ({{ $order->tax_percentage }} %)</td>
        <td align="right">{{ $order->tax }}</td>
    </tr>

    <tr>
        <td colspan="2" align="left">Total</td>
        <td align="right">{{ ($order->subtotal + $order->tax) }}</td>
    </tr>

    <tr>
        <td colspan="3" align="center">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="3" align="center">Thanks for the purchase</td>
    </tr>
</table>
</body>
</html>