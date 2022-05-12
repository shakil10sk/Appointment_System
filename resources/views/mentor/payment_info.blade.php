@extends('layouts.mentor_layouts.mentor_layout')

@section('Content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Payments</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/mentor/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">lists</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Payment Info</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                      <th class="text-center">SL</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone</th>
                      <th class="text-center">Type</th>
                      <th class="text-center">Account No</th>
                      <th class="text-center">Transection</th>
                      <th class="text-center">Date</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                            use Carbon\Carbon;
                        @endphp
                    @foreach ($payments as $row)
                       <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-center">{{ $row['user']['name'] }}</td>
                        <td class="text-center">{{ $row['user']['email'] }}</td>
                        <td class="text-center">{{ $row['user']['phone'] }}</td>

                        @if($row['type'] == 0)
                            <td class="text-center">Bkash</td>
                        @elseif($row['type'] == 1)
                            <td class="text-center">Rocket</td>
                        @else
                            <td class="text-center">Nogod</td>
                        @endif

                        <td class="text-center">{{ $row['account_no']}}</td>
                        <td class="text-center">{{ $row['detals'] }}</td>
                        <td class="text-center">{{ Carbon::parse($row['created_at'])->format('Y-m-d') }}</td>
                        <td class="text-center">
                            @if($row['status'] == 0)
                                <a href="{{ url('/mentor/payment-accept/'.$row['id']) }}" class="btn btn-info btn-sm">Accept</a>&nbsp;&nbsp;
                                <a href="{{ url('/mentor/payment-reject/'.$row['id']) }}" class="btn btn-danger btn-sm">Reject</a>
                            @elseif ($row['status'] == 2)
                                <a href="" class="btn btn-danger btn-sm disabled">Rejected</a>
                            @elseif ($row['status'] == 1)
                                <a href="" class="btn btn-info btn-sm disabled">Accepted</a>
                            @endif

                        </td>
                      </tr>
                    @endforeach


                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>

    </div>
</div>




@endsection
