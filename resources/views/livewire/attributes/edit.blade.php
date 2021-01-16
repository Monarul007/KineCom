<h3>Update Value</h3>
<form>
  @csrf
  <div class="form-group">
    <label for="value">Value</label>
    <input type="text" class="form-control" placeholder="Enter attribute value" wire:model="value">
    @error('value') <span class="text-danger">{{ $message }}</span>@enderror
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" min="1" placeholder="Enter attribute value price" wire:model="price">
    @error('price') <span class="text-danger">{{ $message }}</span>@enderror
  </div>
  <button wire:click.prevent="update()" class="btn btn-success float-right"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update</button>
  <button class="btn btn-info" wire:click.prevent="cancel()"><i class="fa fa-fw fa-lg fa-check-circle"></i> Reset</button>
</form>