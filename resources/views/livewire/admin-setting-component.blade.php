<div>

    <div class="container" style="padding: 70px 0; margin-top:100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Settings
                            </div>
                            {{-- <div class="col-md-6">
                                <a href="{{ route('admin.properties') }}" class="btn btb-success pull-right"> All Properties</a>
                            </div> --}}
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="panel-body">
                        <form action="" class="form-horizontal"  wire:submit.prevent="saveSettings">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable"> Email</label>
                                <div class="col-md-4">
                                    <input type="email" placeholder="Email" class="form-control input-md" wire:model="email">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Phone</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Phone" class="form-control input-md" wire:model="phone">
                                    @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Phone2</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Phone2" class="form-control input-md" wire:model="phone2">
                                    {{-- @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Address</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Address" class="form-control input-md" wire:model="address">
                                    @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Map</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Map" class="form-control input-md" wire:model="map">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Twitter</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Twitter" class="form-control input-md" wire:model="twitter">
                                    {{-- @error('SKU')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Facebook</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Facebook" class="form-control input-md" wire:model="facebook">
                                    {{-- @error('SKU')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Instagram</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Instagram" class="form-control input-md" wire:model="instagram">
                                    {{-- @error('SKU')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Youtube</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Youtube" class="form-control input-md" wire:model="youtube">
                                    {{-- @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">LinkedIn</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="LinkedIn" class="form-control input-md" wire:model="linkedIn">
                                    {{-- @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable"></label>
                                <div class="col-md-4">
                                    <Button type="submit" class="btn btn-primary">Save</Button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
