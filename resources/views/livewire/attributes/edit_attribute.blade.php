<form wire:submit.prevent="create()">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="values">Select an value <span class="m-l-5 text-danger"> *</span></label>
                <select class="form-control custom-select" wire:model="value">
                    <option value="">Select Value</option>
                    @foreach($attributeValues as $val)
                        <option value="{{ $val->value }}" @if ($loop->first) selected @endif>{{ $val->value }}</option>
                    @endforeach
                </select>
                @error('value') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" for="quantity">Quantity</label>
                <input class="form-control" type="number" wire:model="qty"/>
                @error('qty') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" for="price">Price</label>
                <input class="form-control" type="text" id="price" wire:model="price"/>
                <small class="text-danger">This price will be added to the main price of product on frontend.</small>
                @error('price') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-12">
            <button wire:click.prevent="update()" class="btn btn-success float-right"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update</button>
            <button class="btn btn-info" wire:click.prevent="cancel()"><i class="fa fa-fw fa-lg fa-check-circle"></i> Reset</button>
        </div>
    </div>
</form>