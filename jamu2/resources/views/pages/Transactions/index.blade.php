@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi Masuk</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Total Transaksi</th>
                                        <th>Status</th>  
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            <tbody>
                              @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->telepon }}</td>
                                    <td>{{ $user->transaction_total }}
                                    </td>
                                   
                                      @if ($user->transaction_status == 'PENDING')
                                        <span class="badge badge-warning">
                                        @elseif ($user->transaction_status == 'SUCCESS')
                                        <span class="badge badge-success">
                                        @elseif ($user->transaction_status == 'FAILED')
                                        <span class="badge badge-danger">
                                        @else
                                        <span>
                                        @endif
                                            {{ $user->transaction_status }}
                                        </span>
                                    </td>
                                    <td>
                                @if($user->transaction_status == 'PENDING')
                                <a href="{{ route('transactions.status', $user->id) }}?status=SUCCESS" class="btn btn-success btn-sm">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    <a href="{{ route('transactions.status', $user->id) }}?status=FAILED" class="btn btn-danger btn-sm">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        @endif
                                        <a href="#mymodal"
                                        data-remote="{{ route('transactions.show', $user->id) }}"
                                        data-toggle="modal"
                                        data-target="#mymodal"
                                        data-title="Detail Transaksi {{ $user->uuid  }}"
                                        class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('transactions.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('transactions.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection