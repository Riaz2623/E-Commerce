<div>
    <div class="container"  style="padding:30px 0;">
        <div class="rwo">
           <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <div class="row">
                           <div class="col-md-6">
                               Edit Slide
                           </div>
                           <div class="col-md-6">
                        <a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">All slides</a>
                           </div>
                       </div>
                   </div>
                   <div class="panel-body">
                        @if(Session::has('message'))
                           <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateSlide">

                          <div class="form-group">
                               <label class="col-md-4 control-label" >Title</label>
                               <div class="col-md-4">
                                  <input type="text" placeholder=" Title" class="form-control input-md" wire:model="title" />
                               </div>
                         </div>
                         <div class="form-group">
                        <label class="col-md-4 control-label" > subtitle</label>
                        <div class="col-md-4">
                            <input type="text" placeholder="Product subtitle" class="form-control input-md" wire:model="subtitle">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Price</label>
                        <div class="col-md-4">
                        <input type="text" name="price" id=""  class="form-control" placeholder="Price" wire:model="price"></input>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" >Link</label>
                        <div class="col-md-4">
                            <input type="text" name="link" id=""  class="form-control" placeholder="Link" wire:model="link"></input>
                        </div>
                    </div>


                 
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Image</label>
                        <div class="col-md-4">
                            <input type="file"  class="input-file" wire:model="newimage"/>
                            @if($newimage)
                                <img src="{{$newimage->temporaryUrl()}}" alt="" width="120"/>
                            @else
                                <img sre="{{asset('assets/images/sliders')}}/{{$image}}"width="120"/>
                            @endif
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-4 control-label" >Status</label>
                        <div class="col-md-4">
                           <select class="form-control" wire:model="status" >
                            <option value="0">Inactive</option>

                         
                            <option value="1">Active</option>



                           </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" ></label>
                        <div class="col-md-4">
                           <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                  


                    </form>
                   </div>
               </div>
           </div> 
        </div>
    </div>
</div>