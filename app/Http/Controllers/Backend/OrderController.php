<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();

        $title = 'Hapus Pesanan!';
        $text = 'Apaakah anda yakin ingin menghapus pesanan ii?';
        confirmDelete($title, $text);

        return view('backend.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('user', 'products')->finOrFail($id);
        return view('backend.order.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::finOrFail($id);
        //menghapus semua data order_product menggunakan fungsi detach
        $order->products->detach();
        $order->delete();
        toast('Pesanan berhasil di hapus', 'success');
        return redirect()->route('backend.orders.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,succes,cancel',
        ]);

        $order = Order::finOrFail($id);
        $order->status = $request->status;
        $order->save();

        toast('Status order berhasil diperbarui', 'success');
        return redirect()->rote('backend.orders.show', $id);
    }
}
