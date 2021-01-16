
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Attributes</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="parent">Select an Attribute <span class="m-l-5 text-danger"> *</span></label>
                                            <select class="form-control" wire:model="attribute_id">
                                                <option value="">Select Attribute</option>
                                                @foreach($attributeNames as $name)
                                                <option value="{{ $name->id }}" @if ($loop->first) selected @endif>{{ $name->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @if($updateMode)
                                    @include('livewire.attributes.edit_attribute')
                                @else
                                    @include('livewire.attributes.create_attribute')
                                @endif
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Product Attributes</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="heads" class="table table-bordered mt-3 table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Value</th>
                                            <th>Qty.</th>
                                            <th>Price</th>
                                            <th width="150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @if($attributes->count() > 0)
                                            @foreach($attributes as $value)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $value->value }}</td>
                                                <td>{{ $value->quantity }}</td>
                                                <td>{{ $value->price }}</td>
                                                <td>
                                                <button wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                                                    <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-danger text-center">No attribute value found!</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.content-wrapper -->