@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Riwayat Transaksi Nasabah</h1>
  <a href="/" class="btn btn-primary">Data Harga Sampah</a>
  <table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">Tanggal Transaksi</th>
        <th scope="col">Nama Nasabah</th>
        <th scope="col">Jenis Sampah</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($results as $result)
        <tr>
          <th scope="row">{{date('d M Y', strtotime($result->created_at))}}</th>
          <td>{{$result->nama_nasabah}}</td>
          <td>{{$result->jenis_sampah}}</td>
          <td>{{$result->status}}/KG</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
