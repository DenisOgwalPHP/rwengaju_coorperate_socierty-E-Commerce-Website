<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Slide
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.homeslider') }}" style="color: whitesmoke" class="btn btb-success pull-right"> All Slides</a>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="panel-body">
                        <form action="" class="form-horizontal" wire:submit.prevent="updateSlide">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Title</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Title" class="form-control input-md" wire:model="title" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Subtitle" class="form-control input-md" wire:model="subtitle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Price" class="form-control input-md" wire:model="price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Link</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Link" class="form-control input-md" wire:model="link">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Image</label>
                                <div class="col-md-4">
                                    <input type="file"  class="input-file" wire:model="newImage">
                                    @if ($newImage)
                                    <img src="{{ $newImage->temporaryUrl() }}" width="120" alt="">
                                    @else
                                    <img src="{{ asset('images/sliders') }}/{{ $image }}" width="120" alt="">
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Status</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable"></label>
                                <div class="col-md-4">
                                    <Button type="submit" class="btn btn-primary">Update</Button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
