@extends('layouts.mentor_layouts.mentor_layout')
@section('Content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Appointments</h1>
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
                  <h3 class="card-title">Appointment Lists</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                      <th class="text-center">SL</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Startup Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Is Paid</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($appoints as $row)
                       <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-center">{{ $row['user']['name'] ?? ""}}</td>
                        <td class="text-center">{{ $row['user']['startup_name'] ?? ""}}</td>
                        <td class="text-center">{{ $row['user']['email'] ?? ""}}</td>
                        <td class="text-center">{{ $row['user']['phone'] ?? ""}}</td>
                        <td class="text-center">{{ $row['user']['address'] ?? ""}}</td>
                        @if($row['is_paid'] == 1)
                        <td class="text-center">Paid</td>
                        @else
                        <td class="text-center">Non Paid</td>
                        @endif

                        <td class="text-center">

                            @if($row['is_approved'] == 0)
                                <a href="javascript:;" class="btn btn-sm btn-info Appointment" recordid="{{ $row['id'] }}" data-toggle="modal" data-target="#modal-lg">More Info</a>&nbsp;&nbsp;
                                <a href="{{ url('/mentor/appointment-pending/'.$row['id']) }}" class="btn btn-sm btn-primary" title="Appointment is pending">Accept</a>&nbsp;&nbsp;
                                <a href="{{ url('/mentor/appointment-reject/'.$row['id']) }}" class="btn btn-sm btn-danger">Reject</a>&nbsp;&nbsp;
                            @elseif($row['is_approved'] == 1)
                                <a href="javascript:;" class="btn btn-sm btn-info Appointment" recordid="{{ $row['id'] }}" data-toggle="modal" data-target="#modal-lg">More Info</a>&nbsp;&nbsp;

                                <a href="javascript:;" class="btn btn-sm btn-warning text-white communication" recordid="{{ $row['id'] }}" data-toggle="modal" data-target="#modal-lg1" title="Communication Information Send">Send</a>&nbsp;&nbsp;


                                <a href="{{ url('/mentor/appointment-accept/'.$row['id']) }}" class="btn btn-sm btn-success" title="Appointment was accepted">Complete</a>&nbsp;&nbsp;

                                <a href="{{ url('/mentor/appointment-reject/'.$row['id']) }}" class="btn btn-sm btn-danger" title='Appointment was rejected'>Reject</a>&nbsp;&nbsp;
                            @elseif($row['is_approved'] == 2)

                                <a href="{{ url('/mentor/appointment-reject/'.$row['id']) }}" class="btn btn-sm btn-danger disabled" title='Appointment was rejected'>Reject</a>&nbsp;&nbsp;
                            @else
                                <a href="javascript:;" class="btn btn-sm btn-info Appointment" recordid="{{ $row['id'] }}" data-toggle="modal" data-target="#modal-lg">More Info</a>&nbsp;&nbsp;
                                <a href="javascript:;" class="btn btn-sm btn-secondary disabled">Completed</a>&nbsp;&nbsp;
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


<!-- /.modal -->

    <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Informations</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Reson</td>
                    <td id="reson"></td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Method</td>
                    <td id="method">John Doe</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Medium</td>
                    <td id="medium">John Doe</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Details</td>
                    <td id="details">John Doe</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Date</td>
                    <td id="date">John Doe</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Is Paid</td>
                    <td id="is_paid">John Doe</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Is Approved</td>
                    <td id="is_approved">-</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Document</td>
                    <td><div id="document"></div></td>
                    </tr>
                </tbody>
                </table>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{--  <button type="button" class="btn btn-primary">Ok</button>  --}}
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="modal-lg1">
        <div class="modal-dialog modal-lg1">
         <form action="{{ url('/mentor/communication-store') }}" method="post">
             @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Communication Details Send</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                      <tr data-widget="expandable-table" aria-expanded="false">
                        <input type="hidden" name="hiddenid" id="HiddenId">
                        <textarea name="details" id="" class="form-control" placeholder="Enter Details Informations"></textarea>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Save</button>
            </div>
          </div>
        </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

@endsection
