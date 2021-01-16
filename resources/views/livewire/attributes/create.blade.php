<form>
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
  <button wire:click.prevent="create()" class="btn btn-success float-right"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
</form>