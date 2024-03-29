@extends('layouts.admin.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Attribute</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Edit Attribute</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if ($success = Session::get('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $success }}</strong>
                </div>
            @endif
            @if ($error = Session::get('flash_message_error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $error }}</strong>
                </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Attribute</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row user">
                <div class="col-md-3">
                    <div class="tile p-0">
                        <ul class="nav flex-column nav-tabs user-tabs">
                            <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                            <li class="nav-item"><a class="nav-link" href="#values" data-toggle="tab">Attribute Values</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="general">
                            <div class="tile">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Attribute Information</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/admin/edit_attributes/'.$id) }}" method="POST" role="form">
                                        @csrf
                                            <div class="form-group">
                                                <label class="control-label" for="code">Code</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="Enter attribute code"
                                                    id="code"
                                                    name="code"
                                                    value="{{ old('code', $attribute->code) }}"
                                                />
                                            </div>
                                            <input type="hidden" name="id" value="{{ $attribute->id }}">
                                            <div class="form-group">
                                                <label class="control-label" for="name">Name</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="Enter attribute name"
                                                    id="name"
                                                    name="name"
                                                    value="{{ old('name', $attribute->name) }}"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="frontend_type">Frontend Type</label>
                                                @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                                                <select name="frontend_type" id="frontend_type" class="form-control">
                                                    @foreach($types as $key => $label)
                                                        @if ($attribute->frontend_type == $key)
                                                            <option value="{{ $key }}" selected>{{ $label }}</option>
                                                        @else
                                                            <option value="{{ $key }}">{{ $label }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input"
                                                            type="checkbox"
                                                            id="is_filterable"
                                                            name="is_filterable"
                                                            {{ $attribute->is_filterable == 1 ? 'checked' : '' }}/>Filterable
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input"
                                                            type="checkbox"
                                                            id="is_required"
                                                            name="is_required"
                                                            {{ $attribute->is_required == 1 ? 'checked' : '' }}/>Required
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row d-print-none mt-2">
                                                <div class="col-12 text-right">
                                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Attribute</button>
                                                    <a class="btn btn-danger" href="{{ route('admin.attributes.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="values">
                            @livewire('attribute-values', ['id' => $id])
                        </div>
                    </div>
                </div>
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
  <!-- /.content-wrapper -->
@endsection