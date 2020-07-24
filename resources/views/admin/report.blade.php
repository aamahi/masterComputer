@extends('index')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="card">
                <header class="card-header bg-secondary text-center text-light">
                   Report
                </header>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Customar Name</th>
                                <th>Due</th>
                                <th>Joma</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                            <tr>
                                <td>{{($report->created_at)->format('d-m-Y')}}</td>
                                <td>{{($report->customar)->customar_name}}</td>
                                <td>@if($report->due){{$report->due}}@else{{'0'}} @endif</td>
                                <td>@if($report->joma){{$report->joma}}@else{{'0'}} @endif</td>
                                <td>{{($report->user)->name}}</td>
                                <td>
                                    <a href="{{route('deleteReport',$report->id)}}" class="btn btn-md btn-danger deete"> <i class="fa fa-trash-o"> </i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>

        </section>
    </section>

@endsection
