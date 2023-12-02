@extends('Dashboard.layoute.masterLayoute')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Orders</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
               <p>Data Orders</p>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    @php
                        $no = 1;
                    @endphp
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Order</th>
                            <th>Custemer Name</th>
                            <th>Total Order</th>
                            <th>Status Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $order)
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>{{ $order->kode_order }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="" class="btn btn-success">Detail</a>
                                    <a href="" class="btn btn-success">Invoice</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
