@extends('layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Role List')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('role.create') }}" class="btn btn-success float-right"><i class="fas fa-plus"></i>&nbsp;
                            {{__('Add')}}</a>
                    </div>
                </div>
                <form id="search_box" style="width:100%" action="{{ route('role.index') }}" method="GET">


                    {{--                    @csrf--}}
                    <div class="row">
                        <div class="col-8 col-sm-9 col-md-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                                <label for="search"></label><input type="search" id="search" name="search"
                                                                   value="{{ old('search', request()->get('search') != null ? request()->get('search') : '' ) }}"
                                                                   class="form-control form-control"
                                                                   placeholder="{{__('Type Your Keywords Here')}}">

                            </div>
                        </div>
                        <div class="col-4 col-sm-3 col-md-2">
                            <a href="{{ route('role.index') }}" type="button" class="btn btn-danger"
                               style="width: 100%">
                                <i class="fas fa-sync-alt"></i>
                                {{__('Reset')}}
                            </a>
                        </div>
                    </div>
                </form>

                </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="indexTable" class="table table-bordered table-striped">

                                    <thead>

                                    <tr class="text-center">
                                        <th>{{__('SL')}}</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $roles->firstItem() + $loop->index}}</td>
                                            <td>{{ ucwords($role->name) }}</td>
                                            <td class="text-center">
                                                <a href="{{route('role.show', $role->slug)}}"
                                                   class="btn btn-info mb-2"><i
                                                        class="fas fa-info"></i>&nbsp; {{__('Info')}}</a>

                                                <a href="{{ route('role.edit', $role->slug) }}"
                                                   class="btn btn-primary mb-2"><i class="fas fa-edit"></i>&nbsp;
                                                    {{__('Edit')}}</a>

                                                <a href="{{ route('role.delete', $role->slug) }}"
                                                   class="btn btn-danger mb-2"><i class="fas fa-trash"></i>&nbsp;
                                                    {{__('Delete')}}</a>

{{--                                                <a href="{{ route('employee.downloadPDF', $item->slug) }}"--}}
{{--                                                   class="btn btn-primary mb-2"><i class="fas fa-print"></i>&nbsp;--}}
{{--                                                    {{__('Download & Print')}}</a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <div class="mt-1 pagination">
                                    {{ $roles->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@push('customScripts')
    <script>

    </script>
@endpush

