@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Data Harga Sampah</h1>
  <a href="/riwayat" class="btn btn-primary">Riwayat Transaksi</a>
  <table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Jenis Sampah</th>
        <th scope="col">Harga/KG</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($results as $result)
        <tr>
          <th scope="row">{{$result->id}}</th>
          <td>{{$result->jenis_sampah}}</td>
          <td>{{$result->harga}}/KG</td>
          <td>
            <a href="/" class="btn btn-primary">
              Ubah
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
